<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | ETs HAT shop</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <script src="js/lumino.glyphs.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#2F4F4F  !important">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Manager Shop </a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <!-- <use xlink:href="#stroked-male-user"></use> -->
                                <i class="fas fa-user-cog"></i>
                            </svg> User <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color:#2F4F4F !important">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class=""><a href="{{route('admin')}}"><svg class="glyph stroked dashboard-dial">
                        <i class="fas fa-home"></i>
                    </svg> Trang chủ</a></li>
            <li><a href="{{route('users.index')}}"><svg class="glyph stroked calendar">

                        <i class="fas fa-users"></i>
                    </svg> Khách hàng</a></li>

            <li><a href="{{route('products.index')}}"><svg class="glyph stroked calendar">

                        <i class="fas fa-box-open"></i>
                    </svg> Sản phẩm</a></li>

            <li><a href="{{route('categories.index')}}"><svg class="glyph stroked line-graph">

                        <i class="fab fa-dropbox"></i>
                    </svg> Danh mục</a></li>

            <li><a href="{{route('orders.index')}}"><svg class="glyph stroked calendar">

                        <i class="fas fa-file-invoice-dollar"></i>
                    </svg> Đơn hàng</a></li>
<!-- 
            <li><a href="{{route('orderdetail.index')}}"><svg class="glyph stroked calendar">

                        <i class="fas fa-info-circle"></i>
                    </svg>Chi tiết đơn hàng</a></li> -->

                    <li><a href="{{route('employees.index')}}"><svg class="glyph stroked calendar">

                    <i class="fas fa-user-lock"></i>
                    </svg>Quản lý nhân sự</a></li>

            <li role="presentation" class="divider"></li>
        </ul>

    </div>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('content')
    </div>
    <!--/.main-->


    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
        $('#calendar').datepicker({});

        ! function($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function() {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function() {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
</body>

</html>