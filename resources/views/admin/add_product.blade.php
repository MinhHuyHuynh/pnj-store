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

                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}

                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="nhập tên sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" class="form-control" name="price" placeholder="nhập giá sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <input type="text" class="form-control" name="describe" placeholder="nhập mô tả sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control" name="classify_id" required>
                                    @foreach($datas as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <div class="input-group">
                                    <input type="file" name="image" required>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" name="home" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Hiển thị trang chủ</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection








