@extends('layouts.master')

@section('content')
<style>
    #navbar {
        margin-top: 10px;
    }

    #tbl-first-row {
        font-weight: bold;
    }

    #logout {
        padding-right: 20px;
    }
</style>

<div class="container">
    <div id="navbar" class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Danh sách người dùng</h1>
            <br>
            <nav class="navbar">
                <form class="form-inline" action="#" method="GET" style="display:flex">
                    
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm danh mục..." name="search" style="height:33px">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </nav>
        </div>
    </div>
    <!-- <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Add user</a></li>
            </ul>
            <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="#">Logout</a></p>
        </div>
    </nav> -->
    @if (Session::has('success'))
    <div class="alert alert-success"> <i class="fas fa-check-square"></i> {{session::get('success')}}</div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <!-- <div class="alert alert-success">Added user success!</div> -->
            <a href="{{route('users.create')}}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Thêm người dùng</a>
            <br> <br>

            <table class="table table-striped">
                <thead>
                    <tr id="tbl-first-row">
                        <td>STT</td>
                        <td width="30%">Tên người dùng</td>
                        <td>Email</td>
                        <td>Số điện thoại</td>
                        <td>Địa chỉ</td>
                        <td>Thao tác</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            <form action="{{route('users.destroy',$user->id)}}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa người dùng {{$user->name}}?')"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection