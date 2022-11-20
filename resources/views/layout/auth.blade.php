<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{secure_asset('public/assets/images/icons/favicon.png')}}"/>
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
    </head>
<body class="animsition">
	
	<!-- Logo desktop -->	
	<div style="margin-left: 45%; margin-right: 40% ; height:10% ; width: 15%;">
		<a href="index" class="logo">
			<img src={{secure_asset("public/assets/images/icons/logo-01.png")}} alt="IMG-LOGO">
		</a>
	</div>	
	
	@yield('content')
	
	<!-- Footer -->
	<footer class="bg3 p-t-30 ">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-10">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
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

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src={{secure_asset("public/assets/vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{secure_asset("public/assets/vendor/animsition/js/animsition.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{secure_asset("public/assets/vendor/bootstrap/js/popper.js")}}></script>
	<script src={{secure_asset("public/assets/vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{secure_asset("public/assets/vendor/select2/select2.min.js")}}></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src={{secure_asset("public/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{secure_asset("public/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js")}}></script>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src={{secure_asset("public/assets/js/map-custom.js")}}></script>
<!--===============================================================================================-->
	<script src={{secure_asset("public/assets/js/main.js")}}></script>
	<script>
		function myFunction() {
		var x = document.getElementById("mySelect").value;
		document.getElementById("demo").innerHTML = "You selected: " + x;
		}
		</script>

</body>
</html>