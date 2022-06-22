<nav class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="menu">
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('news')}}">News</a>
        </div>
        @if(!Auth::check())
            <a href="{{route('admin.login')}}">Sign in</a>
        @else
            <a href="{{route('admin.home')}}">Admin panel</a>
        @endif
    </div>
</nav>
