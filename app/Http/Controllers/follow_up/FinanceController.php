<?php

namespace App\Http\Controllers\follow_up;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    
    public function payout(){
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
        
        return view('followUp.Finance.Payout',
        compact('balance'));
    }
    
    public function payout_add( Request $req ){ 
        DB::table('user_withdraw')
        ->insert([
            'money' => $req->money,
            'method' => $req->method,
            'user_id' => auth()->user()->id,
            'date' => now(),
            'status' => 'pending',
        ]);

        return redirect()->back();
    }

    public function transation(){
        $balance = DB::table('sign_up')
        ->selectRaw('bundle.price AS bundle_price, subjects.price AS subject_price')
        ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
        ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
        ->get();
        $user_withdraw = DB::table('user_withdraw')
        ->selectRaw('SUM(money) AS price')
        ->where('user_id', auth()->user()->id)
        ->first();
        $balance = $balance->price - $user_withdraw->price;
        return view('followUP.Finance.Payout',
        compact('balance'));
    }
}
