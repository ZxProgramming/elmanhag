<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function content($id){
      $sections = DB::table('sections')->where('subject_id',$id)->get();
      return view('content.content',compact('sections','id'));
      
    }

    public function addLesson(Request $request)
    {
     echo $section_id=$request->section_id;
     echo $content_id=$request->content_id;
      $data = $request->validate([
        "section_id" => 'required',
        "lesson" => 'required|string',
      
      ]);
      $add = DB::table('contents')->insert([
        'section_id' => $section_id,
        'lesson' => $data['lesson'],
        'month' => now(),
      ]);
      if ($add) {
        session()->flash("success", "Lesson Added Successfully");
        return redirect()->route('content',$content_id);
        
      }
    }
    public function addChapter(Request $request)
    {
      $subject_id=$request->subject_id;
      $data = $request->validate([
   
        "section" => 'required|string',
      
      ]);
      $add = DB::table('sections')->insert([
        'subject_id' => $subject_id,
        "created_at" => now(),
        'section' => $data['section'],
      ]);
      if ($add) {
        session()->flash("success", "Lesson Added Successfully");
        return redirect()->route('content',$subject_id);
        
      }
    }
    public function editSection(Request $request)
    {
       $section_id=$request->section_id;
       $subject_id=$request->subject_id;
      $data = $request->validate([
   
        "section" => 'required|string',
      
      ]);

      $add = DB::table('sections')
      ->where('id',$section_id)
      ->update([
            'section'=>$data['section'],
            'updated_at'=>now(),
      ]);

      if ($add) {
        session()->flash("success", "تم التعديل");
        return redirect()->route('content',$subject_id);
        
      }
    }
    public function deleteSection(Request $request)
    {
       $section_id=$request->section_id;
       $subject_id=$request->subject_id;

      $add = DB::table('sections')
      ->where(['id'=>$section_id,'subject_id'=>$subject_id])
      ->delete();

      if ($add) {
        session()->flash("success", "تم مسح هذه الوحدة");
        return redirect()->route('content',$subject_id);
        
      }
    }
    public function deleteLesson(Request $request, $ID)
    {
      DB::table('contents')
      ->where(['id'=>$ID])
      ->delete();

      return redirect()->back();
    }



    public function updateLesson(Request $request)
    {
      
      $data = $request->validate([
   
        "lesson" => 'required|string',
        "week" => 'required|string',
      
      ]);
      $add = DB::table('contents')->where('id',$request->id)->update([
        'lesson' =>$data['lesson'] ,
        "week" => $data['week'],
        "month"=> $request['month'],
        "due_date"=> $request['due_date'],
      
      ]);
      if ($add) {
       return redirect()->back();
        
      }
    }
}
