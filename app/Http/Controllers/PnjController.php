<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PnjController extends Controller
{
    public function index()
    {
        $datas = DB::table('product')->where('home',1)->orderBy('id', 'DESC')->get();
        $classify_menus = DB::table('classify')->get();
        return view('pnj.home',compact(['datas','classify_menus']));
    }
    public function showClassify(Request $request)
    {
        $datas = DB::table('product')->where('classify_id',$request->slug_classify)->paginate(6);
        $classify_menus = DB::table('classify')->get();
        return view('pnj.classify',compact(['datas','classify_menus']));
    }
    public function showProduct(Request $request)
    {
        $datas = DB::table('product')->where('id',$request->id_product)->first();
        $classify_menus = DB::table('classify')->get();
        $comments = DB::table('comment')->where('id_product',$request->id_product)->get();
        return view('pnj.product',compact(['datas','classify_menus','comments']));
    }
    public function showOrder()
    {
        $carts = unserialize(Cookie::get('item'));
        $classify_menus = DB::table('classify')->get();
        $total=0;
        $quantity=0;
        $data_item=[];
        foreach ($carts as $cart)
        {
            $data_item[$cart['id']]=$cart['quantity'];
            $quantity += $cart['quantity'];
            $total += $cart['price'] * $cart['quantity'];
        }

        $str_data = json_encode($data_item);
        dd(1);
        return view('pnj.order',compact(['classify_menus','carts','total','quantity','str_data']));
    }
}
