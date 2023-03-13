<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Product::class, 'product');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view("products.index",[
            "products"=>Product::all()
        ]);
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
       if ($request->user()->can('create', Product::class)){

       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        if ($request->user()->can('update', $product)){

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        /*
        if (Gate::denies('editProduct', $product)){
            return redirect()->back();
        }
*/
        return view("products.edit",[
            "product"=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name=$request->name;
        $product->price=$request->price;
        if ($request->file("picture")!=null){
            if ($product->picture!=null){
                unlink(storage_path()."/app/public/products/".$product->picture);
            }
            $request->file("picture")->store("/public/products");
            $product->picture=$request->file("picture")->hashName();
        }
        $product->save();
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
