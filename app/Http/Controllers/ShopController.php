<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\InternalMemory;
use App\Models\Product;
use App\Models\RamSize;
use App\Models\User;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show(Request $request)
    {
        //
        $minamount = $request->minamount;
        $maxamount = $request->maxamount;

        $sort = $request->sort;


        $minamount = str_replace(['.', '₫'], '', $minamount);
        $minamount = floatval($minamount);

        $maxamount = empty($maxamount) ? '500000000':str_replace(['.', '₫'], '', $maxamount);
        $maxamount = floatval($maxamount);

        //
        $brand = $request->brand ?? [];
        $brandId = array_keys($brand) == null ? [] : array_keys($brand);
        //
        $ram = $request->ram ?? [];
        $ramSizeId = array_keys($ram) == null ? [] : array_keys($ram);
        //
        $memories = $request->memory ?? [];
        $memoriesId = array_keys($memories) == null ? [] : array_keys($memories);
        if($sort!=null) {
            $products = (array_keys($brand) != null || array_keys($ram) != null || array_keys($memories) != null) ?
                Product::with('images')
                    ->whereIn('brandId', $brandId)
                    ->orWhereIn('ramSizeId', $ramSizeId)
                    ->orWhereIn('internalMemoryId', $memoriesId)
                    ->whereBetween('price', [$minamount, $maxamount])
                    ->orderBy('price',$sort)
                    ->paginate(9) :
                Product::with('images')
                    ->orWhereBetween('price', [$minamount, $maxamount])
                    ->orderBy('price',$sort)
                    ->paginate(9);
        }else{
            $products = (array_keys($brand) != null || array_keys($ram) != null || array_keys($memories) != null) ?
                Product::with('images')
                    ->whereIn('brandId', $brandId)
                    ->orWhereIn('ramSizeId', $ramSizeId)
                    ->orWhereIn('internalMemoryId', $memoriesId)
                    ->orWhereBetween('price', [$minamount, $maxamount])
                    ->paginate(9) :
                Product::with('images')
                    ->orWhereBetween('price', [$minamount, $maxamount])
                    ->paginate(9);
        }
//        if($sort!=null){
//            usort($products,function ($a, $b){
//                return $a->price - $b->price;
//            });
//        }
        $brands = Brand::all();
        $rams = RamSize::all();
        $internalMemories = InternalMemory::all();
        $products->appends(['sort' => 'asc']);
        return view('front.shop', ['products' => $products, 'brands' => $brands, 'ramsizes' => $rams, 'internalMemories' => $internalMemories]);


    }

    public function filter(Request $request)
    {
        $products = Product::where('brandId', $request->query('brandId'))->paginate(5);
        return redirect('/shop', ['products' => $products]);
    }


}
