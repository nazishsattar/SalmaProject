<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;
use App\Models\Subcategory;


class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $scategory_slug;
    public $min_price;
    public $max_price;

    public function mount($category_slug,$scategory_slug=null)
    {
        $this->sorting="default";
        $this->pagesize=16;
        $this-> category_slug= $category_slug;
        $this->scategory_slug=$scategory_slug;
        $this->min_price=1;
        $this->max_price=50000;

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
         $category_id=null;
         $category_name="";
         $filter="";
         if($this->scategory_slug)
         {
             $scategory=Subcategory::where('slug',$this->scategory_slug)->first();
             $category_id=$scategory->id;
             $category_name=$scategory->name;
             $filter="sub";

         }
         else
         {
            $category=Category::where('slug',$this->category_slug)->first();
            $category_id=$category->id;
            $category_name=$category->name;
            $filter="";

         }
        if($this->sorting=='date')
        {
              $products=Product::where($filter .'category_id', $category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);

        }
        else if($this->sorting=='price')
        {
            $products=Product::where($filter.'category_id', $category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);


        }
        else if($this->sorting=='price-desc')
        {
            $products=Product::where($filter.'category_id', $category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);


        }
        else
        {
            $products=Product::where($filter.'category_id', $category_id)->paginate($this->pagesize);
        }
        $categories=Category::all();
        $product = Product::all();
        $lproducts=Product::orderby('created_at','DESC')->get()->take(8);
        $popular_products=Product::inRandomOrder()->limit(5)->get();
      
        return view('livewire.category-component',['products'=>$products,'lproducts'=>$lproducts,'categories'=>$categories,'category_name'=>$category_name,'popular_products'=>$popular_products])->layout("layouts.base");
    }
}
