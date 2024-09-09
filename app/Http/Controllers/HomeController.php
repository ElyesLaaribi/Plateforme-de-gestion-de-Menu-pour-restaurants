<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data["categories"] = Category::all();
        $data["feedbacks"] = Feedback::all();
        return view('home.home', $data);
    }

    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            $data = $request->validate([
                "email" => "required",
                "password" => "required"
            ]);

            if (Auth::attempt($data)) {
                return redirect()->route("home.index")->with("success", "Login Successfully");
            } else {
                return redirect()->back()->with("error", "email or password invalid");
            }
        }
        return view("home.login");
    }

    public function signup(Request $request)
    {
        if ($request->isMethod("post")) {
            $data = $request->validate
            ([
                    "email" => "required",
                    "password" => "required",
                    "name" => "required"
                ]);

            $data['password'] = bcrypt($data['password']);

            User::create($data);

            return redirect()->route('login');
        }
        return view("home/signup");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back()->with("error", "Logged Out Successfully");
    }
}
