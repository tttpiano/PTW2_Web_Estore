<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class HeaderController
{
    public function brand()
    {
        $brands = Brand::all();
        return view('front.header',['brands'=>$brands]);
}
}
