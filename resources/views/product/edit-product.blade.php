<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit/Update Product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{asset('assets/images/icons/favicon.png')}}"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animsition/css/animsition.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/slick/slick.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/MagnificPopup/magnific-popup.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
        <!--===============================================================================================-->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	</head>
<body class="animsition">
	
	<!-- Logo desktop -->	
	<div style="margin-left: 45%; margin-right: 40% ; height:10% ; width: 15%;">
		<a href="index" class="logo">
			<img src={{asset("assets/images/icons/logo-01.png")}} alt="IMG-LOGO">
		</a>
	</div>	
	
	<!-- Content page -->
	<section class="bg0 p-b-80">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-220 bor10 p-lr-70 p-t-20 p-b-30 p-lr-15-lg w-full-md" style="margin-left: auto; margin-right: auto;">
					<form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<h1 class="mtext-105 cl2 txt-center p-b-30">
							Edit/Update Product
						</h1>

						<label for="name">Product Name</label>
						<div class="bor8 m-b-2 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-10 p-r-30" type="name" name="name" value="{{$product->name}}" placeholder="Product name">
						</div>
						<span class="text-danger">@error('name') {{$message}} @enderror</span>

						<label for="description">Product Description</label>
						<div class="bor8 m-b-2 how-pos4-parent">
							<textarea class="stext-111 cl2 plh3 p-l-5 p-r-10" name="description" rows="6" cols="70">{{$product->description}}</textarea>
						</div>
						<span class="text-danger">@error('description') {{$message}} @enderror</span>
						
						<div class="m-t-10 m-b-10 ">
							<label for="photo" style="text-align: right; float:left; margin-right:15px;">Image</label>
							@if ($product->photo)
								<img width="300" src="{{asset($product->photo)}}" alt="ProductImage">
							@endif
							<input id="image" type="file" accept="image/*" name="photo" value="{{old('photo')}}" onchange="loadFile(event)">
							<p><img id="output" width="300" /></p>

						</div>
						<span class="text-danger">@error('photo') {{$message}} @enderror</span>

						<div class="m-t-10 m-b-10 how-pos4-parent">
							<label style=" float:left;margin-right: 0.5%" for="color">Color :</label>	
							<select class="js-example-tokenizer" style="width: 100%;" name="color[]" multiple="multiple"></select>
							<br>
							<label style=" float:left;margin-right: 0.5%" for="size">Size :</label>	
							<select class="js-example-tokenizer" style="width: 100%;" name="size[]" multiple="multiple"></select>
							<br>
						</div>
						
						<div class="m-t-10 m-b-25 how-pos4-parent">
							
							<label for="dimensions" style="float:left;margin-right: 0.5%">Dimensions :</label>	
							<input style="float:left; width: 15%;" class="bor8" type="dimensions" name="dimensions" value="{{$product->dimensions}}">
							<span style="float:left; margin-right: 5%">	cm</span>
							
							<label style=" float:left;margin-right: 0.5%" for="weight">weight :</label>	
							<input style="float:left; width: 10%;" class="bor8" type="weight" name="weight" value="{{$product->weight}}">
							
							<br>
							<br>
							<label style=" float:left; margin-right: 0.5%" for="materials">Materials :</label>	
							<input style="float:left; width: 15%; margin-right: 12%" class="bor8" name="materials" value="{{$product->materials}}">
							
							<label for="price" style="float:left;margin-right: 0.5%">Price :</label>	
							<input style="float:left; width: 10%;" class="bor8" type="price" name="price" value="{{$product->price}}">
							<span style="float:left;">
								@if ($country=="Egypt")
								EGP
								@else
								$
								@endif
							</span>
						</div>
							<br>
							<span class="text-danger">@error('materials') {{$message}} @enderror</span>
							<span class="text-danger">@error('price') {{$message}} @enderror</span>	

						<div class="how-pos4-parent	m-t-50 m-b-15">
							<label for="category" style="text-align: right; float:left; margin-right:15px;">Category : {{$categoryName}}</label>
							<br>
						</div>

						<div class="m-t-10 m-b-10 how-pos4-parent">
						<span for="country_id" name="country_id" >Country: {{$country}}</span>
							<span class="text-danger">@error('country_id') {{$message}} @enderror</span>
						</div>

						<div class="m-t-10 m-b-10 how-pos4-parent">
							<span for="seller">Seller: {{$name}}</span>
						</div>
						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-t-20">
							Submit
						</button>
	

					</form>
				</div>
			</div>
		</div>
	</section>	
	

	<!-- Footer -->
	<footer class="bg3 p-t-30 ">
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

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src={{asset("assets/vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/animsition/js/animsition.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/bootstrap/js/popper.js")}}></script>
	<script src={{asset("assets/vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/select2/select2.min.js")}}></script>

<!--===============================================================================================-->
	<script src={{asset("assets/vendor/MagnificPopup/jquery.magnific-popup.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js")}}></script>
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
	<script src={{asset("assets/js/map-custom.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/js/main.js")}}></script>
	<script>
		function loadFile(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script>
			$(".js-example-tokenizer").select2({
				tags: true,
				tokenSeparators: [',', ' ']
			})
		</script>
</body>
</html>