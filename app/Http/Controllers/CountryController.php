<?php

namespace App\Http\Controllers;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    //      This Is Function Cause Add County
    public function index(){
            $countries = DB::table('location')->simplePaginate(10);
        return view('country.countries',compact('countries'));
    }
   



    public function addCountry( request $request){
                    $data = $request->validate([
                        'country_name' => 'required|string',
                    ]);
             $addCountry = DB::table('location')->insert([
                'country_name' => $data['country_name'],
             
             ]);
             if($addCountry){
                return redirect()->back();
             }
        }

            public function editCountry(request $request,$id){
                        $data = $request->validate([
                        'name_update' => 'required|string',
                        ]);
                    $update_country = DB::table('location')
                    ->where('id',$id)->update([
                        'country_name' => $data['name_update'],
                        'updated_at' => now()
                    ]);
                    if($update_country){
                        return redirect()->back();
                    }
            }
            public function deleteCounry($id){
                        
                    $delete_country = DB::table('location')
                    ->where('id',$id)->delete();
                    if($delete_country){
                        return redirect()->back();
                    }
            }
}
