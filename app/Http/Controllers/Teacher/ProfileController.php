<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        $teacher = DB::table('users')
        ->where('id', auth()->user()->id)
        ->first();

        return view('Teacher.Profile.Profile',
        compact('teacher'));
    }

    public function edit( Request $req, $id ){
        $arr = [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
        ];
        $img_name = null;
        extract($_FILES['image']);
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['image'] = $img_name;
            }
           
        }
        if ( !empty($req->password) ) {
            $arr['password'] = bcrypt($req->password);
        }
        DB::table('users')
        ->where('id', $id)
        ->update($arr);

        move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
        return redirect()->back();
    }
}
