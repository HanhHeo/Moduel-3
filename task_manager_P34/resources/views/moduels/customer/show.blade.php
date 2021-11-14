<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Tên</td>
            <td>{{$customer->name}}</td>
            
        </tr>
        <tr>
            <td>Tuổi</td>
            <td>{{$customer->age}}</td>
            
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>{{$customer->gender}}</td>
            
        </tr>
    </table>
</body>
</html>