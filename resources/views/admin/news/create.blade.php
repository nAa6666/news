@extends('admin.layout')
@section('title', 'Admin - News')
@section('admin.content')
    <h1>Add news</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <span style="font-weight: bold;">{{ $error }}</span>
            </div>
        @endforeach
    @endif
    <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <p>Name</p>
            <input class="form-control" type="text" name="name" required>
        </div>
        <div class="form-group">
            <p>Text</p>
            <textarea class="form-control textarea" name="text" rows="20" cols="70" required></textarea>
        </div>
        <div class="form-group">
            <p>Status</p>
            <label for="status">
                <input type="checkbox" name="status" id="status" value="1"> <span>Inactive</span>
            </label>
        </div>
        <div class="form-group d-flex">
            <div class="date">
                <p>Date</p>
                <input type="date" name="date" value="{{date("Y-m-d")}}">
            </div>
            <div class="time">
                <p>Time</p>
                <input type="time" name="time" value="{{date("H:i")}}">
            </div>
        </div>
        <div class="form-group">
            <p>Image</p>
            <input type="file" name="images[image]">
        </div>
        <div class="form-group">
            <p>Image preview</p>
            <input type="file" name="images[image_preview]">
        </div>
        <button type="submit" class="btn-primary">Add news</button>
    </form>
@endsection
