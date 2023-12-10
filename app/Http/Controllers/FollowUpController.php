<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowUpController extends Controller
{
    
    public function add_follow(){
        $countries = DB::table('location')->get();
        $cities = DB::table('city')->get();
        $dataFollows = DB::table('follow')
        ->leftJoin('users', 'follow.user_id', '=', 'users.id')
        ->where('follow_position', 'leader')
        ->get();

        return view('content.Follow up.FollowUp',
        compact('countries', 'cities', 'dataFollows'));
    }
    
    public function add_follow_leader(){
        $countries = DB::table('location')->get();
        $cities = DB::table('city')->get();

        return view('content.Follow up.FollowUpLeader',
        compact('countries', 'cities'));
    }
    
    public function follow_add( Request $req ){
        extract($_FILES['image']);
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        $img_name = null;
        if ( in_array($extension, $extension_arr) ) {
            $img_name = rand(0, 1000) . now() . $name;
            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
        }

        $data = $req->validate([
          "email" => 'required|email',
        ]);
        
        $add1 = DB::table('users')->insertGetId([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'identity' => $req->ID,
            'password' => bcrypt($req->password) ,
            'image' => $img_name ?? 'default.png',
            'position' => 'follow_up'
        ]);
        $add = DB::table('follow')->insert([
            'user_id' => $add1,
            'country' => $req->countries,
            'city' => $req->cities,
            'salary' => $req->salary,
            'free_target' => $req->free_target,
            'free_above' => $req->free_above,
            'free_bonus' => $req->free_bonus,
            'sales' => $req->sales,
            'paid_target' => $req->paid_target,
            'above_1' => $req->above_1,
            'bonus_1' => $req->bonus_1,
            'above_2' => $req->above_2,
            'bonus_2' => $req->bonus_2,
            'follow_position' => 'follow_up',
        ]);

        if ($add) {
            move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
            return redirect()->back();
          }
    }
    
    public function follow_leader_add( Request $req ){
        extract($_FILES['image']);
        $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
        $extension = explode('.', $name);
        $extension = end($extension);
        $extension = strtolower($extension);
        $img_name = null;
        if ( in_array($extension, $extension_arr) ) {
            $img_name = rand(0, 1000) . now() . $name;
            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
        }

        $data = $req->validate([
          "email" => 'required|email',
        ]);
        $add1 = DB::table('users')->insertGetId([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'identity' => $req->ID,
            'password' => bcrypt($req->password) ,
            'image' => $img_name ?? 'default.png',
            'position'=> 'follow_up_lead'
        ]);
        $add = DB::table('follow')->insert([
            'user_id' => $add1,
            'country' => $req->countries,
            'city' => $req->cities,
            'salary' => $req->salary,
            'free_target' => $req->free_target,
            'free_above' => $req->free_above,
            'free_bonus' => $req->free_bonus,
            'sales' => $req->sales,
            'paid_target' => $req->paid_target,
            'above_1' => $req->above_1,
            'bonus_1' => $req->bonus_1,
            'above_2' => $req->above_2,
            'bonus_2' => $req->bonus_2,
            'follow_position' => 'leader',
        ]);

        if ($add) {
            move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
            return redirect()->back();
          }
    }
    

    public function follows( Request $req ){
        $dataFollows = DB::table('follow')
        ->select('*', 
        'users.name as follow_name', 'users.phone as follow_phone', 
        'users.email as follow_email', 'follow.id AS follow_id', 
        'users.image as follow_image', 'leader.name AS Leader',
        'leader.id as leader_id')
        ->leftJoin('location', 'follow.country', '=', 'location.id')
        ->leftJoin('users', 'follow.user_id', '=', 'users.id')
        ->leftJoin('city', 'follow.city', '=', 'city.id')
        ->leftJoin('users AS leader', 'follow.follow_leader_id', '=', 'leader.id')
        ->where('follow.follow_position', 'follow_up')
        ->simplePaginate(10);
        $leaders = DB::table('follow')
        ->leftJoin('users', 'follow.user_id', '=', 'users.id')
        ->where('follow_position', 'leader')
        ->get();
  
        return view('content.Follow up.FollowShow',
        compact('dataFollows', 'leaders'));
      }
    

    public function leaderFollows( Request $req ){
        $dataFollows = DB::table('follow')
        ->select('*', 'users.id as u_id')
        ->leftJoin('location', 'follow.country', '=', 'location.id')
        ->leftJoin('users', 'follow.user_id', '=', 'users.id')
        ->leftJoin('city', 'follow.city', '=', 'city.id')
        ->where('follow_position', 'leader')
        ->get();

        return view('content.Follow up.FollowLeaderShow',
        compact('dataFollows'));
    }
      
    
    public function deleteFollowLead( $id ){
        
        $dataUsers = DB::table('users')->where('id',$id)->delete();
        if($dataUsers){
        $dataFollows = DB::table('follow')->where('user_id',$id)->delete();
                    
            return redirect()->back();
        }  


    }
    public function editFollowUp( request $request , $id ){
        
           $arr = [
            'name' => $request->name,
            'email' => $request->email,
           ];
           $img_name = null;
           extract($_FILES['image']);

                if( !empty( $request->password ) ){
                $arr['password'] = $request->password;
                }
           if( !empty( $name ) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
    
                  // if(empty($img_name)){
                  //   $img_name = str_replace([' ', ':', '-'], 'X', 'default.png');
                  // }
                  $arr['image'] = $img_name  ;  
            } 
              
           }
           $data = DB::table('users') 
           ->where('id',$id)->update($arr);
           $data = DB::table('follow') 
           ->where('user_id',$id)->update([ 
            'follow_leader_id' => $request->follow_leader_id,
           ]);

           if($data){
            // 'name' => $arr['name'],
        // 'email' => $arr['email'],
        // 'follow_leader_id' => $arr['follow_leader_id'],
   }
   move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
   return redirect()->back();
    } 

}
