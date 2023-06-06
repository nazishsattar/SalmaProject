<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $search;
    public $min_price;
    public $max_price;
    public $product_cat;
    public $product_cat_id;


    public function mount()
    {
        $this->sorting="default";
        $this->pagesize=12;
        $this->min_price=1;
        $this->max_price=5000;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
        


    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }
    
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem )
        {
            if($witem->id== $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting=='date')
        {
              $products=Product::where('name','like','%' .$this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->orderBy('created_at','DESC')->paginate($this->pagesize);

        }
        else if($this->sorting=='price')
        {
            $products=Product::where('name','like','%' .$this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);


        }
        else if($this->sorting=='price-desc')
        {
            $products=Product::where('name','like','%' .$this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->paginate($this->pagesize);


        }
        else
        {
            $products=Product::where('name','like','%' .$this->search .'%')->where('category_id','like','%'.$this->product_cat_id .'%')->paginate($this->pagesize);
        }
        $categories=Category::all();
        $product = Product::all();
        $lproducts=Product::orderby('created_at','DESC')->get()->take(8);
        $popular_products=Product::inRandomOrder()->limit(4)->get();
        return view('livewire.search-component',['products'=>$products,'lproducts'=>$lproducts,'categories'=>$categories,'popular_products'=>$popular_products])->layout("layouts.base");
    }
}
