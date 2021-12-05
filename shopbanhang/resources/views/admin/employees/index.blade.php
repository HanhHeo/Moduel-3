@extends('layouts.master')

@section('content')

<div class=" main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">Danh sách nhân viên</h1>
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
            <a href="{{ route('employees.create') }}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Thêm nhân viên</a>
            <br> <br>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách nhân viên</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Chức vụ</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        @endsection