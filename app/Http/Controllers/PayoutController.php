<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayoutController extends Controller
{
    public function pending_payout(){
        $pendding = DB::table('user_withdraw')
        ->select('*', 'user_withdraw.id as payout_id')
        ->leftJoin('users', 'user_withdraw.user_id', '=', 'users.id')
        ->where('status', 'pending')
        ->simplePaginate();
        return view('content.Payout.PendingPayout',
        compact('pendding'));
    }

    public function accept( Request $req, $id ){
        DB::table('user_withdraw') 
        ->where('id', $id)
        ->update([
            'status' => 'acceptting'
        ]);

        return redirect()->back();
    }

    public function reject( Request $req, $id ){
        DB::table('user_withdraw') 
        ->where('id', $id)
        ->update([
            'status' => 'rejected',
            'rejected_reason' => $req->rejected_reason,
        ]);

        return redirect()->back();
    }

    public function rejectedpayout(){
        $rejected = DB::table('user_withdraw')
        ->select('*', 'user_withdraw.id as payout_id')
        ->leftJoin('users', 'user_withdraw.user_id', '=', 'users.id')
        ->where('status', 'rejected')
        ->simplePaginate();

        return view('content.Payout.RejectedPayout',
        compact('rejected'));
    }
}
