<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\InternalMemory;
use App\Models\Product;
use App\Models\RamSize;
use Illuminate\Http\Request;

class AdminController
{
    public function showadmin()
    {
        return view('front.admins.index');
    }
    public function showproduct()
    {
        return view('front.admins.product');
    }


    //------------------------
    public function addproduct()
    {
        return view('front.admins.product_add');
    }
    public function editproduct()
    {
        return view('front.admins.product_edit');
    }

    //------------------------ brand


    public function brandproduct()
    {
        $brand = Brand::all();
        return view('front.admins.categery.brand', ['brand' => $brand]);

    }

 
    // them xoo sua bran
    public function addbrand()
    {
        return view('front.admins.categery.brand_add');
    }
    public function editbrand()
    {
        return view('front.admins.categery.brand_edit');
    }

    // ram
    public function ramproduct()
    {
        return view('front.admins.categery.ram');
    }

    public function addram()
    {
        return view('front.admins.categery.ram_add');
    }
    public function editram()
    {
        return view('front.admins.categery.ram_edit');
    }

    // bo nho trong
    public function romproduct()
    {
        return view('front.admins.categery.rom');
    }
    public function addrom()
    {
        return view('front.admins.categery.rom_add');
    }
    public function editrom()
    {
        return view('front.admins.categery.rom_edit');
    }

    // viet ham inseert cho brandaad

    public function insertBrand(Request $request){
         Brand::create([
            'name' => $request->input('name'),
         ]);
 
         return redirect()->back()->with('success', 'Brand added successfully');
    }

}
