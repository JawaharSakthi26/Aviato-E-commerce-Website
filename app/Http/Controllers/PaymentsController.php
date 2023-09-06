<?php

namespace App\Http\Controllers;

use App\Http\Traits\FetchTrait;

class PaymentsController extends Controller
{
    use FetchTrait;

    public function index()
    {
        $payments = $this->getPaymentsForAdminPanel();
        return view('payment',compact('payments'));
    }
}