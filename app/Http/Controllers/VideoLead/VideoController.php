<?php

namespace App\Http\Controllers\VideoLead;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $years = DB::table('categories')
        ->get();
        $subjects = DB::table('user_subjects')
        ->leftJoin('subjects', 'user_subjects.subject_id', '=', 'subjects.id')
        ->where('user_id', auth()->user()->id)
        ->get();
        $sections = DB::table('sections')
        ->get();
        $lesson = DB::table('contents')
        ->get();
        $video_editor_leader = DB::table('users')
        ->where('id', auth()->user()->id)
        ->get();
        $video_editor = DB::table('users')
        ->where('position', 'video editor')
        ->get();
        $user_id = auth()->user()->id;
        return view('VideoEditorLead.dashboard', 
        compact('years', 'subjects', 'sections', 'lesson', 
        'video_editor_leader', 'user_id', 'video_editor'));
    }

    public function video_lead_add( Request $req ){ 
        $data = DB::table('proccessing_duration')
        ->where('lesson_id', $req->lesson)
        ->where('user_id', auth()->user()->id)
        ->first();

        DB::table('proccessing_duration')
        ->where('lesson_id', $req->lesson)
        ->where('material', 'video edit')
        ->update([
            'progress_date' => $req->u_progress_date4,
            'progress_duration' => $req->u_duration4,
            'done_date' => $req->u_done_date4,
            'done_duration' => $req->u_done_duration4,
        ]); 
        if ( !empty($data) ) {
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('user_id', auth()->user()->id)
            ->update([
                'progress_date' => $req->progress_date5,
                'done_date' => $req->done_date5,
                'done_duration' => $req->done_duration5,
            ]); 
        }
        else {
            DB::table('proccessing_duration')
            ->insert([
                'progress_date' => $req->progress_date5,
                'done_date' => $req->done_date5,
                'done_duration' => $req->done_duration5,
                'lesson_id' => $req->lesson,
                'user_id' => auth()->user()->id,
            ]); 
        }
        return redirect()->back();
    }

    public function profile(){
        $user = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();

        return view('VideoEditorLead.Profile',
        compact('user'));
    }

    public function subjects(){
        $subjects = DB::table('user_subjects')
        ->leftJoin('subjects', 'user_subjects.subject_id', '=', 'subjects.id')
        ->leftJoin('categories', 'subjects.category_id', '=', 'categories.id')
        ->where('user_id', auth()->user()->id)
        ->get();
        return view('VideoEditorLead.subjects',
        compact('subjects'));
    }

    public function video_lead_material( Request $req ){
        $years = DB::table('categories')
        ->get();
        $subjects = DB::table('user_subjects')
        ->leftJoin('subjects', 'user_subjects.subject_id', '=', 'subjects.id')
        ->where('user_id', auth()->user()->id)
        ->get();
        $sections = DB::table('sections')
        ->get();
        $lesson = DB::table('contents')
        ->get();
        $video_editor_leader = DB::table('users')
        ->where('id', auth()->user()->id)
        ->get();
        $video_editor = DB::table('users')
        ->where('position', 'video editor')
        ->get();
        $user_id = auth()->user()->id;
        $data = DB::table('proccessing_duration')
        ->leftJoin('users', 'proccessing_duration.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->where('lesson_id', $req->lesson_id)
        ->first();
        $arr = DB::table('proccessing_duration')
        ->leftJoin('users', 'proccessing_duration.user_id', '=', 'users.id') 
        ->where('material', 'video edit')
        ->where('lesson_id', $req->lesson_id)
        ->first();
        $lesson_data = DB::table('contents')
        ->where('id', $req->lesson_id)
        ->first();

        return view('VideoEditorLead.dashboard_form', 
        compact('years', 'subjects', 'sections', 'lesson', 'video_editor_leader',
        'video_editor', 'user_id', 'data', 'arr', 'lesson_data'));
    }
    
}
