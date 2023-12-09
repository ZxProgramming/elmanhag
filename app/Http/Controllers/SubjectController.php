<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
  public function subjects()
  {
    $subjects = DB::table('subjects')->get();
    // $subjects=DB::table('subcategories')->get();
    return view('content.subjects', compact('subjects'));
  }

  public function addSubject(Request $request)
  {
    $data = $request->validate([
      "name" => 'required|string',
      "category_id" => 'required',
      'price' => 'required'
    ]);
    $add = DB::table('subjects')->insert([
      'name' => $data['name'],
      'category_id' => $data['category_id'],
      'price' => $data['price'],
    ]);
    if ($add) {
      session()->flash("success", "Subject Added Successfully");
      return redirect()->route('subjects');
    }
  }

  public function deleteSubject($id)
  {
    $delete = DB::table('subjects')->where('id', $id)->delete();
    if ($delete) {
      session()->flash("success", "Subject Deleted Successfully");
      return redirect()->route('subjects');
    }
  }

  public function editSubject($id, Request $request)
  {
    $data = $request->validate([
      "name" => 'required|string',
      "category_id" => 'required',
      'price' => 'required'
    ]);
    $update = DB::table('subjects')->where('id', $id)->update([
      'name' => $data['name'],
      'category_id' => $data['category_id'],
      'price' => $data['price'],
    ]);
    if ($update) {
      session()->flash("success", "Subject Updated Successfully");
      return redirect()->route('subjects');
    }
  }
}
