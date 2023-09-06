<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\FetchTrait;

class CartController extends Controller
{
    use FetchTrait;

    public function index()
    {
        $cart = $this->getCartData();
        return view('frontend.cart', compact('cart'));
    }

    public function destroy($id)
    {
        $this->deleteCartItem($id);
        return redirect()->back();
    }
}
