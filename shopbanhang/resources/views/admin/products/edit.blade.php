@extends('layouts.master')

@section('content')

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Chỉnh sửa sản phẩm</h1>
            </div>
            <div class="row">
                <div class="form-group">
                    <form method="POST" action="{{route('products.update',$products->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label>Tên sản phẩm:</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm..." value="{{ $products->name }}"> <br>
                        <div class="error-message">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <label for="">Giá sản phẩm</label>
                        <input type="float" name="price" class="form-control" placeholder="Giá sản phẩm..." value="{{ $products->price }}"> <br>

                        <div class="error-message">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('price') }}</p>
                            @endif
                        </div>

                        <label>Danh mục</label>
                        <select name="category_id" id="">
                            @foreach($categories as $key => $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="error-message">
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('category_id') }}</p>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <div>Mô tả sản phẩm</div>
                            <input type="text-area" name="description" class="form-control" value= "{{$products->description}}">
                        
                        </div>
                        <label for="">Ảnh</label>
                        <img src="{{ asset('upload/'.$products->image)}}" width="100px"> <br> <br>
                        <input type="file" name="image" id="upload_file_input">
                        <br>
                        <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Lưu</button>
                        <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fas fa-undo"></i> Quay lại</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection