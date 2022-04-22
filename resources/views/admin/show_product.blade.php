@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm sản phẩm</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$result ?? ''}}</h3>
                    </div>

                    <form action="{{route('product.edit',['id'=>$datas->id])}}" method="post" enctype="multipart/form-data">{{csrf_field()}}

                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="nhập tên sản phẩm" value="{{$datas->name}}" required>
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" class="form-control" name="price" placeholder="nhập giá sản phẩm" value="{{$datas->price}}" required>
                            </div>
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <input type="text" class="form-control" name="describe" placeholder="nhập mô tả sản phẩm" value="{{$datas->describe}}" required>
                            </div>
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control" name="classify_id" required>
                                    @foreach($datas2 as $data2)
                                        @if($data2->id==$datas->classify_id)
                                        <option value="{{$data2->id}}">{{$data2->name}}</option>
                                        @else
                                        <option value="{{$data2->id}}">{{$data2->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <div class="input-group">
                                    <input type="file" name="image">
                                </div>
                                <img style="display: block;max-width:200px;" src="{{asset('pnj/images/home/'.$datas->image)}}">
                                <input type="hidden" name="image_old" value="{{$datas->image}}">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" {{$datas->home==1 ?? 'checked'}}" name="home" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Hiển thị trang chủ</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection








