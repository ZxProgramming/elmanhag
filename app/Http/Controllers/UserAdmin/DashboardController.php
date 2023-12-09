<?php

namespace App\Http\Controllers\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $years = DB::table('categories')
        ->get();
        $subjects = DB::table('subjects')
        ->get();
        $sections = DB::table('sections')
        ->get();
        $lesson = DB::table('contents')
        ->get();
        $teachers = DB::table('users')
        ->where('position', 'teacher')
        ->get();
        $users = DB::table('users')
        ->where('position', 'user')
        ->get();
        $video_editor = DB::table('users')
        ->where('position', 'video editor')
        ->get();
        $video_editor_leader = DB::table('users')
        ->where('position', 'video editor leader')
        ->get();
        $premisions = DB::table('user_admin_permitions')
        ->where('user_id', 13)
        ->pluck('premition');
        $premisions = json_decode($premisions);
        return view('UserAdmin.dashboard.dashboard', compact('years', 
        'subjects', 'sections', 'lesson', 'premisions', 'teachers', 
        'users', 'video_editor', 'video_editor_leader'));
    }
    public function material( Request $req ){
        $users = DB::table('proccessing_duration')
        ->where('lesson_id', $req->lesson)
        ->get();
        $material = true;
        $voice = true;
        $powerpoint = true;
        $video_edit = true;
        $video_final = true;
        $compress = true;
        $upload = true;
        $assign = true;
        $updates = $req->updates;
        $updates = explode(',', $updates);
        
        if ( in_array('material', $updates)) {
            $material = false;
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'material')
            ->update([
                'progress_date' => $req->t_progress_date1,
                'done_date' => $req->t_done_date1,
                'user_id' => $req->sel_teacher1,
                'm_Type' => $req->t_m_Type1,
            ]);
        }
        elseif(!empty($req->t_progress_date1)){
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->t_progress_date1,
                'done_date' => $req->t_done_date1,
                'user_id' => $req->sel_teacher1,
                'm_Type' => $req->t_m_Type1,
                'material' => 'material',
            ]);
        }

        if ( in_array('voice', $updates)) {
            $voice = false;
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'voice')
            ->update([
                'progress_date' => $req->t_progress_date2,
                'done_date' => $req->t_done_date,
                'done_duration' => $req->done_duration2,
                'user_id' => $req->sel_teacher2,
            ]);
        }
        elseif(!empty($req->t_progress_date2)) {
            $voice = false;
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->t_progress_date2,
                'done_date' => $req->t_done_date,
                'done_duration' => $req->done_duration2,
                'user_id' => $req->sel_teacher2,
                'material' => 'voice',
            ]);
        }
        if ( in_array('powerpoint', $updates)) {
            $powerpoint = false;
            $tbl_item = DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'powerpoint')
            ->first();
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'powerpoint')
            ->update([
                'progress_date' => $req->u_progress_date3,
                'done_date' => $req->u_done_date3,
                'user_id' => $req->sel_user3,
                'slides' => $req->u_add_slide1 + $tbl_item->slides,
            ]);
        }
        elseif(!empty($req->u_progress_date3)) {
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->u_progress_date3,
                'done_date' => $req->u_done_date3,
                'user_id' => $req->sel_user3,
                'slides' => $req->u_add_slide1,
                'material' => 'powerpoint',
            ]);
        }
        if ( in_array('video edit', $updates)) {
            $video_edit = false;
            $tbl_item = DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'video edit')
            ->first();
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'video edit')
            ->update([
                'progress_date' => $req->u_progress_date4,
                'progress_duration' => $req->u_duration4 + $tbl_item->progress_duration ,
                'done_date' => $req->u_done_date4,
                'done_duration' => $req->u_done_duration4,
                'video_freelancer' => $req->freel,
                'user_id' => $req->sel_user4,
            ]);
        }
        elseif(!empty($req->u_progress_date4)){
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->u_progress_date4,
                'progress_duration' => $req->u_duration4 ,
                'done_date' => $req->u_done_date4,
                'done_duration' => $req->u_done_duration4,
                'video_freelancer' => $req->freel,
                'user_id' => $req->sel_user4,
                'material' => 'video edit',
            ]);
        }
        if ( in_array('video final', $updates)) {
            $video_final = false;
            $tbl_item = DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'video final')
            ->first();
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'video final')
            ->update([
                'progress_date' => $req->progress_date5,
                'progress_duration' => $req->done_duration5 + $tbl_item->progress_duration,
                'done_date' => $req->done_date5,
                'done_duration' => $req->done_duration5,
                'user_id' => $req->sel_user5,
            ]);
        }
        elseif(!empty($req->progress_date5)){
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->progress_date5,
                'progress_duration' => $req->done_duration5,
                'done_date' => $req->done_date5,
                'done_duration' => $req->done_duration5,
                'user_id' => $req->sel_user5,
                'material' => 'video final',
            ]);
        }
        if ( in_array('compress', $updates)) {
            $compress = false;
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'compress')
            ->update([
                'progress_date' => $req->progress_date6,
                'done_date' => $req->done_date6,
                'done_duration' => $req->done_duration6,
                'user_id' => $req->sel_user6,
            ]);
        }
        elseif(!empty($req->progress_date6)){
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->progress_date6,
                'done_date' => $req->done_date6,
                'done_duration' => $req->done_duration6,
                'user_id' => $req->sel_user6,
                'material' => 'compress',
            ]);
        }
        if ( in_array('upload', $updates)) {
            $upload = false;
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'upload')
            ->update([
                'progress_date' => $req->progress_date7,
                'done_date' => $req->done_date7,
                'done_duration' => $req->duration7,
                'user_id' => $req->sel_user7,
            ]);
        }
        elseif(!empty($req->progress_date7)){
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->progress_date7,
                'done_date' => $req->done_date7,
                'done_duration' => $req->duration7,
                'user_id' => $req->sel_user7,
                'material' => 'upload',
            ]);
        }
        if ( in_array('assign', $updates)) {
            $assign = false;
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('material', 'assign')
            ->update([
                'progress_date' => $req->progress_date8,
                'done_date' => $req->done_date8,
                'done_duration' => $req->duration8,
                'user_id' => $req->sel_user_8,
            ]);
        }
        elseif(!empty($req->progress_date8)) {
            DB::table('proccessing_duration')
            ->insert([
                'lesson_id' => $req->lesson,
                'progress_date' => $req->progress_date8,
                'done_date' => $req->done_date8,
                'done_duration' => $req->duration8,
                'user_id' => $req->sel_user_8,
                'material' => 'assign',
            ]);
        }
        
        if( !empty($req->u_duration4) ){
            DB::table('vd_e_durations')
            ->insert([
                'user_id' => auth()->user()->id,
                'v_duration' => $req->u_duration4,
                'date' => now(),
            ]);
        }
        if( !empty($req->u_add_slide1) ){
            DB::table('add_slides')
            ->insert([
                'user_id' => auth()->user()->id,
                'slides' => $req->u_add_slide1,
                'date' => now(),
            ]);
        }

        return redirect()->back();
    }
}
