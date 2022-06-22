@extends('layout')
@section('content')
    <div class="container">
        <h1>Welcome to the site</h1>
        @if($posts->count() > 0)
            <h4>Latest 3 news</h4>
            @include('pages.news.news')
        @else
            <p>No news at the moment...</p>
        @endif
    </div>
@endsection
