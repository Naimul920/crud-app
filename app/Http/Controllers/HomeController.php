<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('website.home.home');
    }
    public function category()
    {
        return view('website.category.category');
    }
}
