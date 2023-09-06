<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Users::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Users::find($id);
        return view('users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Users::find($id);
        $password = $request->password;
        $password_hashed = Hash::make($password);
        $hobbies = implode(',',$request->hobbies);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password_hashed,
            'contact' => $request->contact,
            'address' => $request->address,
            'country' => $request->country,
            'skills' => $request->skills,
            'gender' => $request->gender,
            'hobbies' => $hobbies,
        ]);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Users::destroy($id);
        return redirect('users');
    }
}
