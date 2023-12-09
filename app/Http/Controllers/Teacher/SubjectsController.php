<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectsController extends Controller
{
    public function index(){
        $subjects = DB::table('teacher_subjects')
        ->leftJoin('subjects', 'teacher_subjects.subject_id', '=', 'subjects.id')
        ->leftJoin('categories', 'subjects.category_id', '=', 'categories.id')
        ->where('teacher_subjects.teacher_id', 1)
        ->get();

        return view('Teacher.Subjects.Subjects',
        compact('subjects'));
    }
}
