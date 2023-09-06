<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\FetchTrait;

class OrdersController extends Controller
{
    use FetchTrait;

    public function index()
    {
        $payments = $this->getPaymentsForDashboard();
        return view('frontend.orders',compact('payments'));
    }
}
