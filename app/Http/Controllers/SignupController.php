<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function index(){
        $countries = DB::table('location')
        ->get();
        $cities = DB::table('city')
        ->get();
        $grades = DB::table('categories')
        ->where('status', '0')
        ->get();
        $years = DB::table('categories')
        ->where('status', '!=', '0')
        ->get();
        $bundels = DB::table('bundle')
        ->get();
        $subjects = DB::table('subjects')
        ->get();
        $follow_up = DB::table('follow')
        ->leftJoin('users', 'follow.user_id', '=', 'users.id')
        ->get();

        return view('content.Signup.Signup',
        compact('countries', 'cities', 'grades', 'years', 'bundels', 'subjects', 'follow_up'));
    }

    public function add_signup( Request $req ){
        $pass = bcrypt($req->password);
        
        $data = $req->validate([
          "user_name" => 'required|string',
          "email" => 'required|email',
        ]); 
          $add_2 = DB::table('sign_up')->insert([
            'username' => $data['user_name'], 
            'email' => $data['email'],
            'studentPhone' => $req->phone,
            'parentPhone' => $req->parent_phone,

            'type' => $req->type,
            'country_id' => $req->country,
            'city_id' => $req->city,
            'purchase_date' => $req->purchase_date, 
            'category_id' => $req->year,
            'bundle_id' => $req->bundle,
            'subject_id' => $req->subject,
            'follow_id' => $req->follow_up,
            'status' => 'approve',
          ]);

          return redirect()->back();
    }

    public function signup_pending(){
        $signup = DB::table('sign_up')
        ->select('*', 'users.name as follow_name', 'sign_up.userName as user_name',
        'sign_up.email as user_email', 'sign_up.studentPhone as user_phone' 
        , 'categories.category as categories_name', 'bundle.name as bundle_name'
        , 'subjects.name as subject_name', 'sign_up.id as sign_up_id'
        )
        ->leftJoin('users', 'sign_up.follow_id', '=', 'users.id')
        ->leftJoin('categories', 'sign_up.category_id', '=', 'categories.id')
        ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
        ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
        ->leftJoin('city', 'sign_up.city_id', '=', 'city.id')
        ->where('sign_up.status', 'waiting')
        ->simplePaginate(10);
        
        return view('content.Signup.SignupShow', 
        compact('signup'));
    }

    public function signUp_rejected_show(){
        $signup = DB::table('sign_up')
        ->select('*', 'follow_data.name as follow_name', 'users.name as user_name',
        'users.email as user_email', 'users.phone as user_phone' 
        , 'categories.category as categories_name', 'bundle.name as bundle_name'
        , 'subjects.name as subject_name', 'sign_up.id as sign_up_id'
        )
        ->leftJoin('follow', 'sign_up.follow_id', '=', 'follow.id')
        ->leftJoin('users', 'sign_up.user_id', '=', 'users.id')
        ->leftJoin('categories', 'sign_up.category_id', '=', 'categories.id')
        ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
        ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
        ->leftJoin('city', 'sign_up.city_id', '=', 'city.id')
        ->leftJoin('users as follow_data', 'follow.user_id', '=', 'follow_data.id')
        ->where('sign_up.status', 'reject')
        ->simplePaginate(10);
        
        return view('content.Signup.SignupRejecteded', 
        compact('signup'));
    }

    public function signup_approved_show(){
        $signup = DB::table('sign_up')
        ->select('*', 'follow_data.name as follow_name', 'users.name as user_name',
        'users.email as user_email', 'users.phone as user_phone' 
        , 'categories.category as categories_name', 'bundle.name as bundle_name'
        , 'subjects.name as subject_name', 'sign_up.id as sign_up_id'
        )
        ->leftJoin('follow', 'sign_up.follow_id', '=', 'follow.id')
        ->leftJoin('users', 'sign_up.user_id', '=', 'users.id')
        ->leftJoin('categories', 'sign_up.category_id', '=', 'categories.id')
        ->leftJoin('bundle', 'sign_up.bundle_id', '=', 'bundle.id')
        ->leftJoin('subjects', 'sign_up.subject_id', '=', 'subjects.id')
        ->leftJoin('city', 'sign_up.city_id', '=', 'city.id')
        ->leftJoin('users as follow_data', 'follow.user_id', '=', 'follow_data.id')
        ->where('sign_up.status', 'approve')
        ->simplePaginate(10);
        
        return view('content.Signup.SignupApproved', 
        compact('signup'));
    }

    public function signup_approve( $id ){
        $signup = DB::table('sign_up')
        ->where('id', $id)
        ->update([
            'status' => 'approve',
            'status_date' => now(),
        ]);

        return redirect()->back();
    }

    public function signup_rejected( Request $req ){
        $signup = DB::table('sign_up')
        ->where('id', $req->sign_up_id)
        ->update([
            'status' => 'reject',
            'reject_reasons' => $req->rejected_reasons,
            'status_date' => now(),
        ]);

        return redirect()->back();
    }

    public function sign_up(){
        $country = DB::table('location')->get();
        $city = DB::table('city')->get();
        $category = DB::table('categories')->where('status', '!=', '0')->get();
        return view('signup', compact('country', 'city', 'category'));
    }

    public function sign_up_add( Request $req ){
        
        $email = DB::table('users')->where('email', $req->email)
        ->first();
        if ( $email ) {
            session()->flash('faild', 'الايميل موجود بالفعل');
            return redirect()->back();
        }
        $data = $req->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'parent_name' => 'required',
            'parent_phone' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
            'type' => 'required',
        ]);

        if ( $req->password != $req->conf_password ) {
            session()->flash('faild', 'تأكيد الباسورد خطأ');
            return redirect()->back();
        }

        if ( $req->password != $req->conf_password ) {
            session()->flash('faild', 'تأكيد الباسورد خطأ');
            return redirect()->back();
        }

        $password = bcrypt($req->password);

        $user_id = DB::table('users')->insertGetId([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'password' => $password,
            'parent_name' => $req->parent_name,
            'parent_phone' => $req->parent_phone,
            'city_id' => $req->city_id,
            'category_id' => $req->category_id,
            'type' => $req->type,
        ]);
        
        $user = DB::table('users')->where('id', $user_id)
        ->first();
        
        $authenticated = Auth::guard('education')->attempt([
            'email' => $user->email,
            'password' => $user->password
        ]);
        return redirect()->route('stu_dashboard')->with(['succes'=>'Logged In']);
    }

}
