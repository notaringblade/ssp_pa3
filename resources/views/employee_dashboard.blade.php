<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        td{
            text-align: center
        }
        input{
            text-align: center
        }
    </style>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <h4> 
            Dashboard
        </h4>
        <hr>
    </div>
    <div>
        <Table  border="2" cellpadding="2" cellspacing="3">
            <thead>
                <th>Name</th>
                <th>Gender</th>
                <th>email</th>
                {{-- <th>password</th> --}}
                <th>contact</th>
                <th>role</th>
                <th>highest qualification</th>
                <th>Institution</th>
                <th>Pass Year</th>
                <th>Specialization</th>
                <th>update</th>
                {{-- <th>Action</th> --}}
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <form action="{{route('update-script')}}" method="post">
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
                        <td>
                            <input name="name" value= {{$data->name}}>
                            <span>@error('name') {{$message}} @enderror</span>
                            
                        </td>
                        <td>
                            {{-- <input name="gender" value= {{$data->gender}}> --}}
                            <select name="gender" >
                                <option  selected > {{$data->gender}} </option>
                                <option  > Female</option>
                                <option  > Male</option>
                            </select>
                <span>@error('gender') {{$message}} @enderror</span>

                        </td>
                        <td>
                            <input name="email" value= {{$data->email}}>
                            <span>@error('email') {{$message}} @enderror</span>
                            
                        </td>
                        {{-- 
                            <input name="name" value=><td>
                                {{$data->password}}
                            </td> --}}
                            <td>
                                <input name="contact" value= {{$data->contact}}>
                                <span>@error('contact') {{$message}} @enderror</span>
                            
                            </td>
                            <td>
                                 {{$data->role}}
                                
                            </td>
                            <td>
                                <select name="highest_qualification">
                                    <option selected  > {{$data->highest_qualification}} </option>
                                    <option  > Masters </option>
                                    <option  > Bachelors </option>
                                </select>
                                <span>@error('highest_qualification') {{$message}} @enderror</span>
                                
                            </td>
                            <td>
                                <input name="institution" value= {{$data->institution}}>
                                <span>@error('institution') {{$message}} @enderror</span>
                                
                            </td>
                            <td>
                            <input name="year" value= {{$data->year}}>
                            <span>@error('year') {{$message}} @enderror</span>
                            
                        </td>
                        <td>
                            <select name="specialization" >
                                <option  selected > {{$data->specialization}} </option>
                                <option  > General </option>
                                <option  > Orthapedic </option>
                                <option  > Cardiac </option>
                            </select>
                        <span>@error('specialization') {{$message}} @enderror</span>

                        </td>
                        <td>
                            <button type="submit">Update</button>
                        </td>
                         <td>
                            <a href="login">logout</a>
                        </td>
                    </form>
                    </tr>
            </tbody>
        </Table>
    </div>
</body>
</html>