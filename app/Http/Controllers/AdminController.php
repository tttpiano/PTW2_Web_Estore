<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\QueryException;
use App\Models\Brand;
use App\Models\User;
use App\Models\InternalMemory;
use App\Models\Product;
use App\Models\RamSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController
{
    // public function showuser()
    // {
    //     return view('front.admins.index');
    // }

    public function showadmin()
    {
        $product = Product::count();
        $user = User::count();

        return view('front.admins.index', ['product' => $product], ['user' => $user]);
    }

    public function showproduct()
    {
        $sDetail = Product::orderBy('id', 'desc')->with('brand')->with('ram')->paginate(10);
        return view('front.admins.product', ['sDetail' => $sDetail]);
    }

    //------------------------
    public function addproduct()
    {
        $brand = Brand::orderBy('id', 'asc')->get();
        $ram = RamSize::orderBy('id', 'desc')->get();
        $internalMemory = InternalMemory::orderBy('id', 'desc')->get();
        return view('front.admins.product_add', ['brand' => $brand, 'ram' => $ram, 'internalMemory' => $internalMemory]);
    }

    public function editproduct($id)
    {
        try {
            // Attempt to decrypt the ID
            $decodedId = decrypt($id);
            $brand = Brand::orderBy('id', 'asc')->get();
            $ram = RamSize::orderBy('id', 'desc')->get();
            $internalMemory = InternalMemory::orderBy('id', 'desc')->get();
            $product = Product::find($decodedId);


            return view('front.admins.product_edit', compact('product','brand','ram','internalMemory'));

        } catch (DecryptException $e) {
            // Decryption failed, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid URL.');
        }
    }

    //------------------------ brand

    public function insertProduct(Request $request)
    {

        // Kiểm tra xem có file avatar được tải lên không
        if ($request->hasFile('avatar')) {
            $originName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;

            // Di chuyển file vào thư mục public/storage/img/
            $request->file('avatar')->move(public_path('storage/img/'), $fileName);

            // Lưu tên file vào session để sử dụng khi tạo hình ảnh mới
            $request->session()->put('fileName1', $fileName);
        }

        // Tạo dữ liệu cho sản phẩm
        $productData = [
            'name' => $request->input('name'),
            'description' => $request->description,
            'price' => $request->input('price'),
            'openratingSystems' => $request->input('openratingSystems'),
            'brandId' => $request->input('Brandll'),
            'ramSizeId' => $request->input('ram'),
            'internalMemoryId' => $request->input('internalMemory'),
            'operatingSystemId' => 0,

        ];

        // Tạo sản phẩm
        $product = Product::create($productData);

        // Kiểm tra xem có tên file trong session không
        if ($request->session()->has('fileName1')) {
            // Tạo dữ liệu cho hình ảnh
            $imageData = [
                'url' => 'http://127.0.0.1:8000/storage/img/' . $request->session()->get('fileName1'),
                // Các trường khác của hình ảnh nếu cần
            ];

            // Tạo hình ảnh liên quan đến sản phẩm vừa tạo
            $newImage = $product->images()->create($imageData);

            // Xóa tên file khỏi session sau khi sử dụng
            $request->session()->forget('fileName1');
        }

        return back()->with('success', 'Product added successfully');
    }
    public function updateproduct($id,Request $request)
    {
        $product=Product::find($id);
        if (!$product){
            return redirect('/admin')->with('error', 'Sản phẩm không tồn tại.');
        }
        // Kiểm tra xem có file avatar được tải lên không
        if ($request->hasFile('avatar')) {
            $originName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;


            // Di chuyển file vào thư mục public/storage/img/
            $request->file('avatar')->move(public_path('storage/img/'), $fileName);

            // Lưu tên file vào session để sử dụng khi tạo hình ảnh mới
            $request->session()->put('fileName1', $fileName);
        }

        // Tạo dữ liệu cho sản phẩm
        $productData = [
            'name' => $request->input('name'),
            'description' => $request->description,
            'price' => $request->input('price'),
            'openratingSystems' => $request->input('openratingSystems'),
            'brandId' => $request->input('Brandll'),
            'ramSizeId' => $request->input('ram'),
            'internalMemoryId' => $request->input('internalMemory'),
            'operatingSystemId' => 0,

        ];

        // Tạo sản phẩm
        $product->update($productData);

        // Kiểm tra xem có tên file trong session không
        if ($request->session()->has('fileName1')) {
            // Tạo dữ liệu cho hình ảnh
            $imageData = [
                'url' => 'http://127.0.0.1:8000/storage/img/' . $request->session()->get('fileName1'),
                // Các trường khác của hình ảnh nếu cần
            ];

            // Tạo hình ảnh liên quan đến sản phẩm vừa tạo
            $newImage = $product->images()->update($imageData);

            // Xóa tên file khỏi session sau khi sử dụng
            $request->session()->forget('fileName1');
        }

        return back()->with('success', 'Product update successfully');
    }


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
        return view('front.admins.categery.rom_edit', ['edit_rom' => $edit]);
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
    public function deleteproduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'product not found');
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

    //them user
    public function insertUser(Request $request)
    {


        User::create([
            'name' => $request->name,
            'numberPhone' => $request->numberPhone,
            'avatar' => $request->img,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'type' => $request->type
        ]);
        return response()->json(['success' => true]);
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

    public function storeImage(Request $request)
    {
        if ($request->hasFile('fileUpload')) {
            $originName = $request->file('fileUpload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('fileUpload')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;
            // Public Folder
            $request->file('fileUpload')->move(public_path('storage/img/'), $fileName);
            $request->session()->put('fileName1', $fileName);

            return back()->with('success', 'Image uploaded Successfully!')
                ->with('images', $fileName);
        }
    }

    // user

    //show trang user
    public function User()
    {
        //note
        $user = User::orderBy('id', 'desc')->paginate(3);
        return view('front.admins.user', ['user' => $user]);
    }

    //click user
    public function addpuser()
    {
        return view('front.admins.user_add');
    }

    //click edit
    public function edituser($id)
    {
        $edit = User::find($id);
        return view('front.admins.user_edit', ['user' => $edit]);
    }

    //xoa user
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    // update user
    public function updateUser($id, Request $request)
    {

        $user = RamSize::find($id);
        if ($user) {
            $user->update([
                'name' => $request->input('user'),
                // Cập nhật các trường khác nếu cần
            ]);

            return redirect()->back()->with('success', 'user  updated successfully');
        } else {
            return redirect()->back()->with('error', 'user  not found');
        }
    }
    public function searchUser(Request $request)
    {
        $request->validate([
            'key' => 'nullable|string|max:500',
        ]);
        $key = trim(substr(request()->key, 0, 500));
        $user = null;
        if ($key != '') {
            $user = User::where('name', 'like', "%" . $key . "%")->paginate(9);
        }
        return view('front.admins.searchUser', ['user' => $user]);
    }
    public function searchProduct(Request $request)
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

        return view('front.admins.searchProduct', [
            'brands' => $brands,
            'ramsizes' => $rams,
            'internalMemories' => $internalMemories,
            'search' => $search,
        ]);
    }
}
