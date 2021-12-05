<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        if (Auth::user()) {
            $users = Auth::user();
        } else {
            $users = User::find(1);
        }
        $counts = Cart::where('user_id','=',$users->id)->count();

     
      
        $sell_products = Product::where('sold', '>', 5)->orderBy('sold', 'DESC')->limit(8)->paginate(8);
        $new_products  = Product::orderBy('created_at', 'DESC')->paginate(8);
        $categories    = Category::all();

        $params = [
            'new_products'  => $new_products,
            'sell_products' => $sell_products,
            'categories'    => $categories,
            'users'         => $users,
            'counts' => $counts

        ];

        return view('frontend.layouts.home', $params);
    }
    public function category($id)
    {

        $users = Auth::user();
        $categories      = Category::all();
        $products        = Product::where('category_id', '=', $id)->orderBy('created_at', 'DESC')->paginate(8);
        $categoryCurrent = Category::where('id', '=', $id)->orderBy('created_at', 'DESC')->first();
        // $new_products  = Product::orderBy('created_at', 'DESC')->paginate(8);
        // dd($categories);
        $params = [
            'products'       => $products,
            'categories'     => $categories,
            'categoryCurrent' => $categoryCurrent,
            'users'          => $users
        ];

        return view('frontend.categories', $params);
    }
    public function detail($id)
    {
        if (Auth::user()) {
            $users = Auth::user();
        } else {
            $users = User::find(1);
        }
        $comments = Comment::where('com_product', $id)->get();
        $products  = Product::where('id', '=', $id)->first();
        $categories      = Category::all();
        $params    = [
            'products' => $products,
            'categories' => $categories,
            'users'          => $users,
            'comments' => $comments
        ];
        return view('frontend.detail', $params);
    }
    public function cart()
    {
        $total = 0;
        if (Auth::user()) {
            $users = Auth::user();
        } else {
            $users = User::find(1);
        }
        $carts = DB::table('carts')
            ->join('product', 'product.id', '=', 'carts.product_id')
            ->select(
                'carts.*',
                'product.image',
                "product.name",
                DB::raw('(carts.price * carts.quantity) as totalPrice'),
                'carts.quantity'
            )
            ->where('carts.user_id', '=', $users->id)
            ->get();
        foreach ($carts as $cart) {
            $total += $cart->totalPrice;
        }
        $categories      = Category::all();
        $params = [
            'carts' => $carts,
            'categories' => $categories,
            'users'          => $users,
            'total' => $total
        ];
        return view('frontend.cart', $params);
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if (Auth::user()) {
            $users = Auth::user();
        } else {
            $users = User::find(1);
        }
        $cart_product = Cart::where('product_id', '=', $product->id)->where('user_id', '=', $users->id)->first();
        if ($cart_product) {
            $cart_product->quantity += 1;
            $cart_product->save();
        } else {
            $carts = new Cart();
            $carts->user_id = $users->id;
            $carts->product_id = $product->id;
            $carts->quantity = 1;
            $carts->price = $product->price;
            $carts->save();
        }
        return redirect()->route('cart');
    }
    public function postComment(Request $request, $id)
    {

        $comments = new Comment();
        $comments->com_name = $request->com_name;
        $comments->com_email = $request->email;
        $comments->com_content = $request->content;
        $comments->com_product = $id;
        $comments->save();
        return back();
    }
    public function getSearch(Request $request)
    {
        $search = $request->search;
        // $categoryCurrent = Category::where('id','=',$id)->orderBy('created_at','DESC')->first();
        $search = str_replace(' ', '%', $search);
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        $params = [
            'products' => $products,
        ];
        return view('frontend.search', $params);
    }
}
