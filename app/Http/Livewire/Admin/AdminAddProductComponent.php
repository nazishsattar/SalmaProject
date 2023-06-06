<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Carbon;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sale_per;
    public $stock_status;
    public $quantity;
    public $image;
    public $category_id;
    public $images;
    public $scategory_id;
    
    public function mount()
    {
        $this->stock_status='instock';
        // $this->featured=0;

    }
    public function generateslug()
    {
        $this->slug=Str::slug($this->name);

    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
        'name'=>'required',
        'slug'=>'required|unique:products',
        'short_description'=>'required',
        'description'=>'required',
        'regular_price'=>'required',
        'sale_price'=>'nullable|numeric',
        'sale_per'=>'nullable|numeric',
        'stock_status'=>'required',
        'quantity'=>'nullable|numeric',
        'image'=>'required|mimes:jpeg,png,jpg,webp',
        'category_id'=>'required',

        ]);

    }

    public function addProduct(){
        $this->validate([
        'name'=>'required',
        'slug'=>'required|unique:products',
        'short_description'=>'required',
        'description'=>'required',
        'regular_price'=>'required',
        'sale_price'=>'nullable|numeric',
        'sale_per'=>'nullable|numeric',
        'stock_status'=>'required',
        'quantity'=>'nullable|numeric',
        'image'=>'required|mimes:jpeg,png,jpg,webp',
        'category_id'=>'required',
        ]);
        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->sale_per=$this->sale_per;
        $product->stock_status=$this->stock_status;
        $product->quantity=$this->quantity;

        $imageName=Carbon::now()->timestamp . '.' .$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName=Carbon::now()->timestamp . $key .'.' .$image->extension();
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
        // session()->flash('message','Product has been added successfully');
        return redirect()->route('admin.products')->with('message','Product has been added successfully');

    }
    public function changeSubcategory()
    {
        $this->scategory_id=0;
    }

    public function render()
    {
        $categories=Category::all();
        $scategories=SubCategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.admin-add-product-component',['categories'=> $categories,'scategories'=>$scategories])->layout('layouts.base');
    }
}
