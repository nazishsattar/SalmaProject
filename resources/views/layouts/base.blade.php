<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Home</title>	
	{{-- auth --}}

	<link rel="stylesheet" href="{{asset('assets/auth/loginstyle.css')}}">

	{{-- Web lik --}}
   	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/stylea.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
	{{-- //cat --}}
	<link rel="stylesheet" href="{{ asset('assets/testing1/fonts/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/testing1/vendor/slickslider/slick.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/testing1/css/main.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/testing1/css/index.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/testing1/css/home-category.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/testing1/css/about.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/testing1/css/home-standard.css')}}">
	
	

	<link rel="stylesheet" href="{{ asset('assets/testing1/css/home-grid.css')}}"> 
	{{-- <link rel="stylesheet" href="{{ asset('assets/testing1/font/flaticon.css')}}">  --}}
	{{-- loader --}}
	{{-- <link rel="stylesheet" href="{{ asset('assets/loader/css/normalize.css')}}"> --}}
	<link rel="stylesheet" href="{{ asset('assets/loader/css/mainloader.css')}}">	
</head>
@livewireStyles
<body class="home-page home-01 ">
	<div class="backdrop"></div><a class="backtop fa fa-arrow-up" href="#"></a>
	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Hotline: +92 3122680667 , +92 3219202688" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: +92 3122680667 , +92 3219202688 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total Billing amount should be greater than atleast 1500 otherwise order will be auto cancel.</b> </a>	
								</li>
							
								{{-- <li class="menu-item">
									<p style="margin-right:100px;color:#e40c14"><b>Total Billing amount should be greater than atleast 1500 otherwise order will be auto cancel.</b></p>
							   </li> --}}
							</ul>
						</div>
						
						<div class="topbar-menu right-menu">
							<ul>
								{{-- <li class="menu-item" ><a title="Register or Login" href="login.html">Login</a></li>
								<li class="menu-item" ><a title="Register or Login" href="register.html">Register</a></li> --}}
								{{-- <li class="menu-item lang-menu menu-item-has-children parent">
									<a title="English" href="#"><span class="img label-before"><img src="assets/images/lang-en.png" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu lang" >
										<li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="assets/images/lang-hun.png" alt="lang-hun"></span>Hungary</a></li>
										<li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="assets/images/lang-ger.png" alt="lang-ger" ></span>German</a></li>
										<li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="assets/images/lang-fra.png" alt="lang-fre"></span>French</a></li>
										<li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="assets/images/lang-can.png" alt="lang-can"></span>Canada</a></li>
									</ul>
								</li> --}}
										
								@if(Route::has('login'))
									@auth
										@if(Auth::user()->utype==='ADM')
										<li class="menu-item menu-item-has-children parent" >
											<a title="My Account" href="#">My Account({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="submenu curency" >
												<li class="menu-item" >
													<a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
												</li>
												<li class="menu-item">
												<a title="Categories" href="{{route('admin.categories')}}">Categories</a>
												</li>
												<li class="menu-item">
													<a title="Products" href="{{route('admin.products')}}">All Products</a>
													</li>
													<li class="menu-item">
														<a title="Manage Home Slider" href="{{route('admin.homeslider')}}">Manage Home Slider</a>
													</li>
														<li class="menu-item">
															<a title="Manage Home Categories" href="{{route('admin.homecategories')}}">Manage Home Categories</a>
														</li>
														<li class="menu-item">
															<a title="Sale Setting" href="{{route('admin.sale')}}">Sales Setting</a>
														</li>
														<li class="menu-item">
															<a title="All Orders" href="{{route('admin.orders')}}">All Orders</a>
														</li>
														<li class="menu-item">
															<a title="Contact Messages" href="{{route('admin.contact')}}">Contact Messages</a>
														</li>

												<li class="menu-item">
													<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
													</li>
												<form id="logout-form" method="POST" action="{{route('logout')}}">
													@csrf
												
											</form>
											</ul>
										</li>
										@else
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('user.dashboard')}}">Dashboard</a>
													</li>
													<li class="menu-item" >
														<a title="My Orders" href="{{route('user.orders')}}">My Orders</a>
													</li>
													<li class="menu-item" >
														<a title="My Profile" href="{{route('user.profile')}}">My Profile</a>
													</li>
													<li class="menu-item" >
														<a title="Change Password" href="{{route('user.changepassword')}}">Change Password</a>
													</li>
													<li class="menu-item">
														<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
														</li>
													<form id="logout-form" method="POST" action="{{route('logout')}}">
														@csrf
													
												</form>
												</ul>
											</li>
										@endif
									@else
									<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
									<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
									@endif						
								@endif
							</ul>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="mid-section main-info-area">
					<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{asset('assets/images/salmasuper.png')}}" alt="mercado"></a>
						</div>
						@livewire('header-search-component')
						<div class="wrap-icon right-section">
							@livewire('wishlist-count-component')
							@livewire('cart-count-component')			
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>
				</div>
				</div>
					<div class="nav-section header-sticky">
					<div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="/product-category/women-garment" class="link-term">Women Collection</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="/product-category/men-garments" class="link-term">Men Collection</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="/product-category/cosmetics" class="link-term">Cosmectic items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="/product-category/electronics" class="link-term">Electronics</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="/product-category/kids" class="link-term">Kids items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div>
					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="/aboutus" class="link-term mercado-item-title">About Us</a>
								</li>
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
								<li class="menu-item">
									<a href="/contact-us" class="link-term mercado-item-title">Contact Us</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	{{$slot}}
	{{-- <section class="news-part" style="background: url('{{ asset('assets/images/newsletter.jpg')}}') no-repeat center;">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-5 col-lg-6 col-xl-7">
					<div class="news-text">
						<h2>Get 20% Discount for Subscriber</h2>
						<p>Lorem ipsum dolor consectetur adipisicing accusantium</p>
					</div>
				</div>
			   
			</div>
		</div>
	</section> --}}
	{{-- footer above section --}}
	<div class="wrap-footer-content footer-style-1" >
		<div class="wrap-function-info" >
			<div class="container" >
				<ul>
					<li class="fc-info-item" >
						<i class="fa fa-truck" aria-hidden="true"></i>
						<div class="wrap-left-info">
							<h4 class="fc-name">Shipping Charges</h4>
							<p class="fc-desc">Depend on Distance</p>
						</div>

					</li>
					<li class="fc-info-item">
						<i class="fa fa-recycle" aria-hidden="true"></i>
						<div class="wrap-left-info">
							<h4 class="fc-name">Guarantee</h4>
							<p class="fc-desc">7 Days</p>
						</div>

					</li>
					<li class="fc-info-item">
						<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
						<div class="wrap-left-info">
							<h4 class="fc-name">Safe Payment</h4>
							<p class="fc-desc">Safe your online payment</p>
						</div>

					</li>
					<li class="fc-info-item">
						<i class="fa fa-life-ring" aria-hidden="true"></i>
						<div class="wrap-left-info">
							<h4 class="fc-name">Online Suport</h4>
							<p class="fc-desc">We Have Support 24/7</p>
						</div>

					</li>
				</ul>
			</div>
		</div>
	</div>
	@livewire('footer-component')
	{{-- cat --}}
	<script src="{{ asset('assets/testing1/vendor/bootstrap/jquery-1.12.4.min.js')}}"></script>  
	<script src="{{asset('assets/testing1/vendor/slickslider/slick.min.js')}}"></script>
    <script src="{{asset('assets/testing1/js/slick.js')}}"></script>
  {{-- loader--}}
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{asset('assets/loader/js/mainloader.js')}}"></script>
  <script src="{{ asset('assets/loader/js/vendor/modernizr-2.6.2.min.js')}}"></script> 

	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>	
	<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.tiny.cloud/1/wc1pzfvj2jecfeh89va4ovra5ewkqaz5odn1lpnstyzd9b77/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>	  
	@livewireScripts
	@stack('scripts')
</body>
</html>