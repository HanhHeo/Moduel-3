@extends('layouts.master')

@section('content')
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class=" text-center">Chỉnh Sửa Danh Mục</h1>
            </div>
            <div class="form-group">
                <form method="POST" action="{{route('categories.update',$categories->id)}}">
                    @csrf
                    @method('put')
                    <label>Tên danh mục:</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$categories->name}}"> <br>
                    <div class="error-message">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <input type="text" name="code" class="form-control" placeholder="Mã danh mục..." value="{{$categories->code}}"> <br>
                    <div class="error-message">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('code') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Cập nhật</button>
                    <a class= "btn btn-danger" href="{{ route('categories.index') }}"><i class="fas fa-undo"></i> Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection