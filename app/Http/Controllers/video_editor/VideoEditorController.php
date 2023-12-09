<?php

namespace App\Http\Controllers\video_editor;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoEditorController extends Controller
{
    // This Controller About All Video Editor Login With Auth Middle Ware
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
        $video_editor = DB::table('users')
        ->where('id', auth()->user()->id)
        ->get();
        $user_id = auth()->user()->id;
        return view('video_editor.dashboard',compact('years','user_id','subjects','sections','lesson','video_editor'));
        
    }  
    public function profileEdit()
    {
        return view('video_editor.profile');
    }  

    public function lesson_user_data( Request $req ){
        $data = DB::table('proccessing_duration')
        ->leftJoin('users', 'proccessing_duration.user_id', '=', 'users.id')
        ->where('user_id', $req->user_id)
        ->where('lesson_id', $req->lesson_id)
        ->get();

        return $data;
    }

    public function video_add( Request $req ){
        
        $data = DB::table('proccessing_duration')
        ->where('lesson_id', $req->lesson)
        ->where('user_id', $req->sel_user4)
        ->first();
        
        if( !empty($data)){
            DB::table('proccessing_duration')
            ->where('lesson_id', $req->lesson)
            ->where('user_id', $req->sel_user4)
            ->update([
                'progress_date' => $req->u_progress_date4 ,
                'progress_duration' => $req->u_duration4 ,
                'done_date' => $req->u_done_date4 ,
                'done_duration' => $req->u_done_duration4 ,
            ]);
        }
        else{
            DB::table('proccessing_duration')
            ->create([
                'progress_date' => $req->u_progress_date4 ,
                'progress_duration' => $req->u_duration4 ,
                'done_date' => $req->u_done_date4 ,
                'done_duration' => $req->u_done_duration4 ,
                'lesson_id', $req->lesson,
                'user_id', $req->sel_user4,
            ]);
        }
        return redirect()->back();   
    }
}
