<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $datas = DB::table('product')->orderBy('id', 'DESC')->paginate(4);
        $datas2 = DB::table('classify')->get();
        return view ('admin.list_product', compact(['datas','datas2']));
    }


    public function create()
    {

        $datas = DB::table('classify')->get();
        return view('admin.add_product',compact(['datas']));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        DB::table('product')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'classify_id' => $request->classify_id,
            'describe' => $request->describe,
            'home' => $request->home,
            'image' => $image->getClientOriginalName()
        ]);

        $storedPath = $image->move('pnj/images/home', $image->getClientOriginalName());
        $result = 'Thêm thành công' ;
        $datas = DB::table('classify')->get();
        return view('admin.add_product',compact(['result','datas']));
    }

    public function show($id)
    {
        $datas = DB::table('product')->where('id',$id)->first();
        $datas2 = DB::table('classify')->get();
        return view ('admin.show_product', compact(['datas','datas2']));
    }

    public function edit($id,Request $request)
    {

        DB::table('product')->where('id',$id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'classify_id' => $request->classify_id,
            'describe' => $request->describe,
            'home' => $request->home,
        ]);
        $image = $request->file('image');
        if($image)
        {
            $image->move('pnj/images/home', $image->getClientOriginalName());
            DB::table('product')->where('id',$id)->update([
                'image' => $image->getClientOriginalName(),
            ]);
            $file_path = public_path().'/pnj/images/home/'.$request->image_old;
            unlink($file_path);
        }
        return redirect()->route('product.index');
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $product = DB::table('product')->where('id',$id)->first();
        $file_path = public_path().'/pnj/images/home/'.$product->image;
        unlink($file_path);
        DB::table('product')->where('id',$id)->delete();
        return redirect()->route('product.index');
    }

}
