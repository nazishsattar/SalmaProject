<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
// class CustomerWishlistController extends Controller
// {
//     public function removeFromWishlist($product_id)
//     {
//         foreach(Cart::instance('wishlist')->content() as $witem )
//         {
//             if($witem->id== $product_id)
//             {
//                 Cart::instance('wishlist')->remove($witem->rowId);
//                 return;
//             }
//         }
//         // $product = Product::find($product_id);
//         return '<a href="javascript:void(0)" class="add_to_wishlist" data-value="'.$product_id.'"><i class="fa fa-heart "></i></a>';
//     }
//     public function addToWishlist($product_id)
//     {
//         $product = Product::find($product_id);
//         Cart::instance('wishlist')->add($product->id,$product->name,1,$product->regular_price)->associate('App\Models\Product');
        
//     }
// }
