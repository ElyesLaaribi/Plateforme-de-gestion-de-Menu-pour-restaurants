<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class CategoryController extends Controller
{
    public function manageCategory(Request $req)
    {

        if ($req->isMethod("post")) {
            $data = $req->validate(['cat_title' => 'required']);
            // $data = $req->validated();


            Category::create($data);

            return redirect()->route("admin.category")->with("success", "Category inserted success");

        }
        $data["categories"] = Category::all();
        return view('admin.manageCategory', $data);
    }
    public function UpdateCategory(Request $req, $id)
    {

        if ($req->isMethod("post")) {
            $data = $req->validate(['cat_title' => 'required']);


            Category::findOrFail($id)->update($data);

            return redirect()->route("admin.category")->with("success", "Category updated successfully");

        }
        $data["categories"] = Category::all();
        return view('admin.manageCategory', $data);
    }

    public function deleteCategory(Request $req)
    {
        $id = $req->id;

        $record = category::findOrFail($id);
        $record->delete();
        return redirect()->back()->with("error", "Category deleted successfully");
    }
}
