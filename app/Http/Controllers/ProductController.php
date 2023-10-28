<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// import vào để chạy db
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class ProductController extends Controller
{


    // product
    public function showProduct()
    {
        $product = Product::all();
        $brands = Brand::all();
        $sort = Product::orderBy('price', 'desc')->take(8)->get();
        $latestProducts = Product::orderBy('id', 'desc')->take(3)->get();
        $latestProducts2 = Product::orderBy('id', 'desc')->skip(3)->take(3)->get();
        $top = Product::orderBy('price', 'desc')->take(3)->get();
        $top2 = Product::orderBy('price', 'desc')->skip(3)->take(3)->get();
        return view('front.index', ['product' => $product, 'sort' => $sort,
            'latestProducts' => $latestProducts, 'latestProducts2' => $latestProducts2,
            'top' => $top, 'top2' => $top2, 'brands'=> $brands
        ]);

    }

}
