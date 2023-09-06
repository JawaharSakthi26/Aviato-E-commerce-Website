<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('banner.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'bannerName' => 'required',
        'bannerPhoto' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    $filename = '';

    if ($request->hasFile('bannerPhoto')) {
        $uploadedFile = $request->file('bannerPhoto');
        $filename = time() . '.' . $uploadedFile->extension();
        $uploadedFile->move(public_path('/assets/bannerUploads/'), $filename);
    }

    $category = Banner::create([
        'bannerName' => $request->bannerName,
        'bannerPhoto' => $filename, // Store only the file name, not the path
    ]);

    return view('banner.list');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        return view('banner.index')->with('banner',$banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        $request->validate(
            [
                'bannerName'=>'required',
                'bannerPhoto'=>'required'
            ]
        );
        $filename = '';

        if ($request->hasFile('bannerPhoto')) {
            $uploadedFile = $request->file('bannerPhoto');
            $filename = time() . '.' . $uploadedFile->extension();
            $uploadedFile->move(public_path('/assets/bannerUploads/'), $filename);
        }
        $banner->update([
            'bannerName' => $request->bannerName,
            'bannerPhoto' => $filename
        ]);
        return view('banner.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Banner::destroy($id);
        return redirect('banner');
    }
}
