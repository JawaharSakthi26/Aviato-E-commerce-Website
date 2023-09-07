<?php

namespace App\Http\Traits;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\Payments;

trait CreateTrait{

    public function addToCart($productId, $productName, $productPrice, $productQuantity, $productImage)
    {
        return Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $productId,
            'product_name' => $productName,
            'product_price' => $productPrice,
            'product_quantity' => $productQuantity,
            'product_image' => $productImage,
        ]);
    }

    public function createOrder($request, $paymentIntent)
    {
        return Order::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'country' => $request->country,
            'product_total' => $request->total_price,
        ]);
    }

    public function createOrderDetails($order, $productIds, $productQuantities, $productPrices, $productTotals)
    {
        $totalItems = 0;
        foreach ($productIds as $index => $productId) {
            Order_details::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $productQuantities[$index],
                'price' => $productPrices[$index],
                'total_price' => $productTotals[$index],
            ]);
            $totalItems += $productQuantities[$index];
        }
        return $totalItems;
    }

    public function createPayment($order, $totalItems, $paymentIntent)
    {
        return Payments::create([
            'order_id' => $order->id,
            'total_items' => $totalItems,
            'total_price' => $paymentIntent->amount,
            'payment_status' => $paymentIntent->status,
        ]);
    }

    public function updateAddress($id, $data)
    {
        $address = Order::findOrFail($id);
        $address->update($data);
    }
}