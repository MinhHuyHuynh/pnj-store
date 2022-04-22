@extends('pnj.layout')
@section('content')
    <div class="container">
         <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Items</h2>
                    @foreach($datas as $data)
                    <div class="col-sm-4">

                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <a href="{{route('pnj.show.product',['id_product'=>$data->id])}}">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('pnj/images/home/'.$data->image)}}" alt="" />
                                        <h2>{{$data->price}}</h2>
                                        <p>{{$data->name}}</p>
                                    </div>
                                </a>
                                <div class="productinfo text-center">
                                    <button type="button"  onclick="addItem({{$data->id}})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                     <ul class="pagination">
                         {{$datas->links('pagination::bootstrap-4')}}
                     </ul>
                </div><!--features_items-->
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