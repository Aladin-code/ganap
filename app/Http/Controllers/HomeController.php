<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
    
        // Fetch posts for each category, initially load all posts
        $posts = DB::table('posts')
                   ->join('categories', 'posts.category_id', '=', 'categories.id')
                   ->select('posts.*', 'categories.name as category_name')
                   ->latest()
                   ->get();
    
        return view('index', compact('posts', 'categories'));
        // return view('index');

    }
}
