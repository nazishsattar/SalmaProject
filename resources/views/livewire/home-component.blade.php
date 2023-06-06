<main id="main">
<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
</div> 
	{{-- cat slider --}}
	<section class="suggest-part">
		<style>
			h5{
				font-size: 16px;align-content: center;
			}
		</style>
		<div class="container" wire:ignore>
			<ul class="suggest-slider slider-arrow">
				<li><a class="suggest-card" href="/product-category/fruits-and-vegetables"><img src="{{ asset('assets/images/categories/fruitss.png')}}" alt="suggest">
						{{-- <h5>vegetables</h5> --}}
					</a></li>
				<li><a class="suggest-card" href="/product-category/dairy"><img src="{{ asset('assets/images/categories/dairy.png')}}" alt="suggest">
						{{-- <h5>fruits </h5> --}}
					</a></li>
				<li><a class="suggest-card" href="/product-category/fruits-and-vegetables"><img src="{{ asset('assets/images/categories/veg.png')}}" alt="suggest">
						{{-- <h5>groceries </h5> --}}
					</a></li>
				<li><a class="suggest-card" href="/product-category/fresh-meat"><img src="{{ asset('assets/images/categories/meat.png')}}" alt="suggest">
						{{-- <h5>dairy farm </h5> --}}
					</a></li>
				<li><a class="suggest-card" href="/product-category/breakfast"><img src="{{ asset('assets/images/categories/breakfast.png')}}" alt="suggest">
						{{-- <h5>sea foods </h5> --}}
					</a></li>
				<li><a class="suggest-card" href="/product-category/dates-dry-fruits"><img src="{{ asset('assets/images/categories/dryfruits.png')}}" alt="suggest">
						{{-- <h5>vegan foods </h5> --}}
					</a></li>
				<li><a class="suggest-card" href="/product-category/cooking-essentials"><img src="{{ asset('assets/images/categories/cooking.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/confectionery"><img src="{{ asset('assets/images/categories/confectionery.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/baby-food"><img src="{{ asset('assets/images/categories/babyfood.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/frozen"><img src="{{ asset('assets/images/categories/frozen.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/baking-essentials"><img src="{{ asset('assets/images/categories/baking.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/pet-food-and-accessories"><img src="{{ asset('assets/images/categories/pet.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/cosmetics"><img src="{{ asset('assets/images/categories/cosmetics.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/skin-care"><img src="{{ asset('assets/images/categories/skin.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/health-and-beauty"><img src="{{ asset('assets/images/categories/healthbeauty.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/baby-care"><img src="{{ asset('assets/images/categories/babycare.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/stationery"><img src="{{ asset('assets/images/categories/stationery.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/kitchen-utensils"><img src="{{ asset('assets/images/categories/kitchenutensils.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/toys-and-sports"><img src="{{ asset('assets/images/categories/toys.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
					<li><a class="suggest-card" href="/product-category/electronics"><img src="{{ asset('assets/images/categories/electronics.png')}}" alt="suggest">
						{{-- <h5>dry foods </h5> --}}
					</a></li>
			</ul>
		</div>
	</section>
	{{-- slider --}}
		<div class="container">
			<div class="row" wire:ignore>
				<div class="col-lg-12">
					<div class="home-category-slider slider-arrow slider-dots">
						@foreach ($sliders as $slide)
						<a href="#">
						<img src="{{ asset('assets/images/sliders')}}/{{$slide->image}}" alt="banner"></a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<!--MAIN SLIDE-->
			{{-- <div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					@foreach ($sliders as $slide)
					<div class="item-slide">
						<img src="{{ asset('assets/images/sliders')}}/{{$slide->image}}" alt="" class="img-slide">
						<div class="slide-info slide-1">
							{{-- <h2 class="f-title"> <b>{{$slide->title}}</b></h2>
							<span class="subtitle">{{$slide->subtitle}}</span> --}}
							{{-- <p class="sale-info">Only price: <span class="price">{{$slide->price}}</span></p> --}}
							{{-- <a href="{{$slide->link}}" class="btn-link">Shop Now</a>
						</div>
					</div>
					@endforeach		
				</div>
			</div>  --}}	
			<!--On Sale-->
			@if($sproducts->count()>0 && $sale->status==1 && $sale->sale_date>Carbon\Carbon::now())
			<div class="wrap-show-advance-info-box style-1 has-countdown" wire:ignore>
				<h3 class="title-box">On Sale</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
					@foreach ($sproducts as $sproduct)
						<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{route('product.details',['slug'=>$sproduct->slug])}}" title="{{$sproduct->name}}">
								<figure><img src="{{asset('assets/images/products')}}/{{$sproduct->image}} " width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">{{$sproduct->sale_per}}% OFF</span>
							</div>		
						</div>
						<div class="product-info">
							<a href="{{route('product.details',['slug'=>$sproduct->slug])}}" class="product-name"><span>{{$sproduct->name}}</span></a>
							<div class="wrap-price"><ins><p class="product-price">{{$sproduct->sale_price}}</p></ins><del><p class="product-price">{{$sproduct->regular_price}}</p></del></div>
						</div>
						{{-- <div class="add" >
							<a href="#" class=" btn btn-danger  my-cart-btn my-cart-b" wire:click.prevent="store({{$sproduct->id}},'{{$sproduct->name}}',{{$sproduct->regular_price}})">Add To Cart</a>	
						</div> --}}
					</div>
					@endforeach
				</div>
			</div>
			@endif
			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect">
						<figure><img src="{{ asset('assets/images/Banner-1.jpg') }}" width="1170" height="240" alt=""></figure>
					</a>
				</div>			
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
									@foreach ($lproducts as $lproduct)
										<div class="product product-style-2 equal-elem ">
											<div class="product-thumnail">
												<a href="{{route('product.details',['slug'=>$lproduct->slug])}}" title="{{$lproduct->name}}">
													<figure><img src="{{ asset('assets/images/products') }}/{{$lproduct->image}}" width="50" height="50" alt="{{$lproduct->name}}"></figure>
												</a>		
											</div>
											<div class="product-info">
												<a href="{{route('product.details',['slug'=>$lproduct->slug])}}" class="product-name"><span>{{$lproduct->name}}</span></a>
												<div class="wrap-price"><span class="product-price">{{$lproduct->regular_price}}</span></div>
											</div>
											{{-- <div class="add" >
												<a href="#" class=" btn btn-danger  my-cart-btn my-cart-b" wire:click.prevent="store({{$lproduct->id}},'{{$lproduct->name}}',{{$lproduct->regular_price}})">Add To Cart</a>			
											</div>						 --}}
										</div>
									@endforeach
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1" wire:ignore>
				<h3 class="title-box">Product Categories</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect">
						<figure><img src="{{ asset('assets/images/Banner-2.jpg') }}" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control" wire:ignore>
							@foreach ($categories as $key=>$category)
							<a href="#category_{{$category->id}}" class="tab-control-item {{$key==0 ? 'active':''}}">{{$category->name}}</a>
							@endforeach					
						</div>
						<div class="tab-contents">
							@foreach ($categories as $key=>$category)
					<div class="tab-content-item {{$key==0 ? 'active':''}}" id="category_{{$category->id}}">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >	
									@php
									$c_products=DB::table('products')->where('category_id',$category->id)->get()->take($no_of_products);
									@endphp
									@foreach ($c_products as $c_product)	
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{route('product.details',['slug'=>$c_product->slug])}}" title="{{$c_product->name}}">
												<figure><img src="{{ asset('assets/images/products')}}/{{$c_product->image}}" width="800" height="800" alt="{{$c_product->name}}"></figure>
											</a>
											{{-- <div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>	 --}}
										</div>
										<div class="product-info">
											<a href="{{route('product.details',['slug'=>$c_product->slug])}}" class="product-name"><span>{{$c_product->name}}</span></a>
											<div class="wrap-price"><span class="product-price">{{$c_product->regular_price}}</span></div>
										</div>
										{{-- <div class="add" >
											<a href="#" class=" btn btn-danger  my-cart-btn my-cart-b" wire:click.prevent="store({{$c_product->id}},'{{$c_product->name}}',{{$c_product->regular_price}})">Add To Cart</a>	
										</div>							 --}}
									</div>
									@endforeach		
								</div>
							</div>	
							@endforeach		
						</div>
					</div>
				</div>
			</div>		
			<br><br>
			<div class="section promo-part">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/makeup-banner.png')}}" alt="promo"></a></div>
						</div>
					</div>
				</div>
			</div>		 
			  {{-- collected new items --}}
			  <section class="section newitem-part">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="section-heading">
								<h2 style="font-size: 40px;line-height: var(--h2height);letter-spacing: -0.3px;text-transform: capitalize"><b>MakeUp New Items</b></h2>
							</div>
						</div>
					</div>
					<div class="row" wire:ignore>
						<div class="col">
							<ul class="new-slider slider-arrow">
                                @foreach ($mproducts as $mproduct)
                                <div class="col-md-3 m-wthree">
								<li>
                                    <div class="product-card">								
                                        <a href="{{route('product.details',['slug'=>$mproduct->slug])}}" title="{{$mproduct->name}}" >
                                            <img src="{{asset('assets/images/products')}}/{{$mproduct->image}}" alt="{{$mproduct->name}}" class="img-responsive" >
                                            {{-- <div class="offer"><p><span>Offer</span></p></div> --}}
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                                <h6 style="font-weight: bold;font-size:13px;line-height:18px;"><a href="{{route('product.details',['slug'=>$mproduct->slug])}}" class="product-name">{{$mproduct->name}}</a></h6>
                                              <div class="wrap-price"><span class="product-price">{{$mproduct->regular_price}}</span></div>       
                                            </div>
                                            <div class="add">
                                                <a href="#" class="btn btn-danger my-cart-btn my-cart-b" wire:click.prevent="store({{$mproduct->id}},'{{addslashes($mproduct->name)}}',{{$mproduct->regular_price}})">Add To Cart</a>	
                                            </div>
                                        </div>
                                    </div>     
                                    {{-- end pro card--}}    	
                                </li>
                                </div>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>
			</section>
			 {{-- three pair images --}}
			 <section  style="margin-top: 30px;" class="section promo-part" >
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/01.jpg')}}" alt="promo"></a></div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/02.jpg')}}" alt="promo"></a></div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/03.jpg')}}" alt="promo"></a></div>
						</div>
					</div>
				</div>
			</section>
			{{-- brands--}}
			 <section class="section brand-part">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="section-heading">
								<h2 style="font-size: 40px;line-height: var(--h2height);letter-spacing: -0.3px;text-transform: capitalize"><b>Brands We Carry</b></h2>
							</div>
						</div>
					</div>
					<div class="brand-slider slider-arrow" wire:ignore>
						<div class="brand-wrap">
							<div class="brand-media"><img src="{{ asset('assets/images/brand/01.jpg')}}" alt="brand">
								<div class="brand-overlay"><a href="/"><i class="fa fa-link"></i></a></div>
							</div>
						</div>
						<div class="brand-wrap">
							<div class="brand-media"><img src="{{ asset('assets/images/brand/02.png')}}" alt="brand">
								<div class="brand-overlay"><a href="/"><i class="fa fa-link"></i></a></div>
							</div>
						</div>
						<div class="brand-wrap">
							<div class="brand-media"><img src="{{ asset('assets/images/brand/03.jpg')}}" alt="brand">
								<div class="brand-overlay"><a href="/"><i class="fa fa-link"></i></a></div>
							</div>
						</div>
						<div class="brand-wrap">
							<div class="brand-media"><img src="{{ asset('assets/images/brand/04.jpg')}}" alt="brand">
								<div class="brand-overlay"><a href="/"><i class="fa fa-link"></i></a></div>
							</div>
						</div>
						<div class="brand-wrap">
							<div class="brand-media"><img src="{{ asset('assets/images/brand/05.jpg')}}" alt="brand">
								<div class="brand-overlay"><a href="/"><i class="fa fa-link"></i></a></div>
							</div>
						</div>
						<div class="brand-wrap">
							<div class="brand-media"><img src="{{ asset('assets/images/brand/06.jpg')}}" alt="brand">
								<div class="brand-overlay"><a href="/"><i class="fa fa-link"></i></a></div>
							</div>
						</div>
						
					</div>
				</div>
			</section>		
		</div>
		{{-- end container --}}		
</main>

	