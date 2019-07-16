@extends('admin.layouts.glance')

@section('title')
    Quản lý trang
@endsection

@section('content')
    <h3>Quản lý trang</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-content-page')}}" class="btn btn-success">Thêm trang</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($pages)}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên bài viết</th>
                    <th>Tác giả</th>
                    <th>Ảnh</th>
                    <th>Số lượt xem</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pages as $page)
                    <tr>
                        <th scope="row">{{$page->id}}</th>
                        <td>{{$page->name}}</td>
                        <td>{{$page->author_id}}</td>
                        <td><img src="{{$page->images}}" alt=""></td>
                        <td>{{$page->view}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/content/page/'.$page->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/content/page/'.$page->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$pages->links()}}
            </div>

        </div>
    </div>
@endsection
