<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAdminController extends Controller
{
    
    public function index(){
        $users = DB::table('users')
        ->where('position', 'user_admin')
        ->get();
        
        return view('content.Admins.AdminList',
        compact('users'));
        
    }

    public function del_admin_user( $id){
        DB::table('users')
        ->where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function edit_admin_user(Request $req, $id){
        $arr = [ 
            'name' => $req->name,
            'email' => $req->email,
            'name' => $req->name,
        ];
        $img_name = null;
        extract($_FILES['image']);
        if(!empty($name)){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['image'] = $img_name;
            }
        }
        $users = DB::table('users')
        ->where('id', $id)
        ->update($arr);
        move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
        return redirect()->back();
    }
    public function user_admin_add(){
        return view('content.Admins.Add_Admin');
    }

    public function add( Request $req ){
        $arr = $req->only('name', 'email', 'phone', 'identity');
        $img_name = null;
        if ( $req->password != $req->conf_pass ) {
            session()->flash('faild', 'Password Must be Like Confirm Password');
            return redirect()->back();
        }
        extract($_FILES['image']);
        if(!empty($name)){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['image'] = $img_name;
            }
        }
        $arr['password'] = bcrypt($req->password);
        $arr['position'] = 'user_admin';
        $data = DB::table('users')
        ->insertGetId($arr);
        move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
        
        if ( $req->material ) {
            DB::table('user_admin_permitions')
           ->insert([
               'user_id' => $data,
               'premition' => 'material'
           ]);
        }
        if ( $req->voice ) {
            DB::table('user_admin_permitions')
           ->insert([
               'user_id' => $data,
               'premition' => 'voice'
           ]);
        }
        if ( $req->powerpoint ) {
            DB::table('user_admin_permitions')
           ->insert([
               'user_id' => $data,
               'premition' => 'powerpoint'
           ]);
        }
        if ( $req->compress ) {
            DB::table('user_admin_permitions')
           ->insert([
               'user_id' => $data,
               'premition' => 'compress'
           ]);
        }
        if ( $req->upload ) {
            DB::table('user_admin_permitions')
           ->insert([
               'user_id' => $data,
               'premition' => 'upload'
           ]);
        }
        if ( $req->assign ) {
            DB::table('user_admin_permitions')
           ->insert([
               'user_id' => $data,
               'premition' => 'assign'
           ]);
        } 

        return redirect()->back();
    }
}
