

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Coza Store - @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{asset('public/assets/images/icons/favicon.png')}}"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/animsition/css/animsition.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/daterangepicker/daterangepicker.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/slick/slick.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/MagnificPopup/magnific-popup.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{secure_asset('public/assets/css/main.css')}}">
        <!--===============================================================================================-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<style>
			#hover:hover {
			color:#6c7ae0;
			}
			.wrapper { display: flex; justify-content: center;}    
			.content { position: relative; width: max-content}
			.content img { display: block; }
			.content a { position: absolute; top:10px; right:10px; }
		</style>
	</head>

    <body class="animsition">
	
        <!-- Header -->
        <header>
            <!-- Header desktop -->
            <div class="container-menu-desktop">
                <!-- Topbar -->
                <div class="top-bar">
                    <div class="content-topbar flex-sb-m h-full container">
						<div class="center-top-bar" style="margin-left: 20%; width: 40% ">
							<div class="input-group rounded">
								<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
								<span class="input-group-text border-0" id="search-addon">
									<button type="button" class="btn btn-primary">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						</div>
    
                        <div class="right-top-bar flex-w h-full">
                            <a href="#" class="flex-c-m trans-04 p-lr-25">
                                Help & FAQs
                            </a>
							
							<a href="#" class="flex-c-m trans-04 p-lr-25">
                                EN
                            </a>
                            
							@if ($data->type === "user" || $data->type === "seller" || $data->type === "admin")
							<a class="span flex-c-m trans-04 p-lr-25" href="#">Hello {{$data->name}}</span>
							<a class="flex-c-m trans-04 p-lr-25" href="/logout">Log out</a>
							
							@else
							<a href="/login-user" class="flex-c-m trans-04 p-lr-25">Sign in</a>
							<a href="/register" class="flex-c-m trans-04 p-lr-25">Register</a>
							@endif
                            
                        </div>
                    </div>
                </div>
    
                <div class="wrap-menu-desktop">
                    <nav class="limiter-menu-desktop container p-r-0">
                        
                        <!-- Logo desktop -->		
                        <a href="/" class="logo">
                            <img src="{{asset('public/assets/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                        </a>
    
                        <!-- Menu desktop -->
                        <div class="menu-desktop">
                            <ul class="main-menu">
                                <li	class = "{{ Request::route()->getName() === 'index'? "active-menu" : ''}}">
                                    <a href="/">Home</a>
                                </li>
    
                                <li>
									<span id="hover"> Categories </span>
									<ul class="sub-menu">
										@for ($i = 1; $i < count($category)+1; $i++)
											<li><a href="/product">{{$title = $category->where('id' , '=' ,$i)->first()->title}}</a></li>
										@endfor
									</ul>
                                </li>

                                <li class = "{{ $s = Request::route()->getName() === 'about'? "active-menu" : ''}}">
                                    <a href="/about">About</a>
                                </li>
    
                                <li class = "{{ $s = Request::route()->getName() === 'contact'? "active-menu" : ''}}">
                                    <a href="/contact">Contact</a>
                                </li>
                            </ul>
                        </div>	
    
                        <!-- Icon header -->
                        <div class="wrap-icon-header flex-w flex-r-m">
							@if (!($data->type == 'seller'))
							<a href="/seller-login" class="dis-block icon-header-item cl2 hov-cl1 trans-04">
								<img src="{{asset('public/assets/images/icons/greetings.png')}}" alt="greetings">
								<span style="font-size: 12px;">
									<b>Join Us on Easy4u & sell your products</b>
								</span>
							</a>
							@endif
							@if ($data->type == 'user')
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify={{count($allproduct)}}>
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							@endif
						</div>
                    </nav>
                </div>	
            </div>
    
            <!-- Header Mobile -->
            <div class="wrap-header-mobile">
                <!-- Logo moblie -->		
                <div class="logo-mobile">
                    <a href="/"><img src="{{asset('public/assets/images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
                </div>
    
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m m-r-15">
					@if ($data->type == 'user')
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify={{count($allproduct)}}>
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					@endif
                </div>
    
                <!-- Button show menu -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>
    
    
            <!-- Menu Mobile -->
            <div class="menu-mobile">
                <ul class="topbar-mobile">
                    <li>
                        <div class="center-top-bar" style="margin-left: 20%; width: 40% ">
							<div class="input-group rounded">
								<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
								<span class="input-group-text border-0" id="search-addon">
									<button type="button" class="btn btn-primary">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						</div>
                    </li>
    
                    <li>
                        <div class="right-top-bar flex-w h-full">
                            <a href="#" class="flex-c-m p-lr-10 trans-04">
                                Help & FAQs
                            </a>
    
                            <a href="#" class="flex-c-m p-lr-10 trans-04">
                                EN
                            </a>

							@if ($data->type=="user" || $data->type=="seller" || $data->type=="admin")
							<a class="span flex-c-m trans-04 p-lr-25" href="#">Hello {{$data->name}}</span>
							<a class="flex-c-m trans-04 p-lr-25" href="/logout">Log out</a>
							
							@else
							<a href="/login-user" class="flex-c-m trans-04 p-lr-25">Sign in</a>
							<a href="/register" class="flex-c-m trans-04 p-lr-25">Register</a>
							@endif

                        </div>
                    </li>
                </ul>
    
                <ul class="main-menu-m">
                    <li>
                        <a href="/">Home</a>
                        <ul class="sub-menu-m">
                            <li><a href="/index">Homepage 1</a></li>
                            <li><a href="/home-02">Homepage 2</a></li>
                            <li><a href="/home-03">Homepage 3</a></li>
                        </ul>
                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
	
                    <li>
						<span style="margin-left: 2%"><b>Categories</b></span>
						<ul class="sub-menu-m">
							<li><a href="/index">Mobiles, Tablets & Accessories</a></li>
							@for ($i = 1; $i < count($category)+1; $i++)
								<li><a href="/home-03">{{$title = $category->where('id' , '=' ,$i)->first()->title}}</a></li>
							@endfor
						</ul>
						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
                    </li>
    
                    <li>
                        <a href="/about">About</a>
                    </li>
    
                    <li>
                        <a href="/contact">Contact</a>
                    </li>
					@if (!($data->type == 'seller'))	
						<li>
							<a href="/seller-login">
								<img src="{{asset('public/assets/images/icons/greetings.png')}}" alt="greetings">
								<span style="font-size: 13px; margin-left: 2%">
									<b><i> Join Us on Easy4u & sell your products </i></b>
									
								</span>
							</a>
						</li>
					@endif
                </ul>
            </div>
    
            <!-- Modal Search -->
            <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                <div class="container-search-header">
                    <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                        <img src="{{asset('public/assets/images/icons/icon-close2.png')}}" alt="CLOSE">
                    </button>
    
                    <form class="wrap-search-header flex-w p-l-15">
                        <button class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="plh3" type="text" name="search" placeholder="Search...">
                    </form>
                </div>
            </div>
        </header>
	
		<!-- Cart -->
		@if ($data->type == 'user')
			<div class="wrap-header-cart js-panel-cart">
				<div class="s-full js-hide-cart"></div>

				<div class="header-cart flex-col-l p-l-65 p-r-25">
					<div class="header-cart-title flex-w flex-sb-m p-b-8">
						<span class="mtext-103 cl2">
							Your Cart
						</span>

						<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
							<i class="zmdi zmdi-close"></i>
						</div>
					</div>
							<div class="header-cart-content flex-w js-pscroll">
								<ul class="header-cart-wrapitem w-full">
									@for ($i=0; $i < count($allproduct); $i++)
											<li class="header-cart-item flex-w flex-t m-b-12">
												<div class="header-cart-item-img">
													<img src={{asset($allproduct[$i]->photo)}} alt="IMG">
												</div>
												<div class="header-cart-item-txt p-t-8" style="width: 60%">
													<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
														{{$allproduct[$i]->name}}
													</a>
													<span class="header-cart-item-info">
														$ {{$allproduct[$i]->price}}
													</span>
												</div>
												<div class="header-cart-item p-t-8">
													
													<a href="{{ route('cart.remove', $allproduct[$i]->id) }}" class="" title="Remove Cart">
														<i class="fa fa-trash m-t-20" style="font-size:20px;color:rgb(146, 0, 0)" aria-hidden="true"></i>
													</a>
												</div>
											</li>
									@endfor
								</ul>
								<div class="w-full">
									<div class="header-cart-total w-full p-tb-40">
										@php
											$price=0.0;
											for ($i=0; $i < count($allproduct); $i++){
												$price += $allproduct[$i]->price;					
											}
										@endphp
										$ {{$price}}
									</div>

									<div class="header-cart-buttons flex-w w-full">
											<a href="/shoping-cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10" style="min-width:270px">
												View Cart
											</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
		@endif

		@yield('content')
		
		<!-- Back to top -->
		<div class="btn-back-to-top" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="zmdi zmdi-chevron-up"></i>
			</span>
		</div>

		<!-- Footer -->
		<footer class="bg3 p-t-30">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3 p-b-10">
						<h4 class="stext-301 cl0 p-b-30">
							Categories
						</h4>
	
						<ul>	
						@for ($i = 1; $i < count($category)+1; $i++)
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								{{$title = $category->where('id' , '=' ,$i)->first()->title}}
								</a>
							</li>
						@endfor
						</ul>
					</div>
	
					<div class="col-sm-6 col-lg-3 p-b-10">
						<h4 class="stext-301 cl0 p-b-30">
							Help
						</h4>
	
						<ul>
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Track Order
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Returns 
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									Shipping
								</a>
							</li>
	
							<li class="p-b-10">
								<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
									FAQs
								</a>
							</li>
						</ul>
					</div>
	
					<div class="col-sm-6 col-lg-3 p-b-10">
						<h4 class="stext-301 cl0 p-b-30">
							GET IN TOUCH
						</h4>
	
						<p class="stext-107 cl7 size-201">
							Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
						</p>
	
						<div class="p-t-27">
							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-facebook"></i>
							</a>
	
							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-instagram"></i>
							</a>
	
							<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
								<i class="fa fa-pinterest-p"></i>
							</a>
						</div>
					</div>
	
					<div class="col-sm-6 col-lg-3 p-b-10">
						<h4 class="stext-301 cl0 p-b-30">
							Newsletter
						</h4>
	
						<form>
							<div class="wrap-input1 w-full p-b-4">
								<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
								<div class="focus-input1 trans-04"></div>
							</div>
	
							<div class="p-t-18">
								<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
									Subscribe
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</footer>

	<!--===============================================================================================-->	
		<script src="{{secure_asset('public/assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/bootstrap/js/popper.js')}}"></script>
		<script src="{{secure_asset('public/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/select2/select2.min.js')}}"></script>
		<script>
			$(".js-select2").each(function(){
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next('.dropDownSelect2')
				});
			})
		</script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/daterangepicker/moment.min.js')}}"></script>
		<script src="{{secure_asset('public/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/slick/slick.min.js')}}"></script>
		<script src="{{secure_asset('public/assets/js/slick-custom.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/parallax100/parallax100.js')}}"></script>
		<script>
			$('.parallax100').parallax100();
		</script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
		<script>
			$('.gallery-lb').each(function() { // the containers for all your galleries
				$(this).magnificPopup({
					delegate: 'a', // the selector for gallery item
					type: 'image',
					gallery: {
						enabled:true
					},
					mainClass: 'mfp-fade'
				});
			});
		</script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<script>
			$('.js-pscroll').each(function(){
				$(this).css('position','relative');
				$(this).css('overflow','hidden');
				var ps = new PerfectScrollbar(this, {
					wheelSpeed: 1,
					scrollingThreshold: 1000,
					wheelPropagation: false,
				});

				$(window).on('resize', function(){
					ps.update();
				})
			});
		</script>
	<!--===============================================================================================-->
		<script src="{{secure_asset('public/assets/js/main.js')}}"></script>
		<script>
			function proId(productId) {
				valueId = productId["id"];
				document.getElementById("idproduct").value = valueId; // id of the product
			}
		</script>
	<livewire:scripts />
	</body>
</html>
