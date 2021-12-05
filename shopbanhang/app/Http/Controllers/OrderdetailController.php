<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderdetails = Orderdetail::all();
        $params = [
            'orderdetails'=>$orderdetails
        ];
        
        return view('admin.orderdetail.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $params = [
            'products' => $products
        ];
        return view('admin.orderdetail.create',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::find($request->order_id);
        $old_total = $order->total;
        $orderdetail = new OrderDetail;
        $orderdetail->total = $old_total + $request->price * $request->quantity;
        $orderdetail->order_id = $request->order_id;
        $orderdetail->product_id = $request->product_id;
        $orderdetail->price = $request->price;
        $orderdetail->quantity = $request->quantity;
        $orderdetail->save();

        return redirect()->route('orders.show',$request->order_id)->with('success','Thêm đơn hàng sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        $params = [
            'products' => $products,
            'order_id' => $id
        ];
        return view('admin.orderdetail.create',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
