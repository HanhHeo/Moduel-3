@extends('layouts.master')

@section('content')

<div class=" main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Danh sách đơn hàng</h1>
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
            <a href="{{route('orders.create')}}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Thêm đơn hàng</a>
            <br> <br>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách đơn hàng</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>STT</th>
                                        <th>Tên KH</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Thay đổi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=> $order)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>
                                            @if ($order->status == 0)
                                            Đang chờ
                                            @elseif ($order->status == 1)
                                            Đang vận chuyển
                                            @else
                                            Đã hoàn thành
                                            @endif
                                        </td>
                                        <td>{{ $order->total }}</td>
                                        <td>
                                            <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                            <a href="{{route('orders.edit',$order->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                            <form action="{{route('orders.destroy',$order->id)}}" method="post" style="display:inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa ?')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </table>
							<div class=" d-flex justify-content-end">
								{{ $orders->links() }}
							</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        @endsection




