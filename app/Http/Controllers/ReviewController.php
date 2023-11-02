<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function store(Request $request, $product_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|min:1|max:255'
        ]);

        $user = $request->user();
        $rating = Review::updateOrCreate(
            ['product_id' => $product_id, 'user_id' => $user->id],
            ['rating' => $request->input('rating'), 'comment' => $request->input('comment')]

        );

        $product = Product::findOrFail($product_id);
        $ratings = Review::where('product_id', $product_id)->get();
        return redirect()->route('shopId', $product_id)->with('success', 'comment thành công');
        return view('front.shopDetail', compact('product', 'ratings'));
    }

}
