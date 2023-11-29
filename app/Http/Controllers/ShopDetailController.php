<?php

namespace App\Http\Controllers;

use App\Models\FavouriteItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class ShopDetailController
{
    public function showId( $product,$id)
    {


        $decodedId = decrypt($id);
        $sDetail = Product::with('brand')->with('ram')
            ->find($decodedId);
        $favorite = FavouriteItem::all();
        $relatedProducts = Product::where('brandId',$sDetail->brandId)->orderBy('id', 'desc')->where('id','<>',$decodedId)->take(8)->get();
        $product = Product::findOrFail($decodedId);
        $ratings = Review::where('product_id', $decodedId)->get();
        return view('front.shopDetail', ['sDetail' => $sDetail,'relatedProducts'=>$relatedProducts,'product'=>$product,'ratings'=>$ratings,'favorite' => $favorite]);


    }
}
