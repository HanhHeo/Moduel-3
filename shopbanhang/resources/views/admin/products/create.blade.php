@extends('layouts.master')

@section('content')

<div class="main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Sản phẩm</h1>
        </div>
        <!-- <div class="container" style="width:600px"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Thêm sản phẩm</div>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('products.store')}}">
                                <div class="row" style="margin-right:15px; margin-left:15px">
                                    @csrf
                                    <label>Tên sản phẩm:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <label for="">Giá sản phẩm</label>
                                    <input type="float" name="price" class="form-control" placeholder="Giá sản phẩm..."> <br>
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('price') }}</p>
                                        @endif
                                    </div>

                                    <label>Danh mục</label>
                                    <select name="category_id">
                                        @foreach($categories as $key =>$category)

                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <br> <br> <br>
                                    <label>Tình trạng</label>
                                    <select name="status">
                                        <option value="Còn hàng">Còn hàng</option>
                                        <option value="Hết hàng">Hết hàng</option>
                                       
                                    </select>
                                    <br>
                                    <label for="">Mô tả sản phẩm</label>
                                    <input type="text" name= "description" class= "form-control" placeholder="Nhập mô tả...">
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('description') }}</p>
                                        @endif
                                    </div>
                                    <br>
                                    <label for="">Ảnh</label>
                                    <input type="file" name="image" id="upload_file_input">
                                    <div class="error-message">
                                        @if ($errors->any())
                                        <p style="color:red">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Lưu</button>
                                    <a class="btn btn-danger" href="{{ route('products.index') }}"><i class="fas fa-undo"></i> Hủy</a>
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