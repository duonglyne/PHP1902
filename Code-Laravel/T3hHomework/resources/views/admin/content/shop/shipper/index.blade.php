@extends('admin.layouts.glance')

@section('title')
    Quản trị nhà vận chuyển
@endsection

@section('content')
    <h3>Quản lý tài khoản nhà vận chuyển</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-shipper')}}" class="btn btn-success">Thêm tài khoản mới</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($shippers)}}</h4>
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

                @foreach($shippers as $shipper)
                    <tr>
                        <th scope="row">{{$shipper->id}}</th>
                        <td>{{$shipper->name}}</td>
                        <td>{{$shipper->email}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/shop/shipper/'.$shipper->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/shop/shipper/'.$shipper->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$shippers->links()}}
            </div>

        </div>
    </div>
@endsection
