<?php

namespace App\Http\Controllers;

use App\Models\FavouriteItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function FavouriteShow()
    {
        $total = 0;
      
        $user = Auth::user();
        $listItem = FavouriteItem::with('product')->where('user_id', $user->id)->get();
        $countProducts = $listItem->count();
        session()->put('count_favourite', $countProducts);
        session()->put('total', $total);
        return view('front.favourite', compact('listItem'));
        return view('front.index', compact('total','countProducts'));
        
    }
    public function favouriteAdd(Request $request)
    {
        $user = Auth::user();
        // $cart = FavouriteItem::where('user_id', $user->id )->first();
        $userItem = FavouriteItem::where('product_id', $request->product_id)->where('user_id',$user->id)->first();
        if ($userItem === null){
            $userItem = FavouriteItem::create([
                'user_id'=> $user->id,
                'product_id'=> $request->product_id,
                'do_not'=> 0
            ]);
        }
   
        return response()->json(['success' => true]);
    }
    public function Favouritedelete($id){
        $user = Auth::user();
        $listCartItem = null;
        $cart = FavouriteItem::where('user_id', $user->id )->first();
        if ($cart != null){
            $listCartItem = FavouriteItem::destroy($id);
        }
        return redirect('/favourite/show');
    }
    
}
