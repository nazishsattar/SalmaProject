<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been Removed');
        
    }

    public function destroyAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function swithToSaveForLater($rowId)
    {
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message',"Item has been saved for Later");
    }

    public function moveToCart($rowId)
    {
        $item=Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message',"Item has been moved to cart");

    }

    public function deleteFromSavedForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message',"Item has been removed from saved for later");

    }

    public function checkout()
    {
        if(Auth::check())
        {
        return redirect()->route('checkout');
    
        }
        else
        {
            return redirect()->route('login');

        }
    }

    public function setAmountForCheckout()
    { 
        if(!Cart::instance('cart')->count()>0)
        {
            session()->forget('checkout');
            return;
        }
        session()->put('checkout',[
            'discount'=>0,
            'subtotal'=>Cart::instance('cart')->subtotal(),
            //'tax'=>Cart::instance('cart')->tax(),
            'total'=>Cart::instance('cart')->total()
        ]);

    }


    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');

    } 
    public function render()
    {
        $this->setAmountForCheckout();
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }
        // most viewd product
        $lproducts= Product::inRandomOrder()->limit(10)->get();
        return view('livewire.cart-component',['lproducts'=>$lproducts])->layout("layouts.base");;
    }
}
