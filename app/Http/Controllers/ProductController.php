<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Company;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $company_id = $request->input('company_id');

        $query = Product::query();

        if (isset($company_id)) {
            $query->where('company_id', $company_id);
        }

        if (isset($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        $products = $query->get();
        $companies = Company::all();

        return view('product.index', compact('products', 'companies', 'keyword', 'company_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('product.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $imgPath = $request->img_path;
        $path =  $imgPath->store('public/picture');
        Product::create([
            'product_name'  => $request->product_name,
            'company_id'    => $request->company_id,
            'price'         => $request->price,
            'stock'         => $request->stock,
            'comment'       => $request->comment,
            'img_path'      => $path,
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $product = Product::find($id);
        return view('product.edit',compact('product','companies',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $update = [
            'product_name'  => $request->product_name,
            'company_id'    => $request->company_id,
            'price'         => $request->price,
            'stock'         => $request->stock,
            'comment'       => $request->comment,
            'img_path'      => $request->img_path,
        ];
        Product::where('id', $id)->update($update);
        $product = Product::find($id);
        return view('product.show',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect(route('product.index'));
    }
}
