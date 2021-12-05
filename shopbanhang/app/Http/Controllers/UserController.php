<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
    
        $users = User::paginate(4);

        if ($search) {
            $users = DB::table('users')->where('name', 'like', "%" . $search . "%")->paginate(4);
        } else {
            $users = User::paginate(4);
        }
        $params = [
            'users' => $users
        ];
        return view('admin.users.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->confirm_password = Hash::make($request->confirm_password);
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->level = 'khách hàng';
        $users->save();
        return redirect()->route('users.index')->with('success', 'Thêm khách hàng thành công');
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
        $users = User::find($id);
        $params = [
            'users' => $users,
        ];
        return view('admin.users.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        User::find($id)->update($request->only('name', 'email', 'password', 'confirm_password', 'address', 'phone'));
        return redirect()->route('users.index')->with('success', 'Thêm người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Xóa khách hàng thành công');
    }
}
