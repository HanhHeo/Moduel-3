@extends('layouts.master')

@section('content')

<div class=" main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Chi tiết đơn hàng</h1>
        </div>
    </div>
    <nav class="navbar">
        <form class="form-inline" action="#" method="GET" style="display:flex">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm danh mục..." name="search" style="height:33px">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </nav>
    @if (Session::has('success'))
    <div class="alert alert-success"> <i class="fas fa-check-square"></i> {{session::get('success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('orderdetail.show',$order->id)}}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Thêm sản phẩm</a>
            <br> <br>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Xem chi tiết đơn hàng</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng tiền</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->order_details as $key=>$orderdetail)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                       
                                        <td>{{ $orderdetail->order->code}}</td> 
                                        <td>{{$orderdetail->product->name}} </td>
                                        <td>{{ $orderdetail->quantity }}</td>
                                        <td>{{ $orderdetail->price}}</td>
                                        <td>{{ $orderdetail->total }}</td>
                                        <td>
                                           
                                            <a href="{{route('orderdetail.edit',$orderdetail->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="{{route('orderdetail.destroy',$orderdetail->id)}}" method="post" style="display:inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa danh mục {{ $order->name }} ?')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        @endsection




