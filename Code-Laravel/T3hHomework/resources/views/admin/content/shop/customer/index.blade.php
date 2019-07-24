@extends('admin.layouts.glance')

@section('title')
    Quản trị khách hàng
@endsection

@section('content')
    <h3>Quản lý tài khoản khách hàng</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-customer')}}" class="btn btn-success">Thêm tài khoản mới</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($customers)}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($customers as $customer)
                    <tr>
                        <th scope="row">{{$customer->id}}</th>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/shop/customer/'.$customer->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/shop/customer/'.$customer->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$customers->links()}}
            </div>

        </div>
    </div>
@endsection
