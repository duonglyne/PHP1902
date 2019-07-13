@extends('admin.layouts.glance')

@section('title')
    Xóa bài viết
@endsection

@section('content')
    <h3>Xóa bài viết {{$post->id.' : '.$post->name}}</h3>

    <div class="container ">
        <div class="row">
            <div class="">
                <form name="category" action="{{url('admin/content/post/'.$post->id.'/destroy')}}" method="post" class="">
                    @csrf
                    <div class="">
                        <button type="submit" class="btn btn-primary ">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="margin: 20px 0">
        <a href="{{url('content/post')}}" class="btn btn-success">Quản lý sản phẩm</a>
    </div>

@endsection
