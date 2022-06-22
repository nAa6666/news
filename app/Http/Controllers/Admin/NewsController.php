<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->simplePaginate(30);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules($request), $this->message($request));

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $news = new News();
        $news->name = $request->name;
        $news->text = $request->text;
        $news->date = sprintf('%s %s', $request->date, $request->time);
        $news->status = !is_null($request->status) ? 1 : null;

        if(isset($request->images)){
            foreach ($request->images as $key=>$file){
                $filename = sprintf('news_%s-%s.%s', date("Y-m-d-H-i-s"), $key, $file->getClientOriginalExtension());
                Storage::disk('news_images')->putFileAs('', $file, $filename);
                $news->{$key} = $filename;
            }
        }

        $news->save();

        return view('admin.news.index', ['news' => News::orderBy('id', 'desc')->simplePaginate(30)])
            ->with(['success' => 'News added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(), $this->rules($request, $news->id), $this->message($request));

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $news->name = $request->name;
        $news->text = $request->text;
        $news->date = sprintf('%s %s', $request->date, $request->time);
        $news->status = !is_null($request->status) ? 1 : null;

        if(isset($request->images)){
            foreach ($request->images as $key=>$file){
                $filename = sprintf('news_%s-%s.%s', date("Y-m-d-H-i-s"), $key, $file->getClientOriginalExtension());
                Storage::disk('news_images')->putFileAs('', $file, $filename);
                $news->{$key} = $filename;
            }
        }

        $news->save();
        return view('admin.news.show', compact('news'))->with(['success' => 'News successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return back()->with(['success' => 'News successfully deleted!']);
    }

    public function rules($request, $id = null){
        $pattern = [
            'name' => 'required|min:5|unique:news,name,'.$id,
            'text' => 'required|min:15'
        ];

        if(isset($request->images)){
            foreach ($request->images as $key=>$file){
                $pattern[sprintf('images.%s', $key)] = 'mimes:jpeg, jpg ,png, gif';
            }
        }

        return $pattern;
    }

    public function message($request){
        $message = [
            'name.required' => 'Field name is empty',
            'name.unique' => 'This news already exists.',
            'name.min' => 'Field name min 5 character',
            'text.required' => 'Field text is empty',
            'text.min' => 'Field text min 15 character'
        ];

        if(isset($request->images)){
            foreach ($request->images as $key=>$file){
                $message[sprintf('images.%s.mimes', $key)] = 'The image must have an extension jpeg, jpg, png, gif';
            }
        }

        return $message;
    }
}
