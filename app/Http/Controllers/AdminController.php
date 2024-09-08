<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function dashboard()
    {
        $data['products'] = Product::count();
        $data['categories'] = Category::count();
        $data['feedbacks'] = Feedback::count();

        return view('admin.dashboard', $data);
    }

    public function login(Request $req)
    {
        if ($req->isMethod("post")) {
            $data = $req->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if(Auth::guard('admin')->attempt($data)){
                return redirect()->route("admin.dashboard")->with("success", "Admin Login Successfully");
            }
            else{
                return back()->with("error","username or password is incorrect");
            }
        }
        return view("admin.adminLogin");
    }
    
    public function logout(Request $req){
        Auth::guard("admin")->logout();
        return redirect()->route("adminlogin")->with("error", "Admin Logout Successfully");
    }
}
