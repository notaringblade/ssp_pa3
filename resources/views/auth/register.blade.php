<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }}">
</head>
<body>
    <div class="form-structure">
        <h2 >Hello Avinash!</h2>
        <form  action="{{route('register-script')}}" method="post">
                @if(Session::has('success'))
                <div class="alert">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert">{{Session::get('fail')}}</div>
                @endif
                @csrf
            <div >
                <input  class="input-fields" type="text" value="{{old('name')}}" name="name"  placeholder="Enter Name">
                <span>@error('name') {{$message}} @enderror</span>
            </div>
            <div >
                <select name="gender" class="input-fields" >
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                <span>@error('gender') {{$message}} @enderror</span>

            </div>
            <div >
                <input  class="input-fields" type="email" value="{{old('email')}}" name="email"  placeholder="Enter email">
                <span>@error('email') {{$message}} @enderror</span>
            </div>
            <div >
                <input  class="input-fields" value="{{old('password')}}"  name="password" type="password" placeholder="Enter password">
                <span>@error('password') {{$message}} @enderror</span>

            </div>
            <div >
                <input  class="input-fields" value="{{old('contact')}}" name="contact" type="number" placeholder="Enter Contact">
                <span>@error('contact') {{$message}} @enderror</span>

            </div>
            <div >
                <select name="role" class="input-fields">
                    <option>employee</option>
                </select>
                <span>@error('role') {{$message}} @enderror</span>

            </div>
            <div >
                <button type="submit" >Register Doctor</button>
            </div>
            <div >
                <a href="login">Back To Login</a>
            </div>
        </form>
    </div>
</body>
</html>