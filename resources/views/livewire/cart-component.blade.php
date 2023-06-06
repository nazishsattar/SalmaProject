<main id="main" class="main-site">
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
        <div class="container">
            <h2><b>Shopping Cart</b></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">cart</li>
            </ol>
        </div>
    </section>
    <div class="container">
     {{-- <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div> --}}
        <div class=" main-content-area">
            @if(Cart::instance('cart')->count() >0)
            <div class="wrap-iten-in-cart">
                @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{Session::get('success_message')}}
                </div>
                @endif
                @if(Cart::instance('cart')->count()>0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach(Cart::instance('cart')->content() as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->name}}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">{{$item->model->regular_price}}</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >									
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                            </div>
                            <p class="text-center"><a href="#" wire:click.prevent="swithToSaveForLater('{{$item->rowId}}')">Save For Later</a></p>
                        </div>
                        <div class="price-field sub-total"><p class="price">{{$item->subtotal}}</p></div>
                        <div class="delete">
                            <a href="#"  wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach            												
                </ul>
                @else
                    <p>No item in cart</p>
                @endif
            </div>
            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{Cart::instance('cart')->subtotal()}}</b></p>
                    {{-- <p class="summary-info"><span class="title">Tax</span><b class="index">{{Cart::instance('cart')->tax()}}</b></p> --}}
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{Cart::instance('cart')->total()}}</b></p>
                </div>
                <div class="checkout-info">
                    <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
                    <a class="link-to-shop" href="/shop">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()" >Clear Shopping Cart</a>

                </div>
            </div>
            @else
            <div class="text-center" style="padding:30px 0;">
                <h1 style="color:red;">Your cart is empty</h1>
                <p>Add items to it now</p>
                <a href="/shop" class="btn btn-success">Shop Now</a>
            </div>
            @endif
            <div class="wrap-iten-in-cart">
                <h3 class="title-box" style="border-bottom:1px solid;padding-bottom:15px">{{Cart::instance('saveForLater')->count()}} items(s) Saved For Later</h3>
                @if(Session::has('s_success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{Session::get('s_success_message')}}
                </div>
                @endif
                <br>
                @if(Cart::instance('saveForLater')->count()>0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach(Cart::instance('saveForLater')->content() as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->name}}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">{{$item->model->regular_price}}</p></div>
                        <div class="quantity">
                            <p class="text-center"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">Move to Cart</a></p>
                        </div>
                        <div class="delete">
                            <a href="#"  wire:click.prevent="deleteFromSavedForLater('{{$item->rowId}}')" class="btn btn-delete" title="">
                                <span>Delete from saved for Later</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach            												
                </ul>
                @else
                    <p>No item Saved For Later</p>
                @endif
            </div>
           <div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Most Viewed Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect">
						<figure><img src="{{ asset('assets/images/Banner-3.jpg') }}" width="1170" height="240" alt=""></figure>
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
											</div>	 --}}
										</div>
									@endforeach
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
        
        </div><!--end main content area-->
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
    </div><!--end container-->

</main>