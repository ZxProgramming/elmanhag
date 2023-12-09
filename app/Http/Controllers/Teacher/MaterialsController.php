<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialsController extends Controller
{
    public function index(){
        $years = DB::table('categories')
        ->get();
        $subjects = DB::table('teacher_subjects')
        ->leftJoin('subjects', 'teacher_subjects.subject_id', '=', 'subjects.id')
        ->where('teacher_id', auth()->user()->id)
        ->get();
        $sections = DB::table('sections')
        ->get();
        $lesson = DB::table('contents')
        ->get();
        $teachers = DB::table('users')
        ->where('position', 'teacher')
        ->get();
        $user_id = 1;
        return view('Teacher.Materials.Materials',
        compact('teachers', 'user_id', 'years', 'subjects', 'sections', 'lesson'));
    }

    public function m_edit( Request $req ){
        $arr = DB::table('proccessing_duration')
        ->where( 'user_id', 1 )
        ->where( 'lesson_id', $req->lesson )
        ->whereIn('material',  ['material', 'voice'])
        ->get();
        $material = false;
        $voice = false;
        foreach ($arr as $item) {
            if ( $item->material == 'material' ) {
                $material = true;
            }
            if ( $item->material == 'voice' ) {
                $voice = true;
            }
        }
        if ( empty($arr) ) {
            if ( !empty($req->progress_date1) ) {
                DB::table('proccessing_duration')
                ->insert([
                    'progress_date' => $req->progress_date1,
                    'done_date' => $req->done_date1,
                    'm_Type' => $req->sel_type1,
                    'lesson_id' => $req->lesson,
                    'user_id' => 1,
                    'material' => 'material',
                ]);
            }
            if ( !empty($req->progress_date2) ) {
                DB::table('proccessing_duration')
                ->insert([
                    'progress_date' => $req->progress_date2,
                    'done_date' => $req->done_date2,
                    'done_duration' => $req->done_duration2,
                    'lesson_id' => $req->lesson,
                    'user_id' => 1,
                    'material' => 'voice',
                ]);
            }
        }
        else{
            if ( !empty($req->progress_date1) && $material ) {
                DB::table('proccessing_duration')
                ->where( 'user_id', 1 )
                ->where( 'lesson_id', $req->lesson )
                ->where('material',  'material')
                ->update([
                    'progress_date' => $req->progress_date1,
                    'done_date' => $req->done_date1,
                    'm_Type' => $req->sel_type1,
                ]);
            }
            elseif ( !empty($req->progress_date1) ) {
                DB::table('proccessing_duration')
                ->insert([
                    'progress_date' => $req->progress_date1,
                    'done_date' => $req->done_date1,
                    'm_Type' => $req->sel_type1,
                    'lesson_id' => $req->lesson,
                    'user_id' => 1,
                    'material' => 'material',
                ]);
            }
            if ( !empty($req->progress_date2) && $voice ) {
                DB::table('proccessing_duration')
                ->Where( 'user_id', 1 )
                ->where( 'lesson_id', $req->lesson )
                ->where('material',  'voice')
                ->update([
                    'progress_date' => $req->progress_date2,
                    'done_date' => $req->done_date2,
                    'done_duration' => $req->done_duration2,
                ]);
            }
            elseif ( !empty($req->progress_date2) ) {
                DB::table('proccessing_duration')
                ->insert([
                    'progress_date' => $req->progress_date2,
                    'done_date' => $req->done_date2,
                    'done_duration' => $req->done_duration2,
                    'lesson_id' => $req->lesson,
                    'user_id' => 1,
                    'material' => 'voice',
                ]);
            }
        }

        return redirect()->back();
    }

    public function teacher_lesson_data( Request $req ){
        $arr = DB::table('proccessing_duration')
        ->leftJoin('users', 'proccessing_duration.user_id', '=', 'users.id')
        ->where('lesson_id', $req->lesson_id)
        ->where('user_id', $req->user_id)
        ->get();

        return $arr;
    }
    
}
