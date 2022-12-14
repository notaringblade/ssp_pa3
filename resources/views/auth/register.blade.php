<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/register.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="form-structure">
        <div>
            <h2> 
                MO Dashboard
            </h2>
            <hr>
        </div>
        <h4 >Hello  {{$data->role}} {{$data->name}}!</h4>
        <form  action="{{route('register-script')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
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
                    <option>MO</option>
                </select>
                <span>@error('role') {{$message}} @enderror</span>

            </div>
            <div >
                <button type="submit" class="btn btn-dark" >Register Doctor</button>
            </div>
            <div >
                <a href="login">Back To Login</a>
            </div>
            <div >
                <a href="doctor_view">View Doctors</a>
            </div>
            <div >
                <a href="patient_registration/{{ $data->id }}">Register Patients</a>

            </div>
            {{-- @foreach ($doctors as $doctor)
                <div>{{$doctor['name']}}</div>
            @endforeach --}}
        </form>
    </div>
</body>
</html>