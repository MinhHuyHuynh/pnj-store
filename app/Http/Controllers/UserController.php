<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $datas = DB::table('user')->paginate(5);
        return view ('admin.list_user',compact(['datas']));
    }

    public function create()
    {
        return view('admin.add_user');
    }

    public function store(Request $request)
    {
        if(DB::table('user')->where('email',$request->email)->first())
        {
            $result = 'Email đã tồn tại !' ;
            return view('admin.add_user',compact('result'));
        }
        DB::table('user')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $result = 'Thêm thành công' ;
        return view('admin.add_user',compact('result'));
    }

    public function destroy($id)
    {
        DB::table('user')->where('id',$id)->delete();
        return redirect('admin/user/');
    }
}
