<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $datas = DB::table('order')->paginate(5);
        $item_list = [];
        $products = DB::table('product')->get();
        foreach ($datas as $data) {
            $items = json_decode($data->item);
            foreach ($items as $key => $item) {
                foreach ($products as $product) {
                    if ($key == $product->id) {
                        $item_list[$data->id][$key] = $product->name . ' : ' . $item;
                    }
                }

            }
        }
        return view('admin.list_order', compact(['datas', 'item_list']));
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

        DB::table('order')->insert([
            [
                'item' => $request->item,
                'total' => $request->total,
                'pay' => $request->pay,
                'created_at' => now(),
                'name_customer' => $request->name_customer,
                'phone_customer' => $request->phone_customer,
                'address_customer' => $request->address_customer,
            ],
        ]);
        $classify_menus = DB::table('classify')->get();
        $cart = [];
        Cookie::queue(Cookie::make('item', serialize($cart), 1440));
        return view('pnj.result-order', compact(['classify_menus']));

    }

    public function show($id)
    {
        $data = DB::table('order')->where('id', $id)->first();
        $products = DB::table('product')->get();
        $items = json_decode($data->item);

        return view('admin.show_order', compact(['data','products' ,'items']));
    }


    public function edit($id,Request $request)
    {
        DB::table('order')->where('id',$id)->update(['status' => $request->status]);
        return redirect('admin/order');
    }

    public function destroy($id)
    {
        DB::table('order')->where('id',$id)->delete();
        return redirect('admin/order');
    }

    public function addCart(Request $request)
    {
        $product = DB::table('product')->where("id", $request->id)->first();
        if (Cookie::has('item')) {
            $found = in_array($request->id, array_column(unserialize(Cookie::get('item')), 'id'));
            if ($found) {
                $cart = unserialize(Cookie::get('item'));
                $key = array_search($request->id, array_column($cart, 'id'));
                $cart[$key]['quantity'] += 1;
                Cookie::queue(Cookie::make('item', serialize($cart), 1440));
                return response()->json(['message' => 'thêm thành công']);
            }
            $cart = unserialize(Cookie::get('item'));
        }
        $cart[] = ['id' => $request->id, 'name' => $product->name, 'price' => $product->price, 'quantity' => 1, 'image' => $product->image];
        //Khởi tạo giỏ hàng bằng cookie
        Cookie::queue(Cookie::make('item', serialize($cart), 1440));
        return response()->json(['message' => 'thêm thành công']);
    }

    public function delItem(Request $request)
    {
        $cart = unserialize(Cookie::get('item'));
        $key = array_search($request->id, array_column($cart, 'id'));
        unset($cart[$key]);
        $cart = array_values(($cart));
        Cookie::queue(Cookie::make('item', serialize($cart), 1440));
        return back();
    }

    public function updateItem(Request $request)
    {
        $dt = $request->all();
        unset($dt['_token']);
        $cart = unserialize(Cookie::get('item'));
        $i = 0;
        foreach ($dt as $key => $r) {
            $key = array_search($key, array_column($cart, 'id'));
            $cart[$i]['quantity'] = $r;
            $i++;
        }
        Cookie::queue(Cookie::make('item', serialize($cart), 60));
        return redirect()->route('pnj.show.order');
    }
}
