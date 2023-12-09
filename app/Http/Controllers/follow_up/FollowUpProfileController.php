<?php

namespace App\Http\Controllers\follow_up;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;

use Illuminate\Http\Request;

class FollowUpProfileController extends Controller
{
    //

                public function index()
                {

                    return view('followUp.profile');
                            
                }
                public function editFollowUp(Request $request)
                {
                    $img_name = null;
                    extract($_FILES['imageProfile']);
                    if( !empty($name) ){
                        $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                        $extension = explode('.', $name);
                        $extension = end($extension);
                        $extension = strtolower($extension);
                        if ( in_array($extension, $extension_arr) ) {
                            $img_name = rand(0, 1000) . now() . $name;
                            $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                            $arr['imageProfile'] = $img_name;

                        }
                       
                    }
                  
                    $data=[
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phoneNumber,
                        'parent_phone' => $request->parentPhone,
                        'image' => $img_name ?? 'default.png',
                        'identity' =>$request->identity,
                    ];
                    
                    if( !empty( $request->password ) ){
                        $data['password'] = bcrypt($request->password);

                       } 
                                

                        $edit = DB::table('users')->where('id',$request->id)
                        ->update($data);
                        if($edit)
                        {
                        move_uploaded_file($tmp_name, 'public/images/users/' . $img_name);
                        session()->flash('success','Updated Successfuly');
                            return redirect()->back();
                        }else{
                            session()->flash('faild','All Forms Is Required');
                            return redirect()->back();

                        }
                          
                  
                }
                        public function  listSignUp()
                        {
                                return view('followUp.signUpList');
                        }

                        public function addFollowUp(){
                            $cities = DB::table('city')->get();
                            $countries = DB::table('location')->get();
                            $dataYear = DB::table('categories')->get();
                            $bundles = DB::table('bundle')->get();
                            return view('followUp.newFollowUp',compact('countries','cities','dataYear','bundles'));
                        } 
                        public function signUpAdd(request $request){
                            
                                $teacherValid = $request->validate([// This Validate Data Teacher Request
                                    "name" => 'required',
                                    "email" => 'required|email',
                                    "phone" => 'required|min:11|max:11',
                                    "parent_phone" => 'required|min:7|max:7',
                                ]);
                          
                          
                                    $follow_id =auth()->user()->id;
                             
                            $signUp= DB::table('sign_up')->insert([ // Insert Data In Users Table With Position : Teacher
                                "country_id" => $request->countries,
                                "city_id" => $request->cities,
                                "category_id" => $request->year,
                                "bundle_id" => $request->bundle,
                                "purchase_date" => $request->purchase_date,
                                "type" => $request->paid ?? 'Free',
                                "follow_id" => $follow_id,
                                "userName" => $teacherValid['name'],
                                "email" => $teacherValid['email'],
                                "studentPhone" =>$teacherValid['phone'],
                                "parentPhone" => $teacherValid['parent_phone'],
                            ]);
                            if($signUp){
                                        session()->flash('success','sign up Inserted');
                                  return  redirect()->back();

                        }
                        } 
            }



