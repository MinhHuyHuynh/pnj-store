@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa đơn hàng</h1>
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

                    <form action="{{route('order.edit',['id'=>$data->id])}}" method="post">{{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>ID đơn hàng :</label> {{$data->id}}
{{--                                <input type="text" class="form-control" name="name" placeholder="Nhập tên phân loại hàng">--}}
                            </div>
                            <div class="form-group">
                                <label>Tên người đặt :</label> {{$data->name_customer}}
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại người đặt :</label> {{$data->phone_customer}}
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ người đặt :</label> {{$data->address_customer}}
                            </div>
                            <div class="form-group">
                                <label>Ngày đặt :</label> {{$data->created_at}}
                            </div>
                            <div class="form-group">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $key => $item)
                                        <tr>
                                            <td>
                                                @foreach($products as $product)
                                                    @if($key==$product->id)
                                                        {{$product->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{$item}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tổng tiền</th>
                                            <th>{{$data->total}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái đơn hàng :</label>
                            </div>
                            <select class="form-control" name="status">
                                <option value="0" {{$data->status==0 ? 'selected' : ''}}>Đợi xác nhận</option>
                                <option value="1" {{$data->status==1 ? 'selected' : ''}}>Đã xác nhận</option>
                                <option value="2" {{$data->status==2 ? 'selected' : ''}}>Đang vận chuyển</option>
                                <option value="3" {{$data->status==3 ? 'selected' : ''}}>Hoàn tất</option>
                            </select>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection








