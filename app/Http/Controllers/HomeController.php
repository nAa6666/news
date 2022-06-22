<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(){
        $posts = News::orderBy('date', 'desc')->where('date', '<=', date('Y-m-d H:i'))
            ->where('status', null)->offset(0)->limit(3)->get();
        return view('pages.home', compact('posts'));
    }
}
