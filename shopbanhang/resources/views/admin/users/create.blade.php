@extends('layouts.master')

@section('content')

<div class="main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center"> Người dùng</h1>
            <br>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row" style="margin-right: 15px; margin-left: 15px;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Thêm người dùng</div>
                            <div class="panel-body">
                                <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <label>Tên khách hàng:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên khách hàng..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <br>

                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>

                                    <label for="">Xác nhận mật khẩu</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('confirm_password') }}</p>
                                        @endif
                                    </div>
                                    <br>
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>
                                    <br>
                                    <label for="">Số điện thoại</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Số điện thoại..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Lưu</button>
                                    <a class="btn btn-danger" href="{{ route('users.index') }}"><i class="fas fa-undo"></i> Hủy</a>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection