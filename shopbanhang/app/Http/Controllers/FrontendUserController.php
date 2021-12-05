<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendUserController extends Controller
{
    public function edit_cart(Request $request)
    {
        if (Auth::user()) {
            $users = Auth::user();
        } else {
            $users = User::find(1);
        }
        foreach ($request->product_id as $key => $product_id) {
            $cart_product = Cart::where('product_id', '=', $product_id)->where('user_id', '=', $users->id)->first();
            $cart_product->quantity = $request->quantity[$key];
            $cart_product->save();
        }
        return redirect()->route('cart')->with('success', 'Chỉnh sửa thành công');
    }
    public function delete_cart($id)
    {

        Cart::find($id)->delete();
        return redirect()->route('cart')->with('success', 'Xóa thành công');
    }
}
