@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách đơn hàng</h1>
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
                                        <th>Danh sách món</th>
                                        <th>Tổng tiền</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ </th>
                                        <th>Trạng thái </th>
                                        <th>Ngày đặt</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $key => $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>
                                                @foreach($item_list as $key2 => $item)
                                                    @if($key2==$data->id)
                                                        @foreach($item as $i)
                                                                <p>{{$i}}</p>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$data->total}}</td>
                                            <td>{{$data->name_customer}}</td>
                                            <td>{{$data->phone_customer}}</td>
                                            <td>{{$data->address_customer}}</td>
                                            <td>
                                                @if($data->status==0)Đợi xác nhận
                                                @elseif($data->status==1)Đã xác nhận
                                                @elseif($data->status==2)Đang vận chuyển
                                                @else Hoàn tất
                                                @endif
                                            </td>
                                            <td>{{$data->created_at}}</td>
                                            <td><div>
                                                    <a href="{{route('order.show',['id'=>$data->id])}}" class="btn btn-primary">Sửa</a>
                                                    <a href="{{route('order.destroy',['id'=>$data->id])}}" class="btn btn-danger">Xóa</a>
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