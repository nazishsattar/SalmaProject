<main id="main" class="main-site left-sidebar" style="padding:30px 0;">
<style>
    .breadcrumb {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    background: none;
    margin: 0px
}

.breadcrumb .active {
    color: var(--gray-chalk)
}

.breadcrumb-item {
    font-size: 18px;
    padding: 0px !important;
    text-transform: capitalize
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    line-height: 25px;
    font-size: 14px;
}
</style>
<section class="inner-section single-banner" style="background: url('{{ asset('assets/images/single-banner.jpg')}}') no-repeat center;">
    <div class="container"></div>
        <h2><b>Contact us</b></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">contact</li>
        </ol>
    </div>
</section>
<div>   
		<div class="container">
			<div class="row">
				<div class=" main-content-area">
					<div class="wrap-contacts ">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-form">
								<h2 class="box-title">Leave a Message</h2>
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
								<form  name="frm-contact" wire:submit.prevent="sendMessage">
                                    @csrf
									<label for="name">Name<span>*</span></label>
									<input type="text" value="" id="name" name="name"  wire:model="name" >
                                    @error('name')<p class="text-danger">{{$message}}</p>@enderror
									<label for="email">Email<span>*</span></label>
									<input type="text" value="" id="email" name="email" wire:model="email">
                                    @error('email')<p class="text-danger">{{$message}}</p>@enderror
                            		<label for="phone">Number Phone</label>
									<input type="text" value="" id="phone" name="phone" wire:model="phone">
                                    @error('phone')<p class="text-danger">{{$message}}</p>@enderror
									<label for="comment">Comment</label>
									<textarea name="comment" id="comment"  wire:model="comment"></textarea>
                                    @error('comment')<p class="text-danger">{{$message}}</p>@enderror
									<input type="submit" name="ok" value="Submit" >
									</form>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-info">
								<div class="wrap-map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.937580465579!2d67.07750451369301!3d24.831808152523813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33dcbd8aae001%3A0x54ca5bc83ee2a3a5!2sSalma%20Super%20Market!5e0!3m2!1sen!2s!4v1656347373974!5m2!1sen!2s" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
								<h2 class="box-title">Contact Detail</h2>
								<div class="wrap-icon-box">

									<div class="icon-box-item">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<div class="right-info">
											<b>Email</b>
											<p>info@salmasupermarket.com</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div class="right-info">
											<b>Phone</b>
											<p>+92 3122680667 , +92 3219202688</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<div class="right-info">
											<b>Address</b>
											<p>Ground Floor Defence Regency, 13 Expressway، Off Main Korangi Rd, Karachi</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

			</div><!--end row-->

		</div><!--end container-->
</div>
</main>
