@extends('layout.master')
@section('title', 'Product Page')

@section('content')
	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140" style="margin-top: 5%;">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					@for ($i = 1; $i < count($category)+1; $i++)
						<div style="display: none;">
							{{$title = $category->where('id' , '=' ,$i)->first()->title}}
						</div>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$title}}">
							{{$title}}	
						</button>
					@endfor
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					@if ($data->type == 'seller')
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4">
						<a href="addNewProduct">
							<i class="fa fa-plus cl2 m-r-6 fs-15 p-lr-5" aria-hidden="true"> Add new Product</i>
						</a>
					</div>
					@endif

					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<livewire:products />
		</div>
	</div>
		

		<!-- Modal1 -->
		<div class="wrap-modal1 js-modal1 p-t-50 p-b-20">
			<div class="overlay-modal1 js-hide-modal1"></div>
	
			<div class="container">
				
				<div class="bg0 p-t-20 p-lr-15-lg how-pos3-parent">
					<button class="how-pos3 hov3 trans-04 js-hide-modal1">
						<img src="{{asset('public/assets/images/icons/icon-close.png')}}" alt="CLOSE">
					</button>
					<div class="row">
						<div class="col-md-6 col-lg-7 p-b-30">
							<div class="p-l-25 p-r-30 p-lr-0-lg">
								<div class="wrap-slick3 flex-sb flex-w">
									<div class="slick3 gallery-lb">
										<div class="item-slick3">
											<div class="wrap-pic-w pos-relative">
												<img id="image1" alt="IMG-PRODUCT">
												<a id="expand1" class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-5 p-b-10">
							<div class="p-r-50 p-t-5 p-lr-0-lg">
								<h4 id="title" class="mtext-105 cl2 js-name-detail p-b-14"></h4>
								<span id="price" class="mtext-106 cl2"></span>
								<p id="des" class="stext-102 cl3 p-t-23"></p>
								
								<!--  -->
								<div class="p-t-40" style="margin-top: 35%">
									<div class="flex-w flex-r-m p-b-10">
										<div class="size-204 flex-w flex-m respon6-next">
											<form action="{{ route('cart.store') }}" method="POST">
												@csrf
												@if (Session::has('loginId'))
													@if ($data->type == 'user')
														<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"> 
															Add to cart
														</button>
													@else
													<p class="stext-102 cl3 p-t-23">You have to login as a user</p>
													@endif
												@else
												<p class="stext-102 cl3 p-t-23">You have to login first</p>
												@endif
												<input id="idpro" type="hidden" value="" name="id">											
											</form>
										</div>
									</div>	
								</div>
	
								<!-- Social Meida  -->
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
	
				</div>
			</div>
		</div>
		<script>
			function popupCard(product) {
				console.log(product);
				var id = product["id"];
				var name = product["name"];
				var photo = product["photo"];
				var price = product["price"];
				var des = product["description"];
	
				document.getElementById("title").innerHTML = name;
				document.getElementById("price").innerHTML = price + " $";
				document.getElementById("des").innerHTML = des;
				document.getElementById("image1").src = photo;
				document.getElementById("expand1").href = photo;
				document.getElementById("idpro").value = id; // id of the product
			}
		</script>

@endsection