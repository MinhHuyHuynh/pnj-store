<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function index()
    {
        $datas = DB::table('comment')->paginate(5);
        $products = DB::table('product')->get();
        return view ('admin.list_comment',compact(['datas','products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        DB::table('comment')->insert([
            [
                'content' => $request -> body ,
                'name' => $request->name,
                'email' => $request->email,
                'created_at' => now(),
                'id_product' => $request->id_product,
            ],
        ]);
        $classify_menus = DB::table('classify')->get();
        return back()->with('classify_menus',$classify_menus);
    }

    public function destroy($id)
    {
        DB::table('comment')->where('id',$id)->delete();
        return redirect('admin/comment');
    }
}
