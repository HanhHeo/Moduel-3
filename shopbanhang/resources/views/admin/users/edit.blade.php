@extends('layouts.master')

@section('content')

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Chỉnh sửa người dùng</h1>
            </div>
            <div class="row">
                <div class="col-sm-6">
               
                    <form method="post" action="{{ route('users.update',$users->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="name" class="form-control" placeholder="Tên người dùng..." value="{{ $users->name }}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Nhập email" value="{{ $users->email }}" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{ $users->address }}" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Sô điện thoại" value="{{ $users->phone }}" />
                        </div>

                        <button type="submit" value="Cập nhật" class="btn btn-success"><i class="far fa-save"></i> Cập nhật</button>
                        <a class="btn btn-danger" href="{{ route('users.index') }}"><i class="fas fa-undo"></i> Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection