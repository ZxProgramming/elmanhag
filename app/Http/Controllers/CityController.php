<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CityController extends Controller
{
    // This Function Cause Add Cities
    public function index(){
        $countries = DB::table('location')->get();
        $cities = DB::table('city')->simplePaginate(15);
    return view('country.city',compact('countries','cities'));
}

        public function addCities( request $request){
            // return $reqeust ;
            $data = $request->validate([
                'city_name' => 'required|string',
            ]);
        $addCountry = DB::table('city')->insert([
        'city_name' => $data['city_name'],
        'country'  => $request->country_debend,
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
    'country_name' => $data['name_update']  
]);
if($data){
    return redirect()->back();
    }

    }
    
    public function deleteCity($id){
        $deleteCity = DB::table('city')->where('id',$id)
        ->delete();

        if($deleteCity){
            return redirect()->back();
        }
    }
    public function editCity(request $request){
        // return $request->country ;
                $dataCity =$request->validate([
                        'city_name'=> 'required',
                ]);
        $editCity = DB::table('city')->where('id',$request->id)
        ->update([
                'city_name' => $dataCity['city_name'], 
                'country' => $request->country, 
        ]);
       

        if($editCity){
            return redirect()->back();
        }
    }
}
