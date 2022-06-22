<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    private $items = 30;

    public function index(){
        $posts = $posts = News::orderBy('date', 'desc')->where('date', '<=', date('Y-m-d H:i'))
            ->where('status', null)->where('status', null)->simplePaginate($this->items);

        if(collect($posts->items())->isEmpty()){
            return abort(404);
        }

        return view('pages.news.index', compact('posts'));
    }

    public function show($id){
        $post = News::findOrFail($id);
        if(is_null(Session::get(sprintf('news_%s', $post->id)))){
            Session::put([sprintf('news_%s', $post->id) => $post->id]);
            $post->views = $post->views + 1;
            $post->save();
        }

        return view('pages.news.show', compact('post'));
    }
}
