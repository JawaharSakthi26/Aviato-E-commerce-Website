<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\FetchTrait;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    use FetchTrait;

    public function index()
    {
        $address = $this->getAddressData();
        return view('frontend.address', compact('address'));
    }
    
    public function destroy($id)
    {
        $this->deleteOrder($id);
        return redirect('/shop');
    }
}
