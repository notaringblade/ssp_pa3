<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        table{
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
        <a href="login">Back To Login</a>

        <h4> 
           Employee Dashboard
        </h4>
        <hr>
    </div>
    <div>
        <Table class="table" border="2" cellpadding="2" cellspacing="3">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Gender</th>
                    <th>email</th>
                    <th>password</th>
                    <th>contact</th>
                    <th>role</th>
                </tr>
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
                        <input name="id" hidden value= {{$data->id}}>
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
                        <td>
                            <input name="password" value= {{$data->password}}>
                            <span>@error('password') {{$message}} @enderror</span>

                        </td>    
                            <td>
                                <input name="contact" value= {{$data->contact}}>
                                <span>@error('contact') {{$message}} @enderror</span>
                            
                            </td>
                            <td>
                                 {{$data->role}}
                                
                            </td>
                        </tr>
                        <tr>
                        </tbody>
            <thead>
                <tr>
                    <th>highest qualification</th>
                    <th>Institution</th>
                    <th>Pass Year</th>
                    <th>Specialization</th>
                    <th>update</th>
                    <th>Action</th>
                </tr>
            </thead>
            
                <tbody>
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
                         
                    </form>
                    </tr>
            </tbody>
        </Table>
        <div >
            <a href="patient_registration/{{ $data->id }}">Register Patients</a>
        </div>
        <div>

            <a href="view_patients/{{ $data->id }}">View your Patients</a>
        </div>
    </div>
</body>
</html>