@extends('admin.layouts.glance')

@section('title')
    Quản lý menu
@endsection

@section('content')
    <h3>Quản lý menu</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-menu')}}" class="btn btn-success">Thêm menu</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($menus)}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên thẻ</th>
                    <th>Slug</th>
                    <th>Mô tả</th>
                    <th>Vị trí</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($menus as $menu)
                    <tr>
                        <th scope="row">{{$menu->id}}</th>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->slug}}</td>
                        <td>{{$menu->desc}}</td>
                        <td>{{$menu->location}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/menu/'.$menu->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/menu/'.$menu->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$menus->links()}}
            </div>

        </div>
    </div>
@endsection
