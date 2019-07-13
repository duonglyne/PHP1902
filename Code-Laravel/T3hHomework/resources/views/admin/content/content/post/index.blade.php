@extends('admin.layouts.glance')

@section('title')
    Quản lý bài viết
@endsection

@section('content')
    <h3>Quản lý bài viết</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-content-post')}}" class="btn btn-success">Thêm bài viết</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($cats)}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên bài viết</th>
                    <th>Tác giả</th>
                    <th>Slug</th>
                    <th>Ảnh</th>
                    <th>Mô tả ngắn</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Số lượt xem</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->name}}</td>
                        <td>{{$post->author_id}}</td>
                        <td>{{$post->slug}}</td>
                        <td><img src="{{$post->images}}" alt=""></td>
                        <td>{{$post->intro}}</td>
                        <td>{{$post->desc}}</td>
                        <td>
                            @foreach($cats as $cat)
                                @if($post->cat_id == $cat->id)
                                    {{$cat->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$post->view}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/content/post/'.$post->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/content/post/'.$post->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$posts->links()}}
            </div>

        </div>
    </div>
@endsection
