<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\CreateTrait;
use App\Http\Traits\FetchTrait;
use Illuminate\Http\Request;

class UpdateaddressController extends Controller
{
    use FetchTrait;
    use CreateTrait;

    public function edit($id)
    {
        $address = $this->getAddressForEdit($id);
        return view('frontend.updateAddress', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $this->updateAddress($id, [
            'name' => $request->name,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'country' => $request->country
        ]);

        return redirect('/address');
    }
}
