@extends('admin.layouts.glance')

@section('title')
    Quản lý menu item
@endsection

@section('content')
    <h3>Quản lý menu item</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-menu-item')}}" class="btn btn-success">Thêm menu item</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($menuItems)}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Menu</th>
                    <th>Mô tả</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($menuItems as $menuItem)
                    <tr>
                        <th scope="row">{{$menuItem->id}}</th>
                        <td>{{$menuItem->name}}</td>
                        <td>{{$menuItem->menu_id}}</td>
                        <td>{{$menuItem->desc}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/menu-item/'.$menuItem->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/menu-item/'.$menuItem->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$menuItems->links()}}
            </div>

        </div>
    </div>
@endsection
