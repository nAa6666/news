<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign in</title>
    <link rel="stylesheet" href="{{mix('styles/compiled/admin/style.min.css')}}">
</head>
<body>
<div id="login">
    <div class="wrapper-content">
        <div class="container">
            <form class="login-form" action="{{ route('admin.login') }}" method="POST">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <span style="font-weight: bold;">{{ $error }}</span>
                        </div>
                    @endforeach
                @endif
                {!! csrf_field() !!}
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Email" required autofocus>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button class="btn" type="submit" name="submit">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
