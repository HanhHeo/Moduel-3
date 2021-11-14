<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('customers.store')}}" method="post">
        @csrf
        Tên<input type="text" name="name"><br>
        Tuổi<input type="text" name="age"><br>
        Giới tính<input type="radio" name="gender" value="Male" checked>Male
        <input type="radio" name="gender" value="Female">Female <br>
        <button type="submit">Thêm</button>
    </form>
</body>

</html>'