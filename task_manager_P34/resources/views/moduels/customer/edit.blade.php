<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('customers.update',$customer->id)}}" method="post">
            @csrf
            @method("put")
            Tên<input type="text" name= "name" value= "{{$customer->name}}"><br> 
            Tuổi<input type="text" name= "age" value="{{$customer->age}}"><br>
            @if($customer->gender == 'Male')
            Giới tính<input type="radio" name= "gender" value="Male" checked>Male <input type="radio" name= "gender" value="Female">Female <br>
            @else
            Giới tính<input type="radio" name= "gender" value="Male" >Male <input type="radio" name= "gender" value="Female" checked>Female <br>
            @endif
            <button type="submit">Sửa</button>
    </form>
</body>
</html>