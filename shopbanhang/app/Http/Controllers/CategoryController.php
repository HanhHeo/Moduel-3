<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $categories = Category::paginate(4);

        if($search){
         
            $categories = Category::where('name','like','%'.$search.'%')->paginate(4);
        }else{
            $categories = Category::paginate(4);
        }
        $params = [
            'categories' => $categories
        ];
        return view('admin.category.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->only('name','code'));
        return redirect()->route('categories.index')->with('success', 'Thêm dữ liệu thành công');
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
        $categories = Category::find($id);
        $params     = [
            'categories' => $categories
        ];
        return view('admin.category.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        
        Category::find($id)->update($request->only(
            'name',
            'code'
        ));
    return redirect()->route('categories.index')->with('success', 'Cập nhật thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $categories = Category::find($id);
         $name       = $categories->name;
         $categories ->delete();
        return redirect()->route('categories.index')->with('success','Xóa' .$name. 'Thành công' );
    }
}
