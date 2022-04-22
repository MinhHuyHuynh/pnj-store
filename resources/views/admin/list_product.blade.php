@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Trang chủ</th>
                                        <th>Giá</th>
                                        <th>Thuộc</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td style="max-width:200px;" ><img style="display: block; max-width: 100%;" src="{{asset('pnj/images/home/'.$data->image)}}"></td>
                                        <td>{{$data->describe}}</td>
                                        <td>{{$data->home==1 ? 'có' : 'không'}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>
                                            @if($data->classify_id==0)
                                                Chưa có phân loại
                                            @else
                                                @foreach($datas2 as $data2)
                                                    @if($data->classify_id==$data2->id)
                                                        {{$data2->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td><div>
                                                <a href="{{route('product.show',['id'=>$data->id])}}" class="btn btn-primary">Sửa</a>
                                                <a href="{{route('product.destroy',['id'=>$data->id])}}" class="btn btn-danger">Xóa</a>
                                            </div></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                {{$datas->links('pagination::bootstrap-4')}}
                            </ul>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection