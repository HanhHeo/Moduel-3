@extends('layouts.master')

@section('content')

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Đơn hàng</h1>
            </div>
            <!-- <div class="container" style="width:600px"> -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Thêm sản phẩm</div>
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data" action="{{route('orderdetail.store')}}">
                                    <div class="row" style="margin-right:15px; margin-left:15px">
                                        @csrf
                                        <input type="hidden" name="order_id" value= "{{$order_id}}">
                                        <label>Sản phẩm:</label>
                                        <select type="text" name="product_id" class="form-control">
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="error-message">
                                            @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <br> <br>
                                        <label>Số lượng</label>
                                        <input type="number" name="quantity" class="form-control">
                                        <div class="error-message">
                                            @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('quantity') }}</p>
                                            @endif
                                        </div>
                                        <br>
                                        <label>Giá</label>
                                        <input type="number" name="price" class="form-control">
                                        <div class="error-message">
                                            @if ($errors->any())
                                            <p style="color:red">{{ $errors->first('price') }}</p>
                                            @endif
                                        </div>

                                        <br>

                                        <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Tạo</button>
                                        <a class="btn btn-danger" href="{{ route('orders.index') }}"><i class="fas fa-undo"></i> Hủy</a>
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