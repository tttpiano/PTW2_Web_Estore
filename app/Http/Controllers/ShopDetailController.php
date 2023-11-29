<?php

namespace App\Http\Controllers;

use App\Models\FavouriteItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Response;


class ShopDetailController
{



    public function showId($product, $id)
    {
        try {
            // Attempt to decrypt the ID
            $decodedId = decrypt($id);

            // Fetch product details
            $sDetail = Product::with('brand')->with('ram')->find($decodedId);
            if (!$sDetail) {
                // Product not found, redirect back with an error message
                return redirect()->back()->with('error', 'Product not found.');
            }

            // Fetch other data related to the product
            $favorite = FavouriteItem::all();
            $relatedProducts = Product::where('brandId', $sDetail->brandId)
                ->orderBy('id', 'desc')
                ->where('id', '<>', $decodedId)
                ->take(8)
                ->get();
            $product = Product::findOrFail($decodedId);
            $ratings = Review::where('product_id', $decodedId)->get();

            // Return the view with the data
            return view('front.shopDetail', [
                'sDetail' => $sDetail,
                'relatedProducts' => $relatedProducts,
                'product' => $product,
                'ratings' => $ratings,
                'favorite' => $favorite
            ]);

        } catch (DecryptException $e) {
            // Decryption failed, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid URL.');
        }
    }


}
