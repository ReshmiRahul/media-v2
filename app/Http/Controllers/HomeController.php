<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag; 

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::all(); // Get all tags
        return view('home', ['tags' => $tags]);
    }
}
