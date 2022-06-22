@extends('layout')
@section('content')
    <div class="container">
        <h1>News</h1>
        @include('pages.news.news')
        <div class="pagination">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection
