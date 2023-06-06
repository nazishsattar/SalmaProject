<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Subcategory;

use Livewire\WithFileUploads;

use Illuminate\Support\Carbon;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sale_per;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;

    public $images;
    public $newimages;
    public $scategory_id;

    public function mount($product_slug)
    {
        $product=Product::where('slug',$product_slug)->first();
        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->short_description=$product->short_description;
        $this->description=$product->description;
        $this->regular_price=$product->regular_price;
        $this->sale_price=$product->sale_price;
        $this->sale_per=$product->sale_per;
        $this->stock_status=$product->Stock_status;
        $this->quantity=$product->quantity;
        $this->image=$product->image;
        $this->images=explode(",",$product->images);
        $this->category_id=$product->category_id;
        $this->newimage=$product->newimage;
        $this->scategory_id=$product->subcategory_id;
        $this->product_id=$product->id;
    }
    public function generateslug()
    {
        $this->slug=Str::slug($this->name,'-');

    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
        'name'=>'required',
        'slug'=>'required',
        'short_description'=>'required',
        'description'=>'required',
        'regular_price'=>'required',
        'sale_price'=>'nullable|numeric',
        'sale_per'=>'nullable|numeric',
        'stock_status'=>'required',
        'quantity'=>'nullable|numeric',  
        'category_id'=>'required'
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,png,jpg,webp',
            ]);
        }

    }
    public function updateProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'nullable|numeric',
            'sale_per'=>'nullable|numeric',
            'stock_status'=>'required',
            'quantity'=>'nullable|numeric',
            'category_id'=>'required',
            ]);
            if($this->newimage)
            {
                $this->validate([
                    'newimage'=>'required|mimes:jpeg,png,jpg,webp',
                ]);
            }
        $product=Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->sale_per=$this->sale_per;
        $product->stock_status=$this->stock_status;
        $product->quantity=$this->quantity;
        if($this->newimage)
        {
            unlink('assets/images/products'.'/'.$product->image);
            $imageName=Carbon::now()->timestamp . '.' .$this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image=$imageName;
        }
        if($this->newimages)
        {
            if($product->images)
            {
                $images=explode(",",$product->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink('assets/images/products'.'/'.$image);

                    }
                }
            }
            $imagesname='';
            foreach($this->newimages as $key=>$image)
            {
                $imgName=Carbon::now()->timestamp. $key . '.' . $image->extension();
                $image->storeAs('products',$imgName);
                $imagesname=$imagesname . ',' . $imgName;
            }
            $product->images=$imagesname;
        }
       
        $product->category_id=$this->category_id;
        if($this->scategory_id)
        {
            $product->subcategory_id=$this->scategory_id;
        }
        $product->save();
         $this->reset();
         return redirect()->route('admin.products')->with('message','Product has been updated successfully');
         //session()->flash('message','Product has been updated successfully');
    }
    public function changeSubcategory()
    {
        $this->scategory_id=0;
    }
    public function render()
    {
        $categories=Category::all();
        $scategories=Subcategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.admin-edit-product-component',['categories'=> $categories,'scategories'=>$scategories])->layout('layouts.base');
    }
}
