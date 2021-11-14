<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
    <h1>Danh sách khách hàng</h1>
    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Giới tính</th>
                <th>Hành động</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->age }}</td>
                <td>{{ $customer->gender}}</td>
                <td>
                    <a href="{{route('customers.show', $customer->id)}}">Xem</a> | <a href="{{route('customers.edit', $customer->id)}}">Sửa</a> |
                    <a href="{{route('customers.destroy', $customer->id)}}">Xóa</a> 
                       
                

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>