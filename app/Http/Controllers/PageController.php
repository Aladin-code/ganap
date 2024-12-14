<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PageController extends Controller
{
    //
    public function index(){
        // Fetch all categories to show on the tabs
        $categories = DB::table('categories')->get();
    
        // Fetch posts for each category, initially load all posts
        $posts = DB::table('posts')
                   ->join('categories', 'posts.category_id', '=', 'categories.id')
                   ->select('posts.*', 'categories.name as category_name')
                   ->latest()
                   ->get();
    
        return view('index', compact('posts', 'categories'));
    }
    
    
    public function newPost(){
        $categories = DB::table('categories')->get();
        return view('new_post', compact('categories'));
    }
}
