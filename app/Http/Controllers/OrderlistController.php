<?php

namespace App\Http\Controllers;

use App\Http\Traits\FetchTrait;

class OrderlistController extends Controller
{
    use FetchTrait;

    public function index()
    {
        $orderDetails = $this->getAllOrderDetailsforAdminPanel();
        return view('orderList', compact('orderDetails'));
    }
}
