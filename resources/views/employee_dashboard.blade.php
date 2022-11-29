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
                    <form>

                        <td>
                            <input value= {{$data->name}}>
                            
                        </td>
                        <td>
                            <input value= {{$data->gender}}>
                            
                        </td>
                        <td>
                            <input value= {{$data->email}}>
                            
                        </td>
                        {{-- 
                            <input value=><td>
                                {{$data->password}}
                            </td> --}}
                            <td>
                                <input value= {{$data->contact}}>
                            
                            </td>
                            <td>
                                 {{$data->role}}
                                
                            </td>
                            <td>
                                <input value= {{$data->highest_qualification}}>
                                
                            </td>
                            <td>
                                <input value= {{$data->institution}}>
                                
                            </td>
                            <td>
                            <input value= {{$data->year}}>
                            
                        </td>
                        <td>
                            <input value= {{$data->specialization}}>
                            
                        </td>
                        <td>
                            <a href="">Update</a>
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