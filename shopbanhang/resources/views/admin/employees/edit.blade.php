@extends('layouts.master')

@section('content')

<div class="main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Nhân viên</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Chỉnh sửa nhân viên</div>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('employees.update',$employee->id)}}">
                                <div class="row" style="margin-right:15px; margin-left:15px">
                                    @csrf
                                    @method('PUT')
                                    <label for="name">Tên nhân viên:</label>
                                    <input type="text" name="name" placeholder="Tên nhân viên" id="name" class="form-control" value= "{{$employee->name}}">
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <br> 
                                    <label>Chức vụ</label>
                                    <select name="group_id">
                                        @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    <br> <br>
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <br>
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Mật khẩu" class="form-control">
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                    <br>
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" placeholder="Địa chỉ" class="form-control">
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Tạo</button>
                                    <a class="btn btn-danger" href="{{ route('employees.index') }}"><i class="fas fa-undo"></i> Hủy</a>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection