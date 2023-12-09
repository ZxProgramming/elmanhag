<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    
    public function index(){
        $subjects = DB::table('teacher_subjects')
        ->where('teacher_id', auth()->user()->id)
        ->pluck('subject_id');
        $b_subjects = DB::table('teacher_subjects')
        ->where('teacher_subjects.teacher_id', auth()->user()->id)
        ->pluck('subject_id');
        $b_sub = DB::table('bundle_subjects')
        ->whereIn('subject_id', $b_subjects)
        ->pluck('bundle_id');
        $signups = DB::table('sign_up')
        ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
        ->leftJoin('categories', 'bundle.category_id', '=', 'categories.id')
        ->whereIn('bundle_id', $b_sub)
        ->get();
        $signupsubjects = DB::table('sign_up')
        ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
        ->leftJoin('categories', 'subjects.category_id', '=', 'categories.id')
        ->whereIn('subject_id', $subjects)
        ->get();

        return view('Teacher.Signups.Signups', 
        compact('signupsubjects', 'signups'));
    }
}
