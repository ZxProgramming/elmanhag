<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Analytics extends Controller
{
 
  public function index()
  {
    return view('content.dashboard.dashboards-analytics');
  }

  public function categories()
  {
    $categories = DB::table('categories')->get();
    // $subcategories=DB::table('subcategories')->get();
    return view('content.category.categories', compact('categories'));
  }

  public function addCategory(Request $request)
  {
    $data = $request->validate([
      "category" => 'required',
    ]);
    if (empty($request->parent)) {
      $add = DB::table('categories')->insert([
        'category' => $data['category'],
        'status' => "0",
      ]);
    } else {
      $add = DB::table('categories')->insert([
        'category' => $data['category'],
        'status' => "1",
      ]);
    }

    if ($add) {
      session()->flash("success", "Category Added Successfully");
      return redirect()->route('categories');
    }
  }

  public function deleteCategory($id)
  {
    $delete = DB::table('categories')->where('id', $id)->delete();
    if ($delete) {
      session()->flash("success", "Category Deleted Successfully");
      return redirect()->route('categories');
    }
  }

  public function editCategory($id, Request $request)
  {
    $data = $request->validate([
      "category" => 'required',
    ]);
    $category = $request->category;
    $update = DB::table('categories')->where('id', $id)->update([
      'category' => $data['category'],
    ]);
    if ($update) {
      session()->flash("success", "Category Updated Successfully");
      return redirect()->route('categories');
    }
  }

      public function profileAdmin(){
    return view('content.dashboard.profile_admin');

      }
}
