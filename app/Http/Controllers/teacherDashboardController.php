<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class teacherDashboardController extends Controller
{
    //function Index About Teacher Dashboard
            public function index(){
                $teacher_subjects = DB::table('teacher_subjects')->where('teacher_id',auth()->user()->id)->get();
                return view('teacher.dashboard',compact('teacher_subjects')) ;
                
            }
}
