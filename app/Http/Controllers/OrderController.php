<?php

namespace App\Http\Controllers;

use App\Events\AddProductToOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $kiekis=Order::count();
       // $orders=Order::all();



        //$orders= Order::get();

        //$orders->where('id',2) ;

       // $orders=Order::get();



        return view("orders.index",[
            "orders" =>Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("orders.create",[
           "users"=>User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order=new Order();
        $order->user_id=$request->user_id;
        $order->date= Carbon::now();
        $order->save();
        return redirect()->route("orders.show",$order->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view("orders.show",[
                "order"=>$order,
                "products"=>Product::all()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function addProduct($id, Request $request){
        $order=Order::find($id);
        $product=Product::find($request->product_id);
        $order->products()->attach($request->product_id, [
            'count'=>$request->count,
            'price'=>$product->price
        ]);
        $order->save();
        AddProductToOrder::dispatch($order, $product);
        return redirect()->route("orders.show",$order->id);
    }

    public function deleteProduct($id, $productid){
        $order=Order::find($id);
        $order->products()->detach($productid);
        $order->save();
        return redirect()->route("orders.show",$order->id);
    }
}
