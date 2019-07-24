@extends('admin.layouts.glance')

@section('title')
    Quản lý tài khoản admin
@endsection

@section('content')
    <h3>Quản lý tài khoản admin</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-users-admin')}}" class="btn btn-success">Thêm tài khoản mới</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($admins)}}</h4>
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

                @foreach($admins as $admin)
                    <tr>
                        <th scope="row">{{$admin->id}}</th>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/users-admin/'.$admin->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/users-admin/'.$admin->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$admins->links()}}
            </div>

        </div>
    </div>
@endsection
