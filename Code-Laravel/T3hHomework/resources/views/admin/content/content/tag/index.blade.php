@extends('admin.layouts.glance')

@section('title')
    Quản lý thẻ
@endsection

@section('content')
    <h3>Quản lý thẻ</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-content-tag')}}" class="btn btn-success">Thêm thẻ</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($tags)}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên thẻ</th>
                    <th>Slug</th>
                    <th>Tác giả</th>
                    <th>Ảnh</th>
                    <th>Số lượt xem</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>{{$tag->author_id}}</td>
                        <td><img src="{{$tag->images}}" alt=""></td>
                        <td>{{$tag->view}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/content/tag/'.$tag->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/content/tag/'.$tag->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$tags->links()}}
            </div>

        </div>
    </div>
@endsection
