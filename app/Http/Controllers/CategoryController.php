<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('category');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
            'categoryName'=>'required',
            'categoryPhoto'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $filename = '';
        if ($request->hasFile('categoryPhoto')) {
            $extension = $request->categoryPhoto->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension; 
            $request->categoryPhoto->move(public_path('/assets/uploads/'), $filename);
        }
        $category = Category::create([ 
            'categoryName' => $request->categoryName,
            'categoryPhoto' => $filename
        ]);
        return redirect('category');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {                   
        $category = Category::find($id);
        return view('create')->with('category', $category);
    }


    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
            $validator = Validator::make($request->all(),[
            'categoryName'=>'required',
            'categoryPhoto'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $filename = '';
        if ($request->hasFile('categoryPhoto')) {
            $extension = $request->categoryPhoto->getClientOriginalExtension(); 
            $filename = time() . '.' . $extension; 
            $request->categoryPhoto->move(public_path('/assets/uploads/'), $filename);
        }
        
        $category->update([
            'categoryName' => $request->categoryName,
            'categoryPhoto' => $filename,
        ]);
        return redirect('category');
    }

    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect('category');
    }
}