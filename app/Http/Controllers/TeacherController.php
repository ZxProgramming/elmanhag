<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
class TeacherController extends Controller
{
    //    
    


    public function selectTeacher(){
            $dataSubjects = DB::table('subjects')->get();
        
            $dataCategories = DB::table('categories')->where('status','0')->get();
            $dataYear = DB::table('categories')->where('status','1')->get();
            $dataYears = DB::table('categories')->get();
        
        return view('content.Teacher.teacher',compact('dataSubjects','dataYears', 'dataCategories','dataYear'));
       

    }
    public function TeacherShow(){
            $dataSubjects = DB::table('subjects')->get();
        
            $dataCategories = DB::table('categories')->where('status','0')->get();
            $dataYear = DB::table('categories')->where('status','1')->get();
            $dataYears = DB::table('categories')->get();
        
        return view('content.Teacher.TeacherShow',
        compact('dataSubjects','dataYears', 'dataCategories','dataYear'));
       

    }

    public function addTeacher( Request $request ){
        extract($_FILES['image']);
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        $img_name = null;
        if ( in_array($extension, $extension_arr) ) {
            $img_name = rand(0, 1000) . now() . $name;
            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);

              // if(empty($img_name)){
              //   $img_name = str_replace([' ', ':', '-'], 'X', 'default.png');
              // }
        }
        $data = $request->validate([
            "name" => 'required|string',
            "phone" => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'sales' => 'required',
            'category' => 'required|integer',
          ]);
          $add = DB::table('users')->insertGetId([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'sales' => $data['sales'],
            'image' => $img_name ?? 'default.png' ,
            'position' =>$request->position,
          
          ]);
          foreach($request->subject as $subject){
          $add_2 = DB::table('teacher_subjects')->insert([
            'subject_id' =>$subject,
            'teacher_id' => $add,
            'category_id' => $request->category,
          ]);
        }
         
          if ($add && $add_2) {
            move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
            return redirect()->back();
          }
    }
    public function editTeacher( Request $request  ){
                    // dd( $request ."=>". $request->id) ;
      extract($_FILES['image']);
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        $img_name = null;
        if ( in_array($extension, $extension_arr) ) {
            $img_name = rand(0, 1000) . now() . $name;
            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);

              // if(empty($img_name)){
              //   $img_name = str_replace([' ', ':', '-'], 'X', 'default.png');
              // }
        }
        // $data = $request->validate([
        //     "name" => 'required|string',
        //     "phone" => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        //     'sales' => 'required',
         
        //   ]);

          $add = DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'sales' => $request->sales,
            'image' => $img_name ?? 'default.png' ,
          ]);
          
            
          if ($add ) {
            move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
            return redirect()->back(); 
          }
    }

    public function teachers( Request $req ){
        
      $dataCategories = DB::table('categories')->where('status','0')->simplePaginate(5);
      $dataYear = DB::table('categories')->where('status','1')->simplePaginate(5);
      $dataYears = DB::table('categories')->simplePaginate(5);
      $dataTeachers = DB::table('users')->simplePaginate(5);
      $dataSubjects = DB::table('teacher_subjects')
      ->leftJoin('subjects', 'teacher_subjects.subject_id', '=', 'subjects.id')
      ->orderBy('teacher_id')
      ->get();

          $subject=DB::table('subjects')->simplePaginate(5);


      return view('content.Teacher.TeacherShow',
      compact('dataTeachers','dataSubjects','subject','dataYear','dataCategories','dataYears'));
    }

    public function deleteTecher($id){
        $deleteTecher = DB::table('users')->where('ID',$id)->delete();

        if($deleteTecher){
        $deleteSubject = DB::table('teacher_subjects')->where('teacher_id',$id)->delete();
              if ($deleteSubject ) {
                return redirect()->back();
                        
              }
      }

    }


    public function deleteSubjectTeacher( request $request){
       return $request;
    }



        public function deleteSubject($id){
          $deleteSubject = DB::table('teacher_subjects')
            ->where('subject_id',$id)
            ->delete();
            if ($deleteSubject ) {
              return redirect()->back();
                      
            }

        }
}
