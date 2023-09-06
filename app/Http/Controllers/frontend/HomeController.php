<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\FetchTrait;

class HomeController extends Controller
{
    use FetchTrait;
    
    public function index()
    {
        $banners = $this->getBanners();
        return view('frontend.home',$banners);
    }
}
