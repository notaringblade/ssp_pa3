<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Doctors</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        table{
            text-align: center
        }
    </style>
</head>
<body>
    <table class="table" border="2">
        @if(Session::has('success'))
                        <div class="alert alert-success ">
                        <h2>
                            {{Session::get('success')}}
                        </h2>    
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <thead>

            <tr>
                <th>Name</th>
                <th>gender</th>
                <th>email</th>
                <th>role</th>
                <th>Qual</th>
                <th>Pass Year</th>
                <th>specialization</th>
                <th>patient</th>
                <th>update</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($doctors as $doctor)
            <tr>
                
                <td>{{$doctor['name']}}</td>
                <td>{{$doctor['gender']}}</td>
                <td>{{$doctor['email']}}</td>
                <td>{{$doctor['role']}}</td>
                <td>{{$doctor['highest_qualification']}}</td>
                <td>{{$doctor['year']}}</td>
                <td>{{$doctor['specialization']}}</td>
                <td>patient</td>
                <td><a href="update_doctors/{{$doctor->id}}">update</a></td>
                <td><a href="delete/{{ $doctor->id }}">delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </Table>
</body>
</html>