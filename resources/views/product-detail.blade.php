@extends('layout.master')
@section('title','product-details')
@section('content')
	<!-- breadcrumb -->
	<div class="container"  style="margin-top: 4%;">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product" class="stext-109 cl8 hov-cl1 trans-04">
				Men
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{$productName}}
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb={{asset($productImage)}}>
									<div class="wrap-pic-w pos-relative">
										<img src={{asset($productImage)}} alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset($productImage)}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb={{asset("assets/images/product-detail-02.jpg")}}>
									<div class="wrap-pic-w pos-relative">
										<img src={{asset("assets/images/product-detail-02.jpg")}} alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href={{asset("assets/images/product-detail-02.jpg")}}>
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb={{asset("assets/images/product-detail-03.jpg")}}>
									<div class="wrap-pic-w pos-relative">
										<img src={{asset("assets/images/product-detail-03.jpg")}} alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href={{asset("assets/images/product-detail-03.jpg")}}>
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-5">
							{{$productName}}
						</h4>

						<span class="mtext-106 cl2">
							{{$productPrice}} $
						</span>
						<h5 style="font-size: 17px; margin-top: 5%"><b>Description:</b></h5>
						<p class="stext-102 cl3 p-t-20">
							{{$productDes}}				
						</p>
						
						<!-- Size && Color -->
						<div class="p-t-33">
							<!-- Size -->
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option disabled selected>Choose a size</option>
											@for ($i = 0; $i < count($productSize); $i++)
											<option>{{$productSize[$i]}}</option>
											@endfor
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>
							<!-- Color -->
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option disabled selected>Choose a color</option>
											@for ($i = 0; $i < count($productColor); $i++)
											<option>{{$productColor[$i]}}</option>
											@endfor
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<!-- Counter -->
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<form action="{{ route('cart.store') }}" method="POST">
										@csrf
										@if (Session::has('loginId'))
											@if ($type == 1)
												<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
													Add to cart
												</button>
											@else
											<p class="stext-102 cl3 p-t-23">You have to login as a user</p>
											@endif
										@else
										<p class="stext-102 cl3 p-t-23">You have to login first</p>
										@endif
										<input type="hidden" value="{{$productId}}" name="id">											
									</form>
									
								</div>
							</div>	
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">

						<!-- Additional information -->
						<div class="tab-pane fade show active" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												{{$productWeight}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												{{$productDim}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												{{$productMaterials}}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>
											<span class="stext-102 cl6 size-206">
											@for ($i = 0; $i < count($productColor); $i++)
												{{$productColor[$i]}} ,
											@endfor
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>
											<span class="stext-102 cl6 size-206">
											@for ($i = 0; $i < count($productSize); $i++)
												{{$productSize[$i]}} ,
											@endfor
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Reviews -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src={{asset("assets/images/avatar-01.jpg")}} alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														Ariana Grande
													</span>

													<span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i>
													</span>
												</div>

												<p class="stext-102 cl6">
													Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
												</p>
											</div>
										</div>
										
										<!-- Add review -->
										<form class="w-full">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>
											</div>

											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: {{$productName}}, {{$categorytitle}}
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@for ($k = 0; $k < 10; $k++)
						@for ($i = 0; $i < count($allProducts); $i++)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src={{asset($allProducts[$i]->photo)}} alt="IMG-PRODUCT">

										<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{$allProducts[$i]->name}}
											</a>

											<span class="stext-105 cl3">
												{{$allProducts[$i]->price}}
											</span>
										</div>
									</div>
								</div>
							</div>	
						@endfor
					@endfor
				</div>
			</div>
		</div>
	</section>
	<script>
		function popupCard(product) {
			console.log(product);
			// var id = product["id"];
			// var name = product["name"];
			// var photo = product["photo"];
			// var price = product["price"];
			// var des = product["description"];

			// document.getElementById("title").innerHTML = name;
			// document.getElementById("price").innerHTML = price + " $";
			// document.getElementById("des").innerHTML = des;
			// document.getElementById("image1").src = photo;
			// document.getElementById("expand1").href = photo;
			// document.getElementById("idpro").value = id; // id of the product
		}
	</script>

	@endsection