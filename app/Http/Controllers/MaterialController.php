<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
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
        return view('content.Material.Lesson', 
        compact('years', 'subjects', 'sections', 'lesson', 'teachers', 'users', 'video_editor'
        , 'video_editor_leader'));
    }

    public function history(){
        $years = DB::table('categories')
        ->get();
        $subjects = DB::table('subjects')
        ->get();
        $sections = DB::table('sections')
        ->get();
        $lesson = DB::table('contents')
        ->get();
        return view('content.Material.LessonHistory',
        compact('years', 'subjects', 'sections', 'lesson'));
    }

    public function VideoEditorAdd(){
        $years = DB::table('categories')
        ->get();
        $subjects = DB::table('subjects')
        ->get();

        return view('content.Material.VideoEditorAdd',
        compact('years', 'subjects'));
    }

    public function VideoEditorList(){
        $video_editors = DB::table('users')
        ->where('position', 'video editor')
        ->simplePaginate(10);
        $all_subjects = DB::table('subjects')
        ->get();
        $all_categories = DB::table('categories')
        ->where('status', '!=', '0')
        ->get();

        return view('content.Material.VideoEditorList', 
        compact('video_editors', 'all_subjects', 'all_categories'));
    }

    public function videoEditorAddAction( Request $req ){
        $data = $req->validate([
            'v_email' => 'email|required',
            'v_password' => 'min:8|required',
        ]);
        $pass = bcrypt($data['v_password']);
        $arr = [
            'name' => $req->v_name,
            'password' => $pass,
            'email' => $data['v_email'],
            'phone' =>  $req->v_phone,
            'identity' =>  $req->v_ID,
            'sales' =>  $req->v_sales,
            'position' => 'video editor'
        ];
        $img_name = null;
        extract($_FILES['v_image']);
        if ( !empty($name) ) {
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['image'] = $img_name;
            }
        }
        $add = DB::table('users')
        ->insertGetId($arr);

        foreach( $req->v_categories as $item ){
            DB::table('user_category')
            ->insert([
                'user_id'     => $add,
                'category_id' => $item,
            ]);
        }

        foreach( $req->v_subjects as $item ){
            DB::table('user_subjects')
            ->insert([
                'user_id'    => $add,
                'subject_id' => $item,
            ]);
        }
        if ($add) {
            move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
            return redirect()->back();
          }
    }

    public function editVideoEditor( Request $req, $id ){
        $data = $req->validate([
            'email' => 'email|required'
        ]);
        $arr = [
            'name' => $req->name,
            'email' => $data['email'],
            'phone' => $req->phone,
            'identity' => $req->identity,
            'sales' => $req->sales,
        ];
        if ( !empty($req->password) ) {
            $pass = bcrypt($req->password);
            $arr['password'] = $pass;
        }
        DB::table('users')
        ->where('id', $id)
        ->update($arr);
        DB::table('user_category')
        ->where('user_id', $id)
        ->delete();
        DB::table('user_subjects')
        ->where('user_id', $id)
        ->delete();

        foreach( $req->categories as $item ){
            DB::table('user_category')
            ->insert([
                'user_id' => $id,
                'category_id' => $item,
            ]);
        }

        foreach( $req->subjects as $item ){
            DB::table('user_subjects')
            ->insert([
                'user_id' => $id,
                'subject_id' => $item,
            ]);
        }

        return redirect()->back();
    }

    public function lesson_data( Request $req ){
        $arr = DB::table('proccessing_duration')
        ->leftJoin('users', 'proccessing_duration.user_id', '=', 'users.id')
        ->where('lesson_id', $req->lesson_id)
        ->get();
        $arr1 = DB::table('contents')
        ->where('id', $req->lesson_id)
        ->first();
        $arr2 = [$arr1->week, date('M', strtotime($arr1->month))];
        return [$arr, $arr2];
    }

    public function history_data( Request $req ){
        $slides = DB::table('add_slides')
        ->leftJoin('users', 'add_slides.user_id', '=', 'users.id')
        ->where('lesson_id', $req->lesson_id )
        ->orderBy('user_id')
        ->get();
        $vd_e = DB::table('vd_e_durations')
        ->leftJoin('users', 'vd_e_durations.user_id', '=', 'users.id')
        ->where('lesson_id', $req->lesson_id )
        ->orderBy('user_id')
        ->get();
        $arr = ['slides' => $slides, 'vd_e' => $vd_e];

        return $arr;
    }

    public function material_add( Request $req ){
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
                'user_id' => 1,
                'v_duration' => $req->u_duration4,
                'date' => now(),
            ]);
        }
        if( !empty($req->u_add_slide1) ){
            DB::table('add_slides')
            ->insert([
                'user_id' => 1,
                'slides' => $req->u_add_slide1,
                'date' => now(),
            ]);
        }

        return redirect()->back();
    }
}
