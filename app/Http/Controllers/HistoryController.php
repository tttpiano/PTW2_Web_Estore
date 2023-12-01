<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\History;
use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Contracts\View\View;

class HistoryController
{
    public function historyShow()
    {
        $history = History::all();
        
        return view('front.history',['history'=>$history]);
    }
}
