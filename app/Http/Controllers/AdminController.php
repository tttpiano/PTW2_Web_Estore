<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
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
        $sDetail = Product::with('brand')->with('ram')->paginate(10);
        return view('front.admins.product',['sDetail'=>$sDetail]);
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


    // them xoo sua bran
    public function brandproduct()
    {
        //note
        $brand = Brand::orderBy('id', 'desc')->paginate(5);
        return view('front.admins.categery.brand', ['brand' => $brand]);
    }

    public function addbrand()
    {
        return view('front.admins.categery.brand_add');
    }
    public function editbrand($id)
    {
        // get data theo id
        $edit = Brand::find($id);

        return view('front.admins.categery.brand_edit', ['edit_brand' => $edit]);
    }

    // ram
    public function ramproduct()
    {
        $ramsize = RamSize::orderBy('id', 'desc')->paginate(5);
        // return view('front.admins.categery.ram',['ram' => $ram]);
        return view('front.admins.categery.ram')->with('ramsize', $ramsize);
    }

    public function addram()
    {
        return view('front.admins.categery.ram_add');
    }
    public function editram($id)
    {
        // get data theo id
        $edit = RamSize::find($id);
        return view('front.admins.categery.ram_edit', ['edit_ram' => $edit]);
    }

    // bo nho trong
    public function romproduct()
    {
        $rom = InternalMemory::orderBy('id', 'desc')->paginate(5);
        // return view('front.admins.categery.ram',['ram' => $ram]);
        return view('front.admins.categery.rom')->with('rom', $rom);
    }
    public function addrom()
    {
        return view('front.admins.categery.rom_add');
    }
    public function editrom($id)
    {
        $edit = InternalMemory::find($id);
        return view('front.admins.categery.rom_edit' ,['edit_rom' => $edit]);
    }


    

    // viet ham  thêm xóa sửa cho brandaad

    public function insertBrand(Request $request)
    {
        try {
            Brand::create(['name' => $request->input('name')]);
            return redirect()->back()->with('success', 'Brand added successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add brand. ' . $e->getMessage());
        }
    }
    public function deleteBrand($id)
    {
        $brand = Brand::find($id);

        if ($brand) {
            $brand->delete();
            return redirect()->back()->with('success', 'Brand deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Brand not found');
        }
    }
    public function updateBrand($id, Request $request)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->update([
                'name' => $request->input('name'),
                // Cập nhật các trường khác nếu cần
            ]);

            return redirect()->back()->with('success', 'Brand updated successfully');
        } else {
            return redirect()->back()->with('error', 'Brand not found');
        }
    }

   // viet ham  thêm xóa sửa cho Ram

    public function insertRam(Request $request)
    {
        try {
            RamSize::create(['size' => $request->input('Brandll')]);
            return redirect()->back()->with('success', 'Ram added successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Ram. ' . $e->getMessage());
        }
    }
    
    public function deleteRam($id)
    {
        $ram = RamSize::find($id);

        if ($ram) {
            $ram->delete();
            return redirect()->back()->with('success', 'Ram deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Ram not found');
        }
    }
    public function updateRam($id, Request $request)
    {
        
        $ram = RamSize::find($id);
        if ($ram) {
            $ram->update([
                'size' => $request->input('ram'),
                // Cập nhật các trường khác nếu cần
            ]);

            return redirect()->back()->with('success', 'ram  updated successfully');
        } else {
            return redirect()->back()->with('error', 'ram  not found');
        }
    }

  //  viet ham  thêm xóa sửa cho Bộ nhớ trong
    public function insertRom(Request $request)
    {
        try {
            InternalMemory::create(['size' => $request->input('rom')]);
            return redirect()->back()->with('success', 'Rom added successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Rom. ' . $e->getMessage());
        }
    }
    public function updateRom($id, Request $request)
    {
        
        $rom = InternalMemory::find($id);
        if ($rom) {
            $rom->update([
                'size' => $request->input('rom'),
                // Cập nhật các trường khác nếu cần
            ]);

            return redirect()->back()->with('success', 'rom  updated successfully');
        } else {
            return redirect()->back()->with('error', 'rom  not found');
        }
    }

    public function deleteRom($id)
    {
        $rom = InternalMemory::find($id);

        if ($rom) {
            $rom->delete();
            return redirect()->back()->with('success', 'rom deleted successfully');
        } else {
            return redirect()->back()->with('error', 'rom not found');
        }
    }
}
