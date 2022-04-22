<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassifyController extends Controller
{
    public function index()
    {
        $datas = DB::table('classify')->paginate(5);
        return view ('admin.list_classify',compact(['datas']));
    }

    public function create()
    {
        return view('admin.add_classify');
    }

    public function store(Request $request)
    {
        DB::table('classify')->insert([
                'name' => $request->name,
        ]);
        $result = 'Thêm thành công' ;
        return view('admin.add_classify',compact('result'));
    }
    public function show($id)
    {
        $data = DB::table('classify')->where('id',$id)->first();
        return view('admin.show_classify',compact(['data']));
    }
    public function edit($id,Request $request)
    {

        DB::table('classify')->where('id',$id)->update([
            'name' => $request->name,
        ]);

        $result = 'Cập nhật thành công' ;
        $datas = DB::table('classify')->paginate(5);

        return view('admin.list_classify',compact('result','datas'));
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('classify')->delete($id);
        $products = DB::table('product')->get();
        foreach ($products as $product)
        {
            DB::table('product')->where('classify_id',$id)->update([
                'classify_id' => 0,
            ]);
        }
        $result = 'Xóa thành công' ;
        $datas = DB::table('classify')->paginate(5);

        return view('admin.list_classify',compact('result','datas'));
    }
}
