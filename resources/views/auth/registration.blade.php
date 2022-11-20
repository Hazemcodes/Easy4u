@extends('layout.auth')
@section('title', 'Registration')

@section('content')
	
	<!-- Content page -->
	<section class="bg0 p-b-80">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-30 p-lr-15-lg w-full-md" style="margin-left: auto; margin-right: auto;">
					<form action="{{ route('register') }}" method="POST">
						@if (Session::has('success'))
							<div class="alert alert-success">{{Session::get('success')}}</div>
						@endif
						@if (Session::has('fail'))
							<div class="alert alert-danger">{{Session::get('fail')}}</div>
						@endif
						@csrf
						<h1 class="mtext-105 cl2 txt-center p-b-30">
							Registration
						</h1>

						<label for="name">Name</label>
						<div class="bor8 m-b-2 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="name" name="name" value="{{old('name')}}" placeholder="Your Name">
							<img class="how-pos4 pointer-none" src={{asset("assets/images/icons/icon-email.png")}} alt="ICON">
						</div>
						<span class="text-danger">@error('name') {{$message}} @enderror</span>



						<label for="email">Email Address</label>
						<div class="bor8 m-b-2 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" value="{{old('email')}}" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src={{asset("assets/images/icons/icon-email.png")}} alt="ICON">
						</div>
						<span class="text-danger">@error('email') {{$message}} @enderror</span>
						
						<div class="m-t-10 m-b-10 how-pos4-parent">
							<span for="gender">Choose a gender:</span>
							<select name="gender" value="{{old('gender')}}" required focus >
								<option value="" disabled selected></option>
								<option value="unknown">unknown</option>
								<option value="male">male</option>
								<option value="female">female</option>
							</select>
							<span class="text-danger">@error('gender') {{$message}} @enderror</span>
						</div>

						
						<div class="m-t-10 m-b-10 how-pos4-parent">
							<span for="country">Choose a Country:</span>
							<select name="country" id="mySelect" onchange="myFunction()">
								<option value="" disabled selected>Select a country...</option>
								@for ($i=1; $i < count($country)+1; $i++)
									{{$name = $country->where('id' , '=' ,$i)->first()->name;}}
									<option value="{{$name}}">{{$name}}</option>
								@endfor
								</select>
								<span class="text-danger">@error('country') {{$message}} @enderror</span>
							</div>

						<label for="phoneNumber">Phone Number</label>
						<div class="bor8 m-b-2 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="phone" name="phoneNumber" value="{{old('phoneNumber')}}" placeholder="Your phone Number">
							<img class="how-pos4 pointer-none" src={{asset("assets/images/icons/phone.png")}} alt="ICON">
						</div>
						<span class="text-danger">@error('phoneNumber') {{$message}} @enderror</span>


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
							<a href="login-user" class="flex-c-m trans-04 p-lr-25">Sign in ?</a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>	
	

@endsection