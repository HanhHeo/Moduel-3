<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

            $categories = Category::all();
            $sell_products = Product::where('sold','>',5)->orderBy('sold','DESC')->limit(8)->paginate(8);
            $new_products  = Product::orderBy('created_at', 'DESC')->paginate(8);

            $params = [
                'categories' => $categories,
                'sell_products' => $sell_products,
                'new_products' => $new_products
            ];
        return view('admin.index',$params);
    }
}
