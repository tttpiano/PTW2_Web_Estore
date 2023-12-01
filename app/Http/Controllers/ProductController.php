<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\FavouriteItem;
use App\Models\InternalMemory;
use App\Models\MiniChat;
use App\Models\MiniRepChat;
use App\Models\Product;
use App\Models\RamSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// import vào để chạy db
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;


class ProductController extends Controller
{


    // product
    public function showProduct()
    {
        // khai báo biến để lấy danh sách sản phẩm
        $product = Product::all();
        $brands = Brand::all();
        $ramsize = RamSize::all();
        $rom = InternalMemory::all();
        $favorite = FavouriteItem::all();
        $chat = MiniChat::all();
        $rep = MiniRepChat::all();
        $sort = Product::orderBy('price', 'desc')->take(8)->get();
        $latestProducts = Product::orderBy('id', 'desc')->take(3)->get();
        $latestProducts2 = Product::orderBy('id', 'desc')->skip(3)->take(3)->get();
        $top = Product::orderBy('price', 'desc')->take(3)->get();
        $top2 = Product::orderBy('price', 'desc')->skip(3)->take(3)->get();
        $slide = DB::table('slide')->get(); //site
        return view('front.index', ['product' => $product, 'sort' => $sort,
            'latestProducts' => $latestProducts, 'latestProducts2' => $latestProducts2,
            'top' => $top, 'top2' => $top2, 'brands'=> $brands,'ram'=>$ramsize,'rom'=>$rom,
            'favorite' => $favorite,'chat' => $chat, 'rep' => $rep,'slides' => $slide
        ]);
    }

    public function searchLq(Request $request)
    {
        $keyword = $request->search;

        $products = Product::where('name', 'like', '%' . $keyword . '%')->with('images')->paginate(5);

        $output = "";

        foreach ($products as $product) {
            // Retrieve the images for the current product
            $images = $product->images;

            // Check if there are images before trying to access the first one
            $imageSrc = $images->isNotEmpty() ? $images->first()->url : 'path/to/default/image.jpg';

            $output .= '<div class="sp" style="display: flex;align-items: center;border-bottom: 1px solid #ccc;padding: 20px 0px">
                    <img src="' . $imageSrc . '" alt="Product Image" style="width: 100px; height: 100px; object-fit: contain; margin-right: 10px;">
                    <div>
                        <span style="font-size: 16px; display: block; margin-bottom: 5px;">
                            <a class="disable-hover" href="'. route('shopId', ['id' => encrypt($product->id), 'product' => Str::slug($product->name)]).'" style="color:#000000;">
                                ' . $product->name . '
                            </a>
                        </span>';

            if ($product->price !== null) {
                $output .= '<span style="color: red">' . number_format($product->price) . ' VNĐ';
            } else {
                $output .= '<span style="color: red">Liên Hệ</span>';
            }

            $output .= '</div>
                </div>';
        }


        return response($output);

    }
    public function deleteChat($id)
    {
        $mini = MiniChat::find($id);
        if ($mini) {
            $mini->delete();
            return redirect()->back()->with('success', 'chat deleted successfully');
        } else {
            return redirect()->back()->with('error', 'chat not found');
        }
    }

    public function addChat(Request $request)
    {
        try {
            $user = User::all();
            MiniChat::create([
                'user_id' => $request->input('user_id'),
                'chat' => $request->input('chat')
            ]);
            return redirect()->back()->with('success', 'chat added successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add chat. ' . $e->getMessage());
        }
    }

}
