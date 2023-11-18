<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\InternalMemory;
use App\Models\Product;
use App\Models\RamSize;
use Illuminate\Http\Request;

class SearchProductController
{
    public function search()
    {
        $key = request()->key;
        $brands = Brand::all();
        $rams = RamSize::all();
        $internalMemories = InternalMemory::all();
        if ($key != null) {
            $search = Product::where('products.name', 'like', "%" . $key . "%")->paginate(9);
        }
        return view('front.shopSearch', ['brands' => $brands, 'ramsizes' => $rams, 'internalMemories' => $internalMemories, 'search' => $search]);
    }
}
