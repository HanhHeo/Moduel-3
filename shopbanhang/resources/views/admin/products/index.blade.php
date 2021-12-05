@extends('layouts.master')

@section('content')
<div class="main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header text-center">Danh sách sản phẩm</h1>
		</div>
	</div>
	<nav class="navbar">
		<form class="form-inline" action="#" method="GET" style="display:flex">
			@csrf
			<input class="form-control mr-sm-2" type="search" placeholder="Tìm danh mục..." name="search" style="height:33px">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
		</form>
	</nav>
	<!--/.row-->
	@if (Session::has('errors'))
	<p class="text-danger">
		<i class="fa fa-exclamation" aria-hidden="true"></i>{{ Session::get('errors') }}
	</p>
	@endif

	@if (Session::has('success'))
	<div class="alert alert-success"> <i class="fas fa-check-square"></i> {{session::get('success')}}</div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<!-- <div class="panel-heading">Danh sách sản phẩm</div> -->
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="{{route('products.create')}}" class="btn btn-primary"><i class="fas fa-folder-plus"></i> Thêm sản phẩm</a>
							<table class="table table-bordered" style="margin-top:20px;">
								<thead>
									<tr class="bg-primary">
										<th>STT</th>
										<th>Tên Sản phẩm</th>
										<th>Ảnh sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th>Danh mục</th>
										<th>Tình trạng</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $key=> $product)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $product->name}}</td>
										<td>
											<img width="130px" style="margin:auto" src="{{ asset('upload/'. $product->image)}}" class="thumbnail">
										</td>
										<td>{{ number_format($product->price)." VNĐ" }}</td>
										<td>{{ $product->category->name }}</td>
										<td>{{$product->status}}</td>
										<td>
											<a href="{{route('products.edit',$product->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
											<form action="{{route('products.destroy',$product->id)}}" method="post" style="display:inline">
												@csrf
												@method('delete')
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
												<i class="far fa-trash-alt"></i>
												</button>

												<!-- Modal -->
												<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																Bạn có muốn xóa {{$product->name}} ?
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
																<button type="submit" class="btn btn-danger">Xóa</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class=" d-flex justify-content-end">
								{{ $products->links() }}
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
<!--/.main-->
@endsection