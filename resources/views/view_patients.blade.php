<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        table{
            text-align: center

        }
        input{
            text-align: center
        }
    </style>
</head>
<body>

        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <h2>
                                {{Session::get('success')}}
                            </h2>
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            <h2>
                                {{Session::get('fail')}}
                            </h2>
                        </div>
                        @endif
                        @csrf
        <input hidden name='did' value={{$doctor->id}}>
        <input hidden name='specialization' value={{$doctor->specialization}}>
        <table class="table"> 
            <thead>
                <th>name</th>
                <th>gender</th>
                <th>age</th>
                <th>DOB</th>
                <th>ailment</th>
                <th>contact</th>
                <th>address</th>

            </thead>
            @foreach ($patients as $patient)
            <tr>
                
                <input name='pid' hidden value={{$patient->id}}>
                {{-- <tr> --}}
                    <td>
                        {{$patient->name}}
                    </td>
                {{-- </tr> --}}
                {{-- <tr> --}}
                    <td>
                        {{$patient->gender}}
                    </td>
                {{-- </tr> --}}
                {{-- <tr> --}}
                    <td>
                        {{$patient->age}}
                    </td>
                {{-- </tr> --}}
                {{-- <tr> --}}
                    <td>
                        {{$patient->DOB}}
                    </td>
                {{-- </tr> --}}
                {{-- <tr> --}}
                    <td>
                        {{$patient->ailment}}
                    </td>
                {{-- </tr> --}}
                {{-- <tr> --}}
                    <td>
                        {{$patient->contact}}
                    </td>
                {{-- </tr> --}}
                {{-- <tr> --}}
                    <td>
                        {{$patient->address}}
                    </td>
                </tr>
                {{-- <tr>{{$patient['specialization']}}</td> --}}
                {{-- <td ><a href="assign-patient/{{$patient->id}}">assign Patients</a></td> --}}
            </tr>
            @endforeach
        </table class="table"> 
    
</body>
</html>