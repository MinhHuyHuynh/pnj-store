@extends('pnj.layout')
@section('content')
    <div class="container">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{asset('pnj/images/home/'.$datas->image)}}" alt=""/>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{$datas->name}}</h2>
                    <span>
                        <span>{{$datas->price}}</span>
                        <button type="button" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </span>
                    <p><b>Phân loại :</b>
                        @foreach($classify_menus as $classify_menu)
                            @if($datas->classify_id==$classify_menu->id)
                                {{$classify_menu->name}}
                            @endif
                        @endforeach</p>
                    <p><b>Mô tả : </b>{{$datas->describe}}</p>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="reviews">
                    <div class="col-sm-12">
                        @foreach($comments as $comment)
                        <ul>
                            <li><a href=""><i class="fa fa-clock-o"></i>{{$comment->created_at}}</a></li>
                            <li><a href=""><i class="fa fa-user"></i>{{$comment->name}}</a></li>
                            <li><a href=""><i class="fa fa-email"></i>{{$comment->email}}</a></li>
                        </ul>
                        <p>{{$comment->content}}</p>
                        @endforeach
                        <p><b>Viết bình luận về sản phẩm </b></p>
                        <form action="{{route('comment.store')}}" method="post">
                            {{csrf_field()}}
                            <span>
                                <input type="text" name="name" placeholder="Nhập tên" required/>
                                <input type="email" name="email" placeholder="Nhập email" required/>
                                <input type="hidden" name="id_product" value="{{$datas->id}}" required/>
                            </span>
                            <textarea name="body" placeholder="Nhập bình luận"></textarea>
                            <button type="submit" class="btn btn-default pull-right">
                                Bình luận
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
    <div>
@endsection