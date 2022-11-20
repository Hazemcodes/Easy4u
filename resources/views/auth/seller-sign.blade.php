@extends('layout.auth')
@section('title', 'Seller Login')

@section('content')
	<!-- Content page -->
	<section class="bg0 p-b-80">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-30 p-lr-15-lg w-full-md" style="margin-left: auto; margin-right: auto;">
					<form action="{{ route('seller-login') }}" method="POST">
						@if (Session::has('success'))
							<div class="alert alert-success">{{Session::get('success')}}</div>
						@endif
						@if (Session::has('fail'))
							<div class="alert alert-danger">{{Session::get('fail')}}</div>
						@endif
						@csrf
						<h1 class="mtext-105 cl2 txt-center p-b-30">
							Sign in
						</h1>

						<label for="email">Email Address</label>
						<div class="bor8 m-b-2 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" value="{{old('email')}}" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src={{asset("assets/images/icons/icon-email.png")}} alt="ICON">
						</div>
						<span class="text-danger">@error('email') {{$message}} @enderror</span>
						
						<label for="password">Password</label>
						<div class="bor8 m-b-2 how-pos4-parent m-t-10">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Your Password">
							<img class="how-pos4 pointer-none" src={{asset("assets/images/icons/icon-email.png")}} alt="ICON">
						</div>
						<span class="text-danger">@error('password') {{$message}} @enderror</span>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-t-20">
							Submit
						</button>

						<div class="m-t-25 how-pos4-parent">
							<a href="seller-register" class="flex-c-m trans-04 p-lr-25">Create your account</a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>	
	
@endsection