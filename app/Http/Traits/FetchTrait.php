<?php 

namespace App\Http\Traits;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\Payments;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;

trait FetchTrait{

    public function getBanners(){
        $banner = Banner::where('bannerName','like','%Hero-Section%')->get();
        $productCategory = Banner::where('bannerName','like','%ProductCategory%')->get();
        $trendyProducts = Banner::where('bannerName','like','%TrendyProducts%')->get();

        return compact('banner', 'productCategory', 'trendyProducts');
    }

    public function getSingleProductImages()
    {
        return ProductImage::whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('product_images')
                ->groupBy('prod_Id');
        })->get();
    }

    public function getProductDetails($productId)
    {
        return Product::with('images')->find($productId);
    }

    public function getCartData()
    {
        $userId = Auth::id();
    
        return Cart::where('user_id', $userId)->get();
    }

    public function getAllOrderDetailsforAdminPanel()
    {
        return Order_details::all();
    }

    public function deleteCartItem($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->delete();
        }
    }

    public function getPaymentsForDashboard()
    {
        $userId = Auth::id();
        $userOrders = Order::where('user_id', $userId)->get();
        $payments = [];
        foreach ($userOrders as $order) {
            $orderPayments = Payments::where('order_id', $order->id)->get();
            $payments = array_merge($payments, $orderPayments->toArray());
        }
        return $payments;
    }

    public function getPaymentsForAdminPanel(){
        $payments = Payments::all();
        return $payments;
    }

    public function getAddressData()
    {
        $userId = Auth::id();
        return Order::where('user_id', $userId)->get();
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
        }
    }

    public function getAddressForEdit($id)
    {
        return Order::findOrFail($id);
    }

    public function getOrderDetailsAndCartItems($order_id)
    {
        $order = Order::with('order_details')->find($order_id);
        $orderDetails = $order->order_details;

        foreach ($orderDetails as $orderDetail) {
            $orderDetail->load('product.images');
        }

        return compact('order', 'orderDetails');
    }
    
    public function destroyCart() {
        Cart::truncate();
    }
}