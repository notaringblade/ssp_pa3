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
        <form >
            <div >
                <input class="input-fields" type="text" placeholder="Enter Name">
            </div>
            <div >
                <input class="input-fields" type="number" placeholder="Enter Age">
            </div>
            <div >
                <select class="input-fields">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
            <div >
                <button >Register</button>
            </div>
        </form>
    </div>
</body>
</html>