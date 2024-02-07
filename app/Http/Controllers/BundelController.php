<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class BundelController extends Controller
{
    // Comment
    public function index(){
        $dataSubjects = DB::table('subjects')->get();
        $dataCategories = DB::table('categories')->where('status','0')->get();
        $dataYear = DB::table('categories')->where('status','1')->get();
        $Years = DB::table('categories')->get();

        return view('content.Bundle.bundle', compact('dataSubjects', 'Years', 'dataCategories', 'dataYear'));
    }

    public function add_bundle( Request $req ){
      $paid = isset($req->paid) ? '1' : '0';
      $free = isset($req->free) ? '1' : '0';
      $sub_id = isset($req->subject_id) ;
          if(!$sub_id ){
           
              session()->flash("faild", "يجب ان تختار مواد");
      return redirect()->back();
            }
      $activate = isset($req->activate) ? $req->activate : '0';
        $add = DB::table('bundle')->insertGetId([
            'name' => $req->name,
            'price' => $req->price,
            'category_id' => $req->category_id,
            'paid' => $paid,
            'free' => $free,
            'Active' => $activate,
            'teacher_precentage' => $req->teacher_precentage,
          ]);

          foreach( $req->subject_id as $item ){
            $add_2 = DB::table('bundle_subjects')->insertGetId([
              'bundle_id' => $add,
              'subject_id' => $item,
            ]);
          }
          if($add){
            return redirect()->back();
          }
    }
    

    public function bundles( Request $req ){
      $databundle = DB::table('bundle')
      ->orderBy('category_id')
      // ->leftJoin('categories', 'bundle.category_id', '=', 'categories.id')
      ->get();

      return view('content.Bundle.BundleShow',
      compact('databundle'));
    }


   
    public function editAtivatonsBundle( Request $request)
    {
      $update = DB::table('bundle')->where('id', $request->id)->update([
        'Active' => $request->Active,
      ]);
             
      
      if ($update) {
        return redirect()->back();
      }
    }


    public function editBundle( Request $request)
    {
     if($request->free == null){
            $update = DB::table('bundle')->where('id', $request->id)->update([
              'free' => '0'   ,
       
          ]);
     }
     if($request->free == '1'){
            $update = DB::table('bundle')->where('id', $request->id)->update([
              'free' => '1'   ,
       
          ]);
     }
     if($request->paid == null){
      $update = DB::table('bundle')->where('id', $request->id)->update([
        'paid' => '0'   ,
       
          ]);

}
     if($request->paid == '1'){
      $update = DB::table('bundle')->where('id', $request->id)->update([
        'paid' =>  $request->paid   ,
       
          ]);

}
         
      $update = DB::table('bundle')->where('id', $request->id)->update([
        'price' => $request->bundlePrice,
        'name' => $request->bundleName,
        'teacher_precentage' => $request->teacher_precentage,
   
      ]);
        return redirect()->back();
      
      
    }

    public function deleteSubjectBundle($id ){

          $delete = DB::table('bundle_subjects')->where('subject_id',$id)
          ->delete();
          if ($delete){
        return redirect()->back();

          }
    }
}
