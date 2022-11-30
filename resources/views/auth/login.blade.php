<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <form action="{{route('login-script')}}" method="post">
            @if(Session::has('success'))
                <div class="alert">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert">{{Session::get('fail')}}</div>
                @endif
            @csrf
            <div>
                <input name="email" value="{{old('email')}}" placeholder="enter email" type="email">
                <span>@error('email') {{$message}} @enderror</span>

            </div>
            <div>
                <input placeholder="enter password" type="password" name="password" value="{{old('password')}}">
                <span>@error('password') {{$message}} @enderror</span>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>