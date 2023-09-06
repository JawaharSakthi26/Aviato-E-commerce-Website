<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\CreateTrait;
use App\Models\Cart;
use App\Http\Traits\FetchTrait;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    use FetchTrait;
    use CreateTrait;

    public function index()
    {
        $productId = request()->input('productId');
        $productDetails = $this->getProductDetails($productId);
        return view('frontend.productDetails', compact('productDetails'));
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'productQuantity' => 'required|numeric|min:1', 
        ], [
            'productQuantity.min' => 'The Quantity must be at least 1.',
        ]);
    
        $productId = request()->input('productId');
        $productQuantity = $request->productQuantity;
    
        $existingCartItem = Cart::where('product_id', $productId)->first();
    
        if ($existingCartItem) {
            $existingCartItem->update([
                'product_quantity' => $existingCartItem->product_quantity + $productQuantity,
            ]);
        } else {

            $cart = $this->addToCart(
                $productId,
                $request->productName,
                $request->productPrice,
                $productQuantity,
                $request->productImage
            );
        }
        return redirect('/cart');
    }
}
