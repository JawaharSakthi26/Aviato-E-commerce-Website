<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryName = Category::pluck('categoryName');
        return view('product.index')->with('categoryName',$categoryName);
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
        // dd( $request->prodPrice);
        $product = Product::create([
            'category' => $request->category,
            'prodName' => $request->prodName,
            'prodDescription' => $request->prodDescription,
            'prod_price' => $request->prodPrice,
            'prodSku' => $request->prodSku,
            'prodQuantity' => $request->prodQuantity,
        ]);
        $storagePath = public_path('assets/productUploads/' . $product->id);
        if ($request->hasFile('file')) {
            $files = $request->file('file');
        
            foreach ($files as $file) {
                $newFileName = uniqid() . '_' . $file->getClientOriginalName(); 
        
                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0777, true);
                }
        
                $file->move($storagePath, $newFileName); 
                ProductImage::create([
                    'prod_Id' => $product->id, 
                    'prodImages' => $newFileName,
                ]);
            }
        }
        return response()->json(['message' => 'Product and images uploaded successfully']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
