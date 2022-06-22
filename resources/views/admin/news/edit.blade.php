@extends('admin.layout')
@section('title', 'Admin - News')
@section('admin.content')
    <h1>Edit news - {{$news->name}}</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <span style="font-weight: bold;">{{ $error }}</span>
            </div>
        @endforeach
    @endif
    <form action="{{route('admin.news.update', $news->id)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <p>Name</p>
            <input class="form-control" type="text" name="name" value="{{$news->name}}" required>
        </div>
        <div class="form-group">
            <p>Text</p>
            <textarea class="form-control textarea" name="text" rows="20" cols="70" required>{{$news->text}}</textarea>
        </div>
        <div class="form-group">
            <p>Status</p>
            <label for="status">
                <input type="checkbox" name="status" id="status" @if($news->status) checked value="1" @endif> <span>Inactive</span>
            </label>
        </div>
        <div class="form-group d-flex">
            <div class="date">
                <p>Date</p>
                <input type="date" name="date" value="{{explode(' ', $news->date)[0]}}">
            </div>
            <div class="time">
                <p>Time</p>
                <input type="time" name="time" value="{{explode(' ', $news->date)[1]}}">
            </div>
        </div>
        <div class="form-group">
            <p>Image</p>
            <input type="file" name="images[image]">
            <br>
            <img class="image_big" src="{{asset(sprintf('news_images/%s', is_null($news->image) ? 'image.png' : $news->image))}}">
        </div>
        <div class="form-group">
            <p>Image preview</p>
            <input type="file" name="images[image_preview]">
            <br>
            <img class="image_preview" src="{{asset(sprintf('news_images/%s', is_null($news->image_preview) ? 'image.png' : $news->image_preview))}}">
        </div>
        <button type="submit" class="btn-primary">Save</button>
    </form>
@endsection
