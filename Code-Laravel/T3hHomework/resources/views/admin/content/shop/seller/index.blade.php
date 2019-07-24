@extends('admin.layouts.glance')

@section('title')
    Quản trị nhà cung cấp
@endsection

@section('content')
    <h3>Quản lý tài khoản nhà cung cấp</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-seller')}}" class="btn btn-success">Thêm tài khoản mới</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($sellers)}}</h4>
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

                @foreach($sellers as $seller)
                    <tr>
                        <th scope="row">{{$seller->id}}</th>
                        <td>{{$seller->name}}</td>
                        <td>{{$seller->email}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/shop/seller/'.$seller->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/shop/seller/'.$seller->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$sellers->links()}}
            </div>

        </div>
    </div>
@endsection
