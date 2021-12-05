<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $products = Product::paginate(2);

        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->paginate(2);
        } else {
            $products = Product::paginate(2);
        }
        $params = [
            'products' => $products
        ];
        return view('admin.products.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        $params = [
            'categories' => $categories,
            'products' => $products
        ];
        return view('admin.products.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->only('name', 'price', 'category_id', 'status','description');


        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            //tạo file upload trong public để chạy ảnh
            $path               = 'upload';
            $get_name_image     = $get_image->getClientOriginalName(); //abc.jpg 
            //explode "." [abc,jpg]
            //
            $name_image         = current(explode('.', $get_name_image)); //trả về phần tử thứ 1 của mảng
            //getClientOriginalExtension: tạo đuôi ảnh
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            $get_image->move($path, $new_image); //chuyển file ảnh tới thư mục
            $data['image']   = $new_image;
        }
        // dd($data);
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Thêm dữ liệu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();

        $params = [
            'products' => $products,
            'categories' => $categories
        ];
        return view('admin.products.edit', $params);
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
        $product =  Product::find($id);
        $new_image = $product->image;
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            //tạo file upload trong public để chạy ảnh
            $path               = 'upload';
            $get_name_image     = $get_image->getClientOriginalName(); //abc.jpg 
            //explode "." [abc,jpg]
            //
            $name_image         = current(explode('.', $get_name_image)); //trả về phần tử thứ 1 của mảng
            //getClientOriginalExtension: tạo đuôi ảnh
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            $get_image->move($path, $new_image); //chuyển file ảnh tới thư mục
            // $data['image']   = $new_image;

        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->image = $new_image;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Sửa dữ liệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          Product::find($id)->delete();
        return redirect()->route('products.index')->with('success', 'Xóa dữ liệu thành công');
    }
}
