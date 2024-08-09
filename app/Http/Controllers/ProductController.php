<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        return view('admin.manageProduct', $data);
    }

    public function insert()
    {
        $data["categories"] = Category::all();
        return view('admin.insertProduct', $data);
    }

    public function store(ProductRequest $req)
    {
        $data = $req->validated();

        // image work
        $filename = $req->file('image')->getClientOriginalName();
        $path = $req->file('image')->storeAs("public", $filename);
        $data['image'] = $filename;

        Product::create($data);
        return redirect()->route("admin.product.index")->with("msg", "Product inserted successfully");
    }

    public function edit()
    {
        return view('admin.editProducts');
    }
    public function update(ProductRequest $req, $id)
    {
        // 
    }

    public function removeProduct(Request $req)
    {
        $id = $req->id;

        $record = Product::findOrFail($id);
        $record->delete();
        return redirect()->back()->with("msg", "Product deleted successfully");
    }
}
