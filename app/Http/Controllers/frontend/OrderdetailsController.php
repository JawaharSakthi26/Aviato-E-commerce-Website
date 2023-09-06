<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\FetchTrait;

class OrderdetailsController extends Controller
{
    use FetchTrait;

    public function show($order_id)
    {
        $data = $this->getOrderDetailsAndCartItems($order_id);
        return view('frontend.orderDetails', $data);
    }
}