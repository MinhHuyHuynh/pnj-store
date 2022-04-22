@extends('pnj.layout')
@section('content')
<div class="container">
	<div class="table-responsive cart_info">
		<form action="{{route('order.update.item')}}" method="post">{{ csrf_field() }}
		<table class="table table-condensed">
			<thead>
			<tr class="cart_menu">
				<td class="image">Món</td>
				<td class="description">Tên</td>
				<td class="price">Giá</td>
				<td class="quantity">Số lượng</td>
				<td></td>
			</tr>
			</thead>
			<tbody>
			@if (is_array($carts) || is_object($carts))
			@foreach($carts as $cart)
			<tr>
				<td class="cart_product" style="max-width:200px;">
					<a href=""><img  style="display: block; max-width: 50%;" src="{{asset('pnj/images/home/'.$cart['image'])}}" alt=""></a>
				</td>
				<td class="cart_description">
					<h4>{{$cart['name']}}</h4>
				</td>
				<td class="cart_price">
					<p>{{$cart['price']}}</p>
				</td>
				<td class="cart_quantity">
					<div class="cart_quantity_button">
						<input name="{{$cart['id']}}" class="cart_quantity_input" type="number" name="quantity" value="{{$cart['quantity']}}" size="2">
					</div>
				</td>
				<td>
					<a href="{{route('order.del.item',['id'=>$cart['id']])}}" class="btn btn-warning">xóa</a>
				</td>
			</tr>
			@endforeach
			@endif
			</tbody>
		</table>
		<button type="submit" class="btn btn-default update" >Cập nhật</button>
		</form>
	</div>
</div>

<div class="container">
	<div class="total_area">
		<form action="{{route('order.store')}}" method="post">{{ csrf_field() }}
		<ul>
			<li>Số lượng <span>{{$quantity}}</span></li>
			<li>Tổng tiền <span>{{$total}}</span></li>
			<li>Phương thức thanh toán <span>
					<select name="pay">
						<option value="1">Tiền mặt</option>
						<option value="0">Tiền thẻ</option>
					</select>
				</span></li>
			<li>Thông tin thanh toán ngân hàng <span>020562652005 Sacombank . . . </span></li>
			<li>Tên người nhận <input class="form-control" type="text" name="name_customer" required></li>
			<li>Số điện thoại người nhận <input class="form-control" type="number" name="phone_customer" required ></li>
			<li>Địa chỉ nhận <input class="form-control" type="text" name="address_customer" required></li>
			<input type="hidden" name ="item" value="{{$str_data}}">
			<input type="hidden" name ="total" value="{{$total}}">
		</ul>
			<button type="submit" class="btn btn-default update " href="">Đặt hàng</button>
		</form>

	</div>
</div>



@endsection