<?php

namespace App\Http\Controllers\follow_up;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FollowUpDashboardController extends Controller
{
    // This Is Dashboard About Login Follow Up
        public function index()
        {
                $signUps = DB::table('sign_up')
                ->where('follow_id',auth()->user()->id)
                ->get();
                $signUpsPaid = DB::table('sign_up')
                ->where([
                        'follow_id'=>auth()->user()->id,
                        'type'=>'Paid',
                ])
                ->get();
                $signUpsFree = DB::table('sign_up')
                ->where([
                        'follow_id'=>auth()->user()->id,
                        'type'=>'Free',
                ])
                ->get();
                $signUpsWaiting = DB::table('sign_up')
                ->where([
                        'follow_id'=>auth()->user()->id,
                        'status'=>'waiting',
                ])
                ->get();

                $bandles = DB::table('sign_up')
                ->selectRaw('COUNT(bundle.free) as num, bundle.free') 
                ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
                ->where('subject_id', null)
                ->where('sign_up.follow_id', auth()->user()->id)
                ->groupBy('bundle.free')
                ->get();
                $subjects = DB::table('sign_up')
                ->selectRaw('COUNT(subject_id) AS num') 
                ->where('subject_id', '!=', null)
                ->where('sign_up.follow_id', auth()->user()->id)
                ->get();
                $bandles_sum = DB::table('sign_up')
                ->selectRaw('SUM(bundle.price) as bundle_price') 
                ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
                ->where('subject_id', null)
                ->where('bundle.paid', '1')
                ->where('sign_up.follow_id', auth()->user()->id)
                ->first();
                $subjects_sum = DB::table('sign_up')
                ->selectRaw('SUM(price) AS subject_price') 
                ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
                ->where('subject_id', '!=', null)
                ->where('sign_up.follow_id', auth()->user()->id)
                ->first();
                $user_withdraw = DB::table('user_withdraw')
                ->where('user_id', auth()->user()->id)
                ->sum('money');
                $total = $bandles_sum->bundle_price + $subjects_sum->subject_price;
                $paid = 0;
                $free = 0;
                if ( @$bandles[0]->free == 1 ) {
                    $free += $bandles[0]->num;
                }
                else{
                    $paid += @$bandles[0]->num;
                }
                if ( @$bandles[1]->free == 1 ) {
                    $free += $bandles[1]->num;
                }
                else{
                    $paid += @$bandles[1]->num;
                }
                $follow = DB::table('follow')
                ->where('user_id', auth()->user()->id)
                ->first();
                $balance = 0;
        
                if ( $follow->free_target <= $free ) {
                    $user_salary = $follow->salary / $follow->free_target;
                    $balance +=  $user_salary * $free;
                }
                else {
                    $balance += $follow->salary;
                    if ( $free >= $follow->free_above ) {
                        $balance += $follow->free_bonus;
                    }
                }
        
                if ( $follow->paid_target <= $paid) {
                    $user_salary = $follow->sales / $follow->paid_target;
                    $balance += $user_salary * $paid;
                }
                else {
                    if ( $paid >= $follow->above_1 && $paid <= $follow->above_2 ) {
                        $bonus = $paid * $total * $follow->bonus_1 / 100;
                        $balance += $bonus;
                    }
                    elseif ( $paid >= $follow->above_2 ) {
                        $bonus = $paid * $total * $follow->bonus_2 / 100;
                        $balance += $bonus;
                    }
                }
                $balance -= $user_withdraw;
                $signup = DB::table('sign_up')
                ->select('*', 'sign_up.status as signup_status')
                ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
                ->leftJoin('categories', 'sign_up.category_id', '=', 'categories.id')
                ->where('follow_id',auth()->user()->id)
                ->simplePaginate(10);

                return view('followUp.dashboard',compact('signUps','signup','signUpsPaid','signUpsFree','signUpsWaiting','balance'));
        }
}
