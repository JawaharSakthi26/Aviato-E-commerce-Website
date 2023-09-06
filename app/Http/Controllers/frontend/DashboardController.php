<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\FetchTrait;

class DashboardController extends Controller
{
    use FetchTrait;

    public function index()
    {
        $dashboard = $this->getPaymentsForDashboard();
        return view('frontend.dashboard', compact('dashboard'));
    }
}