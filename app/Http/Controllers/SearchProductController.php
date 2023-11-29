<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\InternalMemory;
use App\Models\Product;
use App\Models\RamSize;
use Illuminate\Http\Request;

class SearchProductController
{
    public function search(Request $request)
    {
        $request->validate([
            'key' => 'nullable|string|max:500',
        ]);

        $key = trim(substr(request()->key, 0, 500));
        $brands = Brand::all();
        $rams = RamSize::all();
        $internalMemories = InternalMemory::all();
        $search = null;


        if ($key !== '') {
            $search = Product::where('products.name', 'like', "%" . $key . "%")->paginate(9);
        }

        return view('front.shopSearch', [
            'brands' => $brands,
            'ramsizes' => $rams,
            'internalMemories' => $internalMemories,
            'search' => $search,
        ]);
    }


}
