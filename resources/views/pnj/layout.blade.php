<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PNJ STORE</title>
    <link href="{{asset('pnj/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('pnj/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('pnj/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('pnj/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('pnj/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('pnj/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('pnj/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('pnj/js/html5shiv.js')}}"></script>
    <script src="{{asset('pnj/js/respond.min.js')}}"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('pnj/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('pnj/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('pnj/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('pnj/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('pnj/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('pnj/images/home/logo.png')}}" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('pnj.index')}}" class="active">Trang ch???</a></li>
								<li class="dropdown"><a href="#">Ph??n lo???i<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($classify_menus as $classify_menu )
                                        <li><a href="{{route('pnj.show.classify',['slug_classify'=>$classify_menu->id])}}">{{$classify_menu->name}}</a></li>
										@endforeach
                                    </ul>
                                </li>
								<li><a href="{{route('pnj.show.order')}}">Gi??? h??ng</a></li>
								<li><a href="contact-us.html" target="blank">Th??ng tin v??? ch??ng t??i</a></li>
								<li><a href="https://www.pnj.com.vn/blog/gia-vang/" target="blank">B???ng	 gi?? v??ng PNJ</a></li>
							</ul>
						</div>
						<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-indicators">
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
								<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
							</div>
							<div class="carousel-inner">
								<div class="carousel-item active">
								<img src="./pnj/home/bongtai paner.png" class="d-block w-100" alt="panner1">
								</div>
								<div class="carousel-item">
								<img src="./pnj/home/nh???n paner.png" class="d-block w-100" alt="panner2">
								</div>
								<div class="carousel-item">
								<img src="./pnj/home/l???c paner.png" class="d-block w-100" alt="panner3">
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section>
		@yield('content')
	</section>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="companyinfo">
							<h2><span>PNJ</span> STORE</h2>
							<p>?? 2017 C??ng Ty C??? Ph???n V??ng B???c ???? Qu?? Ph?? Nhu???n 
							<br>
							170E Phan ????ng L??u, P.3, Q.Ph?? Nhu???n, TP.H??? Ch?? Minh
							<br>
							??T: 028 39951703 - Fax: 028 3995 1702 
							<br>
							 Gi???y ch???ng nh???n ????ng k?? doanh nghi???p: 0300521758.</p>
				</div>
			</div>
		</div>
		<div class="footer-widget">
			<div class="container">
				<div class="single-widget">
					<h2>About Shopper</h2>
					<form action="#" class="searchform">
						<input type="text" placeholder="Your email address" />
						<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
						<p>T???ng ????i h??? tr??? (08:00-21:00, mi???n ph?? g???i)
						<br>
						G???i mua: 1800545457 (ph??m 1)
						<br>
						Khi???u n???i: 1800545457 (ph??m 2)</p>  
					</form>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
    <script src="{{asset('pnj/js/jquery.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="{{asset('pnj/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('pnj/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('pnj/js/price-range.js')}}"></script>
    <script src="{{asset('pnj/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('pnj/js/main.js')}}"></script>
	@stack('scripts')
</body>
</html>
