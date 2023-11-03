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
    public function addproduct()
    {
        return view('front.admins.product_add');
    }
    public function editproduct()
    {
        return view('front.admins.product_edit');
    }
    public function brand()
    {
        return view('front.admins.categery.brand');
    }
    public function ram()
    {
        return view('front.admins.categery.ram');
    }
    public function rom()
    {
        return view('front.admins.categery.rom');
    }
}