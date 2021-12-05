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
					<form action="">
					<input type="text" name="search" placeholder="Nhập từ khóa ...">
					<button type="submit" >Tìm kiếm</button>
					</form>
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
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$products->name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img  width= "200px" height= "200px" src="{{ asset('upload/'. $products->image)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{number_format($products->price). " VNĐ"}}</span></p>
									<p>Bảo hành: 1 đổi 1 trong 12 tháng</p> 
									<p>Phụ kiện: Dây cáp sạc, tai nghe</p>
									<p>Tình trạng: Máy mới 100%</p>
									<p>Khuyến mại: Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank</p>
									<p>Tình trạng: Còn hàng</p>
									<!-- <p class="add-cart text-center"><a href="#">Đặt hàng online</a></p> -->
								</div>
								<div>
								<div >
										<a href="{{route('home')}}" class="btn btn-outline-primary">Tiếp tục mua hàng</a>
										<a href="{{route('addtocart',$products->id)}}" class="btn btn-outline-danger">Thêm vào giỏ hàng</a>
									
									</div>
								</div>
								<!-- <a href="" class= "btn btn-outline-danger ">Thêm vào giỏ hàng</a>    
								 <button href="" class= "btn btn-outline-success">Tiếp tục mua hàng</button> -->
							</div>							
						</div>
						<div id="product-detail">
							<br>
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify"></p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method= "POST">
									@csrf
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="com_name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-success">Gửi</button>
									</div>
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($comments as $comment)
							<ul>
								<li class="com-title">
								Tên:{{$comment->com_name}}
									<br>
									<span>Ngày bình luận: {{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>	
								</li>
								<li class="com-details">
									Nội dung:{{$comment->com_content}}
								</li>
							</ul>
						@endforeach
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