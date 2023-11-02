<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class ShopDetailController
{
    public function showId($id)
    {
        $sDetail = Product::with('brand')->with('ram')
            ->find($id);
        $relatedProducts = Product::where('brandId',$sDetail->brandId)->where('id','<>',$id)->get();
        $product = Product::findOrFail($id);
        $ratings = Review::where('product_id', $id)->get();
        return view('front.shopDetail', ['sDetail' => $sDetail,'relatedProducts'=>$relatedProducts,'product'=>$product,'ratings'=>$ratings]);


    }
}
