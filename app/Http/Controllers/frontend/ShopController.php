<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\FetchTrait;

class ShopController extends Controller
{
    use FetchTrait;
   
    public function index()
    {   
        $singleImages = $this->getSingleProductImages();
        return view('frontend.shop', compact('singleImages'));
    }
}
