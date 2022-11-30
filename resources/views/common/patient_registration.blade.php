<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>patient registration</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div >
        <h2 >Hello Doctor {{$doctor->name}}!</h2>
        <form class="form"  action="{{route('patient-register-script')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <h1>
                        {{Session::get('success')}}
                    </h1>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <h1>
                        {{Session::get('fail')}}
                    </h1>
                </div>
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
                <input  class="input-fields" type="date" value="{{old('DOB')}}" name="DOB" >
                <span>@error('DOB') {{$message}} @enderror</span>
            </div>
            <div >
                <input  class="input-fields" value="{{old('age')}}"  name="age" type="number" placeholder="Enter age">
                <span>@error('age') {{$message}} @enderror</span>

            </div>
            <div >
                <input  class="input-fields" value="{{old('contact')}}" name="contact" type="number" placeholder="Enter Contact">
                <span>@error('contact') {{$message}} @enderror</span>

            </div>
            <div >
                <input  class="input-fields" type="text" value="{{old('address')}}" name="address"  placeholder="Enter adress">
                <span>@error('address') {{$message}} @enderror</span>
            </div>
            <div >
                <select  name="ailment" class="input-fields">
                    <option>General</option>
                    <option>Orthopaedic</option>
                    <option>Cardiac</option>
                </select>
                <span>@error('ailment') {{$message}} @enderror</span>
            </div>
            <div >
                <button type="submit" class="btn btn-dark" >Register Patient</button>
            </div>
            <div >
                {{-- <a href="login">Back To Login</a> --}}
            </div>
            
            {{-- @foreach ($doctors as $doctor)
                <div>{{$doctor['name']}}</div>
            @endforeach --}}
        </form>
    </div>
</body>
</html>