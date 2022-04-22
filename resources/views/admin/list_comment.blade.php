@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách bình luận</h1>
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
                                        <th>Nội dung</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Của sản phẩm</th>
                                        <th>Ngày viết</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->content}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>
                                                @foreach($products as $product)
                                                    @if($product->id==$data->id_product)
                                                        {{$product->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$data->created_at}}</td>
                                            <td><div>
                                                    <a href="{{route('comment.destroy',['id'=>$data->id])}}" class="btn btn-danger">Xóa</a>
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