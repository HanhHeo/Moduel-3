<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>ETsHAT Shop - Home</title>
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/home.css')}}">
	<script type="text/javascript" src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull = $('#pull');
			menu = $('nav ul');
			menuHeight = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function() {
			var w = $(window).width();
			if (w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>

<body>
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>

						<nav><a id="pull" class="btn btn-danger" href="#">
								<i class="fa fa-bars"></i>
							</a></nav>
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<input type="text" name="text" value="Nhập từ khóa ...">
					<input type="submit" name="submit" value="Tìm Kiếm">
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="#">Giỏ hàng</a>
					<a href="#"></a>
				</div>
				<div style="position: absolute;top:35px;left:1356px;z-index:20;">
					@if($users->id != 1)
					<div class="dropdown">
						<!-- <i class="fas fa-users-cog" style="display:inline"></i> -->
						<button class="btn btn-yellow dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{$users->name}}
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item" style="color:red">Danh mục sản phẩm</li>
							@foreach($categories as $category)
							<li class="menu-item"><a style="color:black" href="{{route('category',$category->id)}}" title="">{{$category->name}}</a></li>
							@endforeach
						</ul>

					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner1.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner2.gif')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner3.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-4.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-5.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-6.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-7.png')}}" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="{{asset('frontend/img/home/vivo.png')}}" alt="Los Angeles">
								</div>
								<div class="carousel-item">
									<img src="{{asset('frontend/img/home/galaxyz.png')}}" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="{{asset('frontend/img/home/iphone12.png')}}" alt="New York">
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>
					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="{{asset('frontend/img/home/samsungbanner.png')}}" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="{{asset('frontend/img/home/banner.png')}}" alt="" class="img-thumbnail"></a>
							</div>
						</div>
					</div>
					<br> <br>

					<div id="wrap-inner">
						<div id="list-cart">
							<h3 class="text-danger">Giỏ hàng</h3>

							@if (Session::has('success'))
							<div class="alert alert-success"> <i class="fas fa-check-square"></i> {{session::get('success')}}</div>
							@endif


							<table class="table table-bordered .table-responsive text-center">
								<thead>
									<tr class="active">
										<td width="22.222%">Ảnh sản phẩm</td>
										<td width="11.111%">Tên sản phẩm</td>
										<td width="11.111%">Số lượng</td>
										<td width="11.112%">Đơn giá</td>
										<td width="11.112%">Tổng tiền</td>
										<td width="11.112%">Chức năng</td>
									</tr>
								</thead>
								<tbody>
									@if(count($carts) === 0 )
									<tr>
										<td colspan="6">
											Chưa có sản phẩm
										</td>

									</tr>
									@else
									@foreach($carts as $cart)
									<tr>
										<td>
											<img width="100px" class="img-responsive" src="{{asset('upload/'. $cart->image)}}">
										</td>
										<td>{{$cart->name}}</td>
										<td>
											<div class="form-group">
												<form action="{{route('editcart')}}" method="POST" style="display:flex">
													@csrf
													<input type="hidden" name="product_id[]" value="{{$cart->product_id}}">
													<input class="form-control" type="number" name="quantity[]" value="{{$cart->quantity}}">
											</div>
										</td>
										<td><span class="price">{{number_format($cart->price). " VNĐ"}}</span></td>

										<td><span class="price">{{$cart->totalPrice}}</span></td>

										<td><a href="{{route('deletecart',$cart->id)}}" onclick="return confirm('Bạn có muốn xóa {{$cart->name}}?')" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>
									</tr>
									@endforeach
									@endif
								</tbody>
							</table>
							<div class="row" id="total-price">
								<div class="col-md-6 col-sm-12 col-xs-12">
									Tổng thanh toán: <span class="total-price">{{number_format($total)}}. " VNĐ"</span>

								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<a href="{{route('home')}}" class="my-btn btn">Mua tiếp</a>
									<a class="my-btn btn" type="submit">Cập nhật</a>

									<!-- <a href="#" class="my-btn btn">Xóa giỏ hàng</a> -->
								</div>
							</div>
							</form>
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<form>
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
							</form>
						</div>
					</div>



				</div>

	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">
		<div id="footer-t">
			<div class="container">
				<div class="row">
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
						SH PRO <a href="#"><img width="100px" src="{{asset('frontend/img/home/logosh.jpg')}}"></a>
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Về chúng tôi</h3>
						<p class="text-justify">SHpro Academy thành lập năm 2021
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Số điện thoại: (+84) 0981568889</p>
						<p>Email: hanhnguyen180695@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Liên hệ </h3>
						<p>Address 1: 137 Lý Thường Kiệt - Đông Hà - Quảng Trị</p>
						<p>Address 2: 593 Lê Duẩn - Đông Hà - Quảng Trị</p>
					</div>
				</div>
			</div>
			<div id="footer-b">
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Học viện Công nghệ ShPro</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2021 SHPro Academy</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="{{asset('frontend/img/home/scroll.png')}}"></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>

</html>