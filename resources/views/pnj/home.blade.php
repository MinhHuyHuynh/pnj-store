@extends('pnj.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="brands_products"><!--brands_products-->
                        <h2>Phân loại</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($classify_menus as $classify_menu)
                                <li><a href="{{route('pnj.show.classify',['slug_classify'=>$classify_menu->id])}}">{{$classify_menu->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản phẩm</h2>
                    @foreach($datas as $data)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('pnj/images/home/'.$data->image)}}" alt="" />
                                    <h2>{{$data->price}} VND</h2>
                                    <p>{{$data->name}}</p>
                                </div>

                                <a href="{{route('pnj.show.product',['id_product'=>$data->id])}}">
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{$data->price}} VND</h2>
                                            <p>{{$data->name}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                                <button type="button" onclick="addItem({{$data->id}})" class=" btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng của bạn . . . .</button>
                        </div>
                    </div>
                    @endforeach
                </div><!--features_items-->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        function addItem(id)
        {
            $.ajax({
                url : "/add-cart",
                type : "post",
                dataType: "json",
                data : {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success : function (result){
                    alert(result.message);
                }
            });
        }
    </script>
@endpush