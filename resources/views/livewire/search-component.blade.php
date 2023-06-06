<main id="main" class="main-site left-sidebar">
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>  
    </div> 
 <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Digital & Electronics</span></li>
            </ul>
        </div>        
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    {{-- slider --}}
                    <div class="row" wire:ignore>
                        {{-- slider--}}
                        <div class="col-lg-12">
                            <div class="home-grid-slider slider-dots">
                                <div class="col-lg-8 order-0 order-lg-1 order-xl-1">
                                    <div class="home-grid-slider slider-arrow slider-dots">
                                        <a href="#"><img src="{{asset('assets/images/promo/grid/01.jpg')}}" alt=""></a>
                                        <a href="#"><img src="{{asset('assets/images/promo/grid/02.jpg')}}" alt=""></a>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-promo"><a href="#"><img src="{{asset('assets/images/promo/home/17.jpg')}}" alt="promo"></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="banner-promo"><a href="#"><img src="{{asset('assets/images/promo/home/18.jpg')}}" alt="promo"></a>
                            </div>
                        </div>               
                    </div>   
                <div class="wrap-shop-control">
                    <h1 class="shop-title">Digital & Electronics</h1>
                    <div class="wrap-right">
                     <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting" >
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>
                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>
                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>
                    </div>
                </div><!--end wrap shop control-->
                @if($products->count()>0)
                {{-- <div class="row">
                    <ul class="product-list grid-products equal-container  ">
                        @foreach($products as $product)

                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem  ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span></div>
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                       </ul>
                </div> --}}
                <br><br>
                <style>
                    .product-wish{
                        position:absolute;
                        top:2%;
                        left:10%;
                        z-index:80;
                        right:5%;
                        text-align: right;
                        padding-top: 0;
                    }
                    .product-wish .fa{
                        color:#cbcbcb;
                        font-size:20px;
                    }
                    .product-wish .fa:hover{
                        color:#ff7007;
                    }
                    .fill-heart{
                        color:#ff7007 !important;
                    }
                </style>
                 <div class=" tab-content tab-content-t">
					<div class="tab-pane active text-style" id="tab1">
						<div class=" con-w3l">
                            @php
                            $witems=Cart::instance('wishlist')->content()->pluck('id')
                            @endphp
                            @foreach($products as $product)
							<div class="col-md-3 m-wthree">
								<div class="product-card">								
									<a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}" >
										<img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" class="img-responsive" >
										{{-- <div class="offer"><p><span>Offer</span></p></div> --}}
									</a>
									<div class="mid-1">
                                        <div class="women">
                                            <h6 style="font-weight: bold;font-size:13px;line-height:18px;"><a href="{{route('product.details',['slug'=>$product->slug])}}">{{$product->name}}</a></h6>
                                          <div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span></div>       
                                        </div>
										<div class="add">
                                            <a href="#" class="btn btn-danger my-cart-btn my-cart-b" wire:click.prevent="store({{$product->id}},'{{addslashes($product->name)}}',{{$product->regular_price}})">Add To Cart</a>
                                            <div class="product-wish">
                                                @if($witems->contains($product->id))
                                                <a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                                @else
                                                <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{addslashes($product->name)}}',{{$product->regular_price}})"><i class="fa fa-heart"></i></a>
                                                @endif
                                            </div>		
                                        </div>
									</div>
								</div>
                                <br>
							</div>
							@endforeach         
							<div class="clearfix"></div>
						 </div>
					</div>
				</div>
                @else
                <p style="padding-top:30px;">No products</p>
                @endif
                <div class="wrap-pagination-info">
                    {{$products->links()}}

                    {{-- <ul class="page-numbers">
                        <li><span class="page-number-item current" >1</span></li>
                        <li><a class="page-number-item" href="#" >2</a></li>
                        <li><a class="page-number-item" href="#" >3</a></li>
                        <li><a class="page-number-item next-link" href="#" >Next</a></li>
                    </ul> --}}
                    <p class="result-count">Showing 1-8 of 12 result</p>
                </div>
            </div>
            <!--end main products area-->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget" style="box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);" >
                    <div class="banner-category-head"><i class="fa fa-bars"></i><span><b>top categories</b></span></div>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach($categories as $category)
                            <li class="category-item {{count($category->subCategories) >0 ? 'has-child-cate' : ''}}">
                                <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="cate-link">{{$category->name}}</a>
                                 @if(count($category->subCategories) >0)
                                <span class="toggle-control">+</span>
                                <ul class="sub-cate">
                                    @foreach ($category->subCategories as $scategory)
                                        <li class="category-item">
                                            <a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="cat-link"><i class="fa fa-caret-right"></i>{{$scategory->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif 
                          </li>
                           @endforeach
                        </ul>
                    </div>
                </div>   
                <!-- Categories widget-->
                <br>
                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price <span class="text-info">{{$min_price}} - {{$max_price}}</span></h2>
                    <div class="widget-content">
                    <div id="slider" wire:ignore></div>
                    </div>
                </div>
                <!-- Price-->
                <br>
                <div class="widget mercado-widget filter-widget">               
                    <div class="widget-content">
                        <div class="widget-banner">
                            <figure><img src="{{asset('assets/images/banner-short.png')}}" width="270" height="331" alt=""></figure>
                        </div>
                    </div>
                </div>
                <!--start popular products  -->
                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach($popular_products as $p_product)
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="{{route('product.details',['slug'=>$p_product->slug])}}" title="{{$p_product->name}}">
                                            <figure><img src="{{asset('assets/images/products')}}/{{$p_product->image}}" alt="{{$p_product->name}}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.details',['slug'=>$p_product->slug])}}" title="{{$p_product->name}}" class="product-name"><span>{{$p_product->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{$p_product->regular_price}}</span></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach          
                        </ul>
                    </div>
                </div>     
                {{-- <div class="shop-widget-promo"><a href="#"><img src="{{asset('assets/images/promo/shop/01.jpg')}}" alt="promo"  ></a></div> --}}
            </div> 
            <!--end sitebar-->          
        </div><!--end row--> 
        <div class="section promo-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/spices.png')}}" alt="promo"></a></div>
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
								<h2 style="font-size: 40px;line-height: var(--h2height);letter-spacing: -0.3px;text-transform: capitalize"><b>Collected New Items</b></h2>
							</div>
						</div>
					</div>
					<div class="row" wire:ignore>
						<div class="col">
							<ul class="new-slider slider-arrow">
                                @foreach ($lproducts as $lproduct)
                                <div class="col-md-3 m-wthree">
								<li>
                                    <div class="product-card">								
                                        <a href="{{route('product.details',['slug'=>$lproduct->slug])}}" title="{{$lproduct->name}}" >
                                            <img src="{{asset('assets/images/products')}}/{{$lproduct->image}}" alt="{{$lproduct->name}}" class="img-responsive" >
                                            {{-- <div class="offer"><p><span>Offer</span></p></div> --}}
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                                <h6 style="font-weight: bold;font-size:13px;line-height:18px;"><a href="{{route('product.details',['slug'=>$lproduct->slug])}}" class="product-name">{{$lproduct->name}}</a></h6>
                                              <div class="wrap-price"><span class="product-price">{{$lproduct->regular_price}}</span></div>       
                                            </div>
                                            <div class="add">
                                                <a href="#" class="btn btn-danger my-cart-btn my-cart-b" wire:click.prevent="store({{$lproduct->id}},'{{addslashes($lproduct->name)}}',{{$lproduct->regular_price}})">Add To Cart</a>	
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
          <section class="section promo-part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/10.jpg')}}" alt="promo"></a></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/11.jpg')}}" alt="promo"></a></div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="promo-img"><a href="#"><img src="{{asset('assets/images/promo/home/12.jpg')}}" alt="promo"></a></div>
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
    <!--end container-->  
</main>
@push('scripts')
<script>
    var slider=document.getElementById('slider');
    noUiSlider.create(slider,{
        start:[1,1000],
        connect:true,
        range:{
            'min' :1,
            'max' :50000
        },
        pips:{
            mode:'steps',
            stepped:true,
            density:4
        }
    });
    slider.noUiSlider.on('update',function(value){
        @this.set('min_price',value[0]);
        @this.set('max_price',value[1]);
    });
</script>
@endpush