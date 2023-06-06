<main id="main" class="main-site left-sidebar">
    <div class="container">
          <div class="wrap-breadcrumb">
              <ul>
                  <li class="item-link"><a href="/" class="link">home</a></li>
                  <li class="item-link"><span>WishList</span></li>
              </ul>
          </div>
          <style>
            .product-wish{
                position:absolute;
                top:10%;
                left:0;
                z-index:99;
                right:30px;
                text-align: right;
                padding-top: 0;
            }
            .product-wish .fa{
                color:#cbcbcb;
                font-size:24px;
            }
            .product-wish .fa:hover{
                color:#ff7007;
            }
            .fill-heart{
                color:#ff7007 !important;
            }
            .fill-heart1{
                color:#4907ff !important;
            }
            </style>
          <div class=" tab-content tab-content-t">
            @if(Cart::instance('wishlist')->content()->count()>0)
            <div class="tab-pane active text-style" id="tab1">
                <div class=" con-w3l">
                    @foreach(Cart::instance('wishlist')->content() as $item)
                    <div class="col-md-3 m-wthree">
                        <div class="col-m">								
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}" >
                                <img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" class="img-responsive" >
                                {{-- <div class="offer"><p><span>Offer</span></p></div> --}}
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6 style="font-weight: bold;"><a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name">{{$item->model->name}}</a></h6>
                                  <div class="wrap-price"><span class="product-price">{{$item->model->regular_price}}</span></div>       
                                </div>
                                <div class="add">
                                    <a href="#" class="btn btn-danger my-cart-btn my-cart-b" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">Move To Cart</a>
                                    <div class="product-wish">
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <br>
                    </div>
                    @endforeach         
                    <div class="clearfix"></div>
                    @else
                    <h4 style="color:red;">No Items in WISHLIST</h4>
                    @endif
                 </div>
            </div>
        </div>
    </div>
</main>