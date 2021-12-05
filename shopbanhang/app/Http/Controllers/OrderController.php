<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $orders = Order::paginate(3);
        $users = User::all();
        if($search){
            $orders = Order::where('name','like','%'.$search.'%')->paginate(3);
        }else{
            $orders = Order::paginate(3);
        }
        $params = [
            'orders' => $orders,
            'users'=>$users
        ];
        return view('admin.orders.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $users = User::all();
       $params = [
           'users' => $users
       ];
      
        return view('admin.orders.create',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Order::create($request->only('user_id', 'status', 'total'));
        
            $order                  = new Order();
            $order->code            = '#ORDEW' . time();
            $order->user_id         = $request->user_id;
            $order->status          = $request->status;
            $order->save();
        return redirect()->route('orders.index')->with('success', 'Thêm đơn hàng mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $order =  Order::find($id);
    
        $params = [
            'order' => $order
        ];

        return view('admin.orderdetail.index',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::find($id);
        $users = User::all();
        $params = [
            'orders' => $orders,
            'users' => $users

        ];
        return view('admin.orders.edit', $params);
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
        Order::find($id)->update($request->only('user_id','code','status','total'));
        return redirect()->route('orders.index')->with('success', 'Cập nhật đơn hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders.index')->with('success','Xóa dữ liệu thành công');
    }
}
