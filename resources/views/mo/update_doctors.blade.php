<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Doctor</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        document.write('<a href="' + document.referrer + '">Go Back</a>');
      </script>
</head>
<body>
    <div>
        {{-- <a href="dashboard">Back</a> --}}
        {{-- <a href="/login">logout</a> --}}
        <a href="javascript:history.go(-1)">

    </div>
    <Table class="table" border="2" cellpadding="2" cellspacing="3">
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
                <form action="{{route('admin-update-script')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('success')}}</div>
                    @endif
                    @csrf
                    {{-- <td> --}}
                        <input hidden name="id" value= {{$doctor->id}}>
                        {{-- <span>@error('name') {{$message}} @enderror</span> --}}
                        
                    {{-- </td> --}}
                    <td>
                        <input name="name" value= {{$doctor->name}}>
                        <span>@error('name') {{$message}} @enderror</span>
                        
                    </td>
                    <td>
                        {{-- <input name="gender" value= {{$doctor->gender}}> --}}
                        <select name="gender" >
                            <option  selected > {{$doctor->gender}} </option>
                            <option  > Female</option>
                            <option  > Male</option>
                        </select>
            <span>@error('gender') {{$message}} @enderror</span>

                    </td>
                    <td>
                        <input name="email" value= {{$doctor->email}}>
                        <span>@error('email') {{$message}} @enderror</span>
                        
                    </td>
                    {{-- 
                        <input name="name" value=><td>
                            {{$doctor->password}}
                        </td> --}}
                        <td>
                            <input name="contact" value= {{$doctor->contact}}>
                            <span>@error('contact') {{$message}} @enderror</span>
                        
                        </td>
                        <td>
                             {{$doctor->role}}
                            
                        </td>
                        <td>
                            <select name="highest_qualification">
                                <option selected  > {{$doctor->highest_qualification}} </option>
                                <option  > Masters </option>
                                <option  > Bachelors </option>
                            </select>
                            <span>@error('highest_qualification') {{$message}} @enderror</span>
                            
                        </td>
                        <td>
                            <input name="institution" value= {{$doctor->institution}}>
                            <span>@error('institution') {{$message}} @enderror</span>
                            
                        </td>
                        <td>
                        <input name="year" value= {{$doctor->year}}>
                        <span>@error('year') {{$message}} @enderror</span>
                        
                    </td>
                    <td>
                        <select name="specialization" >
                            <option  selected > {{$doctor->specialization}} </option>
                            <option  > General </option>
                            <option  > Orthopaedic </option>
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
</body>
</html>