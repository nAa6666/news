@extends('admin.layout')
@section('title', 'Admin - News')
@section('admin.content')
    <h1>Watch news - {{$news->name}} (<span style="color: green;">{{!$news->status ? 'Active' : 'Inactive'}}</span>)</h1>
    @if(isset($success))
        <div class="alert alert-success">
            <span>{{ $success }}</span>
        </div>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <span style="font-weight: bold;">{{ $error }}</span>
            </div>
        @endforeach
    @endif
    <br>
    <span><b>Data create:</b> {{$news->created_at}}</span>
    <span><b>Data updated:</b> {{$news->updated_at}}</span>
    <span><b>Views:</b> {{$news->views}}</span>

    @if(!is_null($news->date))
        <p><b>Scheduled date:</b> {{$news->date}}</p>
    @endif
    <div class="news-image">
        <img src="{{asset(sprintf('news_images/%s', is_null($news->image) ? 'image.png' : $news->image))}}" class="image_big">
        <h3>Image preview</h3>
        <img src="{{asset(sprintf('news_images/%s', is_null($news->image_preview) ? 'image.png' : $news->image_preview))}}" class="image_preview">
        <h3>Text</h3>
        <p>{{$news->text}}</p>
    </div>
@endsection
