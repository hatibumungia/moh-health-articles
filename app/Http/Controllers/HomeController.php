<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

use App\Article;

use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $articles = Article::whereUserId(Auth::user()->id)->get();
        $videos = Video::with('category')->whereUserId(Auth::user()->id)->get();
        return view('home', compact('articles', 'videos'));
    }
}
