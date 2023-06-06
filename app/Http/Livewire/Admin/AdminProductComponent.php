<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $searchTerm;
   public function deleteProduct($id)
   {
    $product=Product::find($id);
    if($product->image)
    {
        unlink('assets/images/products'.'/'.$product->image);
    }
    if($product->images)
    {
    $images=explode(",",$product->images);
    foreach($images as $image)
    {
        if($image){
        unlink('assets/images/products'.'/'.$image);}
    }
    }
    $product->delete();
    session()->flash('message',"Product has been deleted successfully");

   }
   
    public function render()
    {
        $search='%' .$this->searchTerm . '%';
        $products=Product::where('name','LIKE',$search)
            ->orwhere('stock_status','LIKE',$search)
            ->orwhere('regular_price','LIKE',$search)
            ->orwhere('sale_price','LIKE',$search)
            ->orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}
