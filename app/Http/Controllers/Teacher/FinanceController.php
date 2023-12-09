<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{

//     public function index(){
//         $subjects = DB::table('teacher_subjects')
//         ->where('teacher_id', 1)
//         ->pluck('subject_id');
//         $b_subjects = DB::table('teacher_subjects')
//         ->where('teacher_subjects.teacher_id', 1)
//         ->pluck('subject_id');
//         $b_sub = DB::table('bundle_subjects')
//         ->whereIn('subject_id', $b_subjects)
//         ->pluck('bundle_id');
//         $signups = DB::table('sign_up')
//         ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
//         ->leftJoin('categories', 'bundle.category_id', '=', 'categories.id')
//         ->whereIn('bundle_id', $b_sub)
//         ->get();
//         $signupsubjects = DB::table('sign_up')
//         ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
//         ->leftJoin('categories', 'subjects.category_id', '=', 'categories.id')
//         ->whereIn('subject_id', $subjects)
//         ->sum('subjects.price');
//         $bundle_price = DB::table('bundle_subjects')
//         ->selectRaw('SUM(price) AS price, bundle_id')
//         ->leftJoin('subjects', 'bundle_subjects.subject_id', '=', 'subjects.id')
//         ->groupBy('bundle_id')
//         ->get();
//         $subjects_price = DB::table('bundle_subjects')
//         ->select('*', 'subjects.price as subject_price', 'bundle.price as bundle_price')
//         ->leftJoin('subjects', 'bundle_subjects.subject_id', '=', 'subjects.id')
//         ->leftJoin('bundle', 'bundle_subjects.bundle_id', '=', 'bundle.id')
//         ->get();
//         $user_withdraw = DB::table('user_withdraw')
//         ->where('user_id', 1)
//         ->sum('money');
//         $arr = [];
//         $total_earned = 0;
//         foreach ($bundle_price as $item) {
//             foreach ($subjects_price as $element) {
//                 if ( $element->bundle_id == $item->bundle_id &&  is_numeric($element->bundle_price) ) {
//                     $arr[] = [
//                         'rate' => ($element->subject_price / $item->price) * 100,
//                         'price' => ($element->subject_price / $item->price) * $element->bundle_price,
//                         'subject_id' => $element->subject_id,
//                         'bundle_id' => $element->bundle_id,
//                     ];
//                     break;
//                 }
//             }
//         }
//         foreach( $signups as $item ){
//             foreach ( $arr as $element ) {
//                 if ( $item->bundle_id == $element['bundle_id'] ) {
//                     $total_earned += ($element['price'] * .2);
//                     break;
//                 }
//             }
//         }
//         $total_earned += ($signupsubjects * .2);
//         $balance = $total_earned - $user_withdraw;

//         $total_lessons = DB::table('contents')
//         ->selectRaw('Count(subject_id) as lessons, subject_id')
//         ->leftJoin('sections', 'contents.section_id', '=', 'sections.id')
//         ->leftJoin('subjects', 'sections.subject_id', '=', 'subjects.id')
//         ->groupBy('subject_id')
//         ->get();
//         $done_lessons = DB::table('proccessing_duration')
//         ->selectRaw('Count(subject_id) as lessons, subject_id')
//         ->leftJoin('contents', 'proccessing_duration.lesson_id', '=', 'contents.id')
//         ->leftJoin('sections', 'contents.section_id', '=', 'sections.id')
//         ->where('user_id', 1)
//         ->where('done_date', '!=', null)
//         ->groupBy('subject_id')
//         ->get();
//         $arr_2 = [];

//         foreach ($done_lessons as $element ) {
//             foreach ($total_lessons as $item) {
//                 if ( $item->subject_id == $element->subject_id ) {
//                     $arr_2[] = [
//                         'subject_id' => $item->subject_id,
//                         'lessons_rate' => ($element->lessons / $item->lessons),
//                     ];
//                     break;
//                 }
//             }
//         }

//         $available = 0;
//         foreach ($arr_2 as $item ) {
//             foreach ($arr as $element ) {
//                 if ( $item['subject_id'] == $element['subject_id'] ) {
//                     $available += ($element['price'] * $item['lessons_rate'] * .2);
//                     break;
//                 }
//             }
//         }
        
//         return view('Teacher.Finance.Payout', 
//         compact('balance', 'total_earned', 'available'));
//     }

    public function index(){
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
            $sub_price[$item->subject_id] = $sub_rate[$item->subject_id] * $item->bundle_price
            * $item->teacher_precentage / 100;
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
        $user_withdraw = DB::table('user_withdraw')
        ->where('user_id',  auth()->user()->id)
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
        ->where('user_id',  auth()->user()->id)
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
        return view('Teacher.Finance.Payout',
        compact('balance', 'total_earned', 'available'));
    }

    public function payout_add( Request $req ){ 
        if ( $req->available < $req->money || $req->money < 0 ) {
            session()->flash('faild', 'المبلغ المطلوب أكبر من المتاح');
            return redirect()->back();
        }
        DB::table('user_withdraw')
        ->insert([
            'money' => $req->money,
            'method' => $req->method,
            'user_id' =>  auth()->user()->id,
            'date' => now(),
            'status' => 'pending',
        ]);

        return redirect()->back();
    }

    public function transaction(){
        $t_subjects = DB::table('teacher_subjects')
        ->where('teacher_id',  auth()->user()->id)
        ->orderBy('subject_id')
        ->pluck('subject_id');
        $t_bundle = DB::table('bundle_subjects')
        ->whereIn('bundle_subjects.subject_id', $t_subjects)
        ->pluck('bundle_id');
        $signups = DB::table('sign_up')
        ->whereIn('bundle_id', $t_bundle)
        ->pluck('bundle_id');
        $signups_data = DB::table('sign_up')
        ->whereIn('bundle_id', $t_bundle)
        ->orderBy('bundle_id')
        ->get();
        $b_subjects = DB::table('bundle_subjects')
        ->select('*', 'subjects.price as subjects_price', 'bundle.price as bundle_price')
        ->leftJoin('subjects', 'bundle_subjects.subject_id', '=', 'subjects.id')
        ->leftJoin('bundle', 'bundle_subjects.bundle_id', '=', 'bundle.id')
        ->whereIn('bundle_id', $signups)
        ->orderBy('bundle_subjects.bundle_id')
        ->orderBy('bundle_subjects.subject_id')
        ->get();
        $sub_price = [];
        $signups_date = [];
        foreach ($signups_data as $key => $item) {
            foreach ($b_subjects as $key2 => $element) {
                if ( $item->bundle_id == $element->bundle_id ) {
                    $signups_date[$item->bundle_id] = $item;
                }
            }
        }
        foreach ($b_subjects as $item) {
            $bundle[$item->bundle_id] = isset($bundle[$item->bundle_id]) ?
            $bundle[$item->bundle_id] + $item->subjects_price : $item->subjects_price;
        }
        foreach ($b_subjects as $item) {
            $sub_rate[$item->subject_id] = $item->subjects_price / $bundle[$item->bundle_id];
            $sub_price[$item->subject_id] = [$sub_rate[$item->subject_id] * $item->bundle_price,
            $signups_date[$item->bundle_id]];
        }
        $available_items = [];
        foreach ($t_subjects as $item) {
            if ( isset($sub_price[$item]) ) {
                $available_items[$item] = $sub_price[$item];
            }
        }
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
        ->where('user_id',  auth()->user()->id)
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
                    $av_items[$k] = [$arr[$k] * $available_items[$k][0], $available_items[$k][1]];
                }
            }
        }
        return view('Teacher.Finance.Transaction',
        compact('av_items'));
    }
}
