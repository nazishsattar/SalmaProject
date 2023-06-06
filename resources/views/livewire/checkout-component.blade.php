<main id="main" class="main-site">
    <div class="container">
      <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeorder" onsubmit="$('#processing').show();">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>
                       <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input  type="text" name="fname" value="" placeholder="Your name" wire:model="firstname" value="{{old('firstname')}}">
                                @error('firstname')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input  type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname" value="{{old('lastname')}}">
                                @error('lastname')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input  type="email" name="email" value="" placeholder="Type your email" wire:model="email"  value="{{old('email')}}">
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="11 digits format" wire:model="mobile" value="{{old('mobile')}}">
                                @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">line 1:</label>
                                <input id="add" type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1" value="{{old('line1')}}">
                                @error('line1')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">line 2:</label>
                                <input id="add" type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2" value="{{old('line2')}}">
                            </p>
                            <p class="row-in-form">
                                <label for="city">City<span>*</span></label>
                                <select type="text" class="form-control" name="city" value="" placeholder="City name" wire:model="city" value="{{old('city')}}">
                                    <option>Select City</option>
                                    <option>Karachi</option>
                                </select>
                                @error('city')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            
                            <p class="row-in-form">
                                <label for="city">Area<span>*</span></label>
                                <input type="text" name="area" value="" placeholder="Area name" wire:model="area" value="{{old('area')}}">
                                @error('area')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="Note">Note:</label>
                                <textarea name="area" value="" class="form-control" rows="3" placeholder="Any Special Recommendations" wire:model="note" value="{{old('note')}}"></textarea>
                                @error('note')<span class="text-danger">{{$message}}</span>@enderror
                            </p>
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                    <span>Ship to a different address?</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                @if($ship_to_different)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Shipping Address</h3>
                        <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input  type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname" value="{{old('s_firstname')}}">
                                    @error('s_firstname')<span class="text-danger">{{$message}}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input  type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname" value="{{old('s_lastname')}}">
                                    @error('s_lastname')<span class="text-danger">{{$message}}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input  type="email" name="email" value="" placeholder="Type your email"   wire:model="s_email" value="{{old('s_email')}}">
                                    @error('s_email')<span class="text-danger">{{$message}}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input  type="number" name="phone" value="" placeholder="11 digits format" wire:model="s_mobile" value="{{old('s_mobile')}}">
                                    @error('s_mobile')<span class="text-danger">{{$message}}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1</label>
                                    <input id="add" type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line1" value="{{old('s_line1')}}">
                                    @error('s_line1')<span class="text-danger">{{$message}}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2</label>
                                    <input id="add" type="text" name="add" value="" placeholder="Street at apartment number optional" wire:model="s_line2" value="{{old('s_line2')}}">
                                </p>
                                <p class="row-in-form">
                                    <label for="city">City<span>*</span></label>
                                    <select type name="city"  class="form-control" value="" placeholder="City name" wire:model="s_city" value="{{old('s_city')}}">
                                        <option>Select City</option>
                                        <option>Karachi</option>
                                    </select>
                                    @error('s_city')<span class="text-danger">{{$message}}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="area">Area<span>*</span></label>
                                    <input type="text" name="area" value="" placeholder="Area name" wire:model="s_area" value="{{old('s_area')}}">
                                    @error('s_area')<span class="text-danger">{{$message}}</span>@enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="Note">Note:</label>
                                    <textarea  name="note" class="form-control" rows="3" value="" placeholder="Any Special Recommendations" wire:model="s_note" value="{{old('s_note')}}" ></textarea>
                                    @error('s_note')<span class="text-danger">{{$message}}</span>@enderror
                                </p>     
                            </div>
                        </div>
                    </div>
                @endif
            </div>          
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    <p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                            <span>Cash on Delivery</span>
                            <span class="payment-desc">Order Now Pay on Delivery</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
                            <span>Debit / Credit Card</span>
                        </label>
                        @error('paymentmode')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    @if(Session::has('checkout'))
                        <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{Session::get('checkout')['total']}}</span></p>
                    @endif
                    @if($errors->isEmpty())
                        <div wire:ignore id="processing"  style="font-size:22px;margin-bottom:20px;padding-left:37px;color:green;display:none">
                            <i class="fa fa-spinner  fa-pulse fa-fw"></i>
                            <span>Processing........</span>
                        </div>
                    @endif
                        <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping Charges</h4>
                    <p class="summary-info"><span class="title">Depend on Distance</span></p>
                </div>
            </div>
        </form>
        </div><!--end main content area-->
    </div><!--end container-->

</main>