{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<x-base-layout> 
    <main id="main" class="main-site left-sidebar">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Register</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
					<div class=" main-content-area">
						<div class="wrap-login-item ">
							<div class="register-form form-item ">
                                <x-jet-validation-errors class="mb-4" />
								<form class="form-stl" action="{{route('register')}}" name="frm-login" method="POST" >
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Create an account</h3>
										<h4 class="form-subtitle">Personal infomation</h4>
									</fieldset>									
									<fieldset class="wrap-input">
										<label for="frm-reg-lname">Name*</label>
										<input type="text" id="frm-reg-lname" name="name" placeholder="Your name*" :value="name" required autofocus autocomplete="name" value="{{old('name')}}" >
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-reg-email">Email Address*</label>
										<input type="email" id="frm-reg-email" name="email" placeholder="Email address" :value="email" required value="{{old('email')}}" >
                                    </fieldset>
									<fieldset class="wrap-title">
										<h3 class="form-title">Login Information</h3>
									</fieldset>
									<fieldset class="wrap-input item-width-in-half left-item ">
										<label for="frm-reg-pass">Password *</label>
										<input type="password" id="frm-reg-pass" name="password" placeholder="Password" required autocomplete="new-password">
									</fieldset>
									<fieldset class="wrap-input item-width-in-half ">
										<label for="frm-reg-cfpass">Confirm Password *</label>
										<input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
									</fieldset>
									<input type="submit" class="btn btn-sign" value="Register" name="register">
								</form>
							</div>											
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->
	</main> 
</x-base-layout>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/auth/loginstyle.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/testing1/css/user-auth.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/testing1/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/stylea.css')}}">
</head>
<body>
<main id="main" class="main-site left-sidebar">
<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-10">
                <div class="user-form-logo"><a href="/"><img src="{{asset('assets/images/salmasuper.png')}}" alt="logo"></a></div>
                    <section class="sec"> 
                                <div class="imgBx">
                                    <img src="{{asset('assets/auth/auth.jpg')}}" />
                                </div> 
                    <div class="contentBx">
                    <div class="formBx">
                        <h2 style="font-size: 30px;line-height: var(--h2height);letter-spacing: -0.3px;text-transform: capitalize"><b>Join Now!</b></h2>
                        <form>
                            <div class="inputBx">
                                <span>Name</span>
                                <input type="text" name="">
                            </div>
                            <div class="inputBx">
                            <span>Email</span>
                            <input type="email" name="">
                        </div>
                            <div class="inputBx">
                                <span>Password</span>
                                <input type="password" name="">
                            </div>
                            <div class="inputBx">
                                <span>Confirm Password</span>
                                <input type="password" name="">
                            </div>
                            <div class="remember">
                                <label><input type="checkbox" name="">Remember me</label>
                            </div>
                            <div class="inputBx">
                                <input type="submit" value="Login" name=""  class="btn btn-danger my-cart-btn my-cart-b"> 
                                
                            </div>
                            <div class="inputBx">
                            <p>Don't have an account?<a href="#">Register</a></p>
                            </div>
                            
                            </form>
                            
                             <ul class="social-fo">
                                <li><a href="https://www.facebook.com/salmasupermarketpk/" class=" face" style="text-align: center"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/SALMAsupermark1" class=" twi" style="text-align: center"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/salmasupermarket1/" class=" inst" style="text-align: center"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/authwall?trk=gf&amp;trkInfo=AQHwNqxACt46pgAAAYFC55RQODqjNXfZd7jJKYLo_S34Op6N6xevv7PYNPVW-bRcRlfPU0_z1T42gH4COkQ7REBUj4Gf3WhlHTHmvUKvdhxvw-8dPcKnB9xHAhc8n-p7wq19V0Q=&amp;original_referer=&amp;sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fsalma-supermarketpk%2F" class=" lin" style="text-align: center"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                 
                            </ul>
                            </div>
                            </div> 
                  </section>              
            </div>
        </div>
    </div>
</section>
</main>
</body>
</html>
    

 --}}
