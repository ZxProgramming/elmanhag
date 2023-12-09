<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        // teacher_id <===> By Session
        $late = DB::table('proccessing_duration')
        ->where('done_date', null)
        ->where('teacher_id', auth()->user()->id)
        ->get();
        $subjects = DB::table('teacher_subjects')
        ->where('teacher_id', auth()->user()->id)
        ->pluck('subject_id');
        $sign_up = DB::table('sign_up')
        ->pluck('bundle_id');
        $b_subjects = DB::table('teacher_subjects')
        ->where('teacher_subjects.teacher_id', auth()->user()->id)
        ->pluck('subject_id');
        $b_sub = DB::table('bundle_subjects')
        ->whereIn('subject_id', $b_subjects)
        ->pluck('bundle_id');
        $bundle_subjects = DB::table('bundle_subjects')
        ->whereIn('bundle_id', $sign_up)
        ->pluck('subject_id');
        $signups = DB::table('teacher_subjects')
        ->leftJoin('subjects', 'teacher_subjects.subject_id', '=', 'subjects.id')
        ->where('teacher_subjects.teacher_id', auth()->user()->id)
        ->whereIn('teacher_subjects.subject_id', $bundle_subjects)
        ->get();
        $signupsubjects = DB::table('sign_up')
        ->whereIn('subject_id', $subjects)
        ->get();
        
        $t_subjects = DB::table('teacher_subjects')
        ->where('teacher_id', auth()->user()->id)
        ->orderBy('subject_id')
        ->pluck('subject_id');
        $t_bundle = DB::table('bundle_subjects')
        ->whereIn('bundle_subjects.subject_id', $t_subjects)
        ->pluck('bundle_id');
        $teacher_bundle = DB::table('bundle_subjects')
        ->whereIn('bundle_subjects.subject_id', $t_subjects)
        ->get();
        $signups = DB::table('sign_up')
        ->whereIn('bundle_id', $t_bundle)
        ->pluck('bundle_id');
        $signup_subjects = DB::table('sign_up')
        ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
        ->whereIn('sign_up.subject_id', $t_subjects)
        ->sum('price');

        $b_subjects = DB::table('bundle_subjects')
        ->select('*', 'subjects.price as subjects_price', 'bundle.price as bundle_price')
        ->leftJoin('subjects', 'bundle_subjects.subject_id', '=', 'subjects.id')
        ->leftJoin('bundle', 'bundle_subjects.bundle_id', '=', 'bundle.id')
        ->whereIn('bundle_id', $signups)
        ->orderBy('bundle_subjects.bundle_id')
        ->orderBy('bundle_subjects.subject_id')
        ->get();
        $bundle = [];
        $sub_rate = [];
        $sub_price = [];
        foreach ($b_subjects as $item) {
            $bundle[$item->bundle_id] = isset($bundle[$item->bundle_id]) ?
            $bundle[$item->bundle_id] + $item->subjects_price : $item->subjects_price;
        }
        foreach ($b_subjects as $item) {
            $sub_rate[$item->subject_id] = $item->subjects_price / $bundle[$item->bundle_id];
            $sub_price[$item->subject_id] = $sub_rate[$item->subject_id] * $item->bundle_price;
        }
        $total_earned = $signup_subjects;
        $available = 0;
        $available_items = [];
        foreach ($t_subjects as $item) {
            if ( isset($sub_price[$item]) ) {
                $total_earned += $sub_price[$item];
                $available_items[$item] = $sub_price[$item];
            }
        }
        $total_earned *= .2;
        $user_withdraw = DB::table('user_withdraw')
        ->where('user_id', auth()->user()->id)
        ->sum('money');
        $balance = $total_earned - $user_withdraw;
        $lessons = DB::table('contents')
        ->selectRaw("COUNT('subject_id') AS lessons_num, subject_id")
        ->leftJoin('sections', 'contents.section_id', '=', 'sections.id')
        ->groupBy('sections.subject_id')
        ->get();
        $lesson_explains = DB::table('proccessing_duration')
        ->selectRaw('COUNT(section_id) as lessons_num, subject_id')
        ->leftJoin('contents', 'proccessing_duration.lesson_id' ,'=', 'contents.id')
        ->leftJoin('sections', 'contents.section_id' ,'=', 'sections.id')
        ->groupBy('subject_id')
        ->where('done_date', '!=', null)
        ->where('user_id', auth()->user()->id)
        ->get();
        $arr = [];
        foreach ($lessons as $item) {
            foreach ($lesson_explains as $element) {
                if ( $item->subject_id == $element->subject_id ) {
                    $arr[$item->subject_id] = $element->lessons_num / $item->lessons_num;
                }
            }
        }
        $av_items = [];
        foreach ($available_items as $k => $item) {
            foreach ($arr as $k2 => $element) {
                if ( $k == $k2 ) {
                    $av_items[$k] = $arr[$k] * $available_items[$k];
                }
            }
        }
        foreach ($av_items as $item) {
            $available += $item;
        }
        $available = $available - $user_withdraw;
        $reserved = $balance - $available;
 
        return view('Teacher.Dashboard.Dashboard',
        compact('late', 'subjects', 'signups', 'reserved' , 'available', 'signupsubjects', 'total_earned', 'balance'));
    }

    public function late(){
        $late = DB::table('proccessing_duration')
        ->leftJoin('contents', 'proccessing_duration.lesson_id', '=', 'contents.id')
        ->leftJoin('sections', 'contents.section_id', '=', 'sections.id')
        ->leftJoin('subjects', 'sections.subject_id', '=', 'subjects.id')
        ->leftJoin('categories', 'subjects.category_id', '=', 'categories.id')
        ->where('done_date', null)
        ->where('teacher_id', auth()->user()->id)
        ->simplePaginate(10); 

        return view('Teacher.Dashboard.Late', 
        compact('late'));
    }
}