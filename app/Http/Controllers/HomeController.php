<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data["categories"] = Category::all();
        $data["feedbacks"] = Feedback::all();
        return view('home.home', $data);
    }

    public function login()
    {
        return view("home.login");
    }
    
    public function signup(Request $request)
    {
        if ($request->isMethod("post"))
        {
            $data = $request->validate
            ([
                "email" => "required",
                "password" => "required",
                "name" => "required"
            ]);
    
            dd($data);
        }
        return view("home/signup");
    }
}
