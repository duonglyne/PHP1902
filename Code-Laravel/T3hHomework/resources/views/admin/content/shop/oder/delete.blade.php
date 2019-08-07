@extends('admin.layouts.glance')

@section('title')
    Quản trị đơn hàng
@endsection

@section('content')
    <h1> Xóa đơn hàng {{ $order->id . ' : ' .$order->name }}</h1>

    <div class="row">
        <div class="form-three widget-shadow">
            <form name="page" action="{{ url('admin/shop/oder/'.$order->id.'/destroy') }}" method="post" class="form-horizontal">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
