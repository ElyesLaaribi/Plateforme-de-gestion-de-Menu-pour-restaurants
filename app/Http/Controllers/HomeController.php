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

    public function login(){
        return view("home.login");
    }
}
