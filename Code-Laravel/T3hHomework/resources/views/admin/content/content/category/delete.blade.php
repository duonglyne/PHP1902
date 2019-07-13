@extends('admin.layouts.glance')

@section('title')
    Xóa danh mục bài viết
@endsection

@section('content')
    <h3>Xóa danh mục bài viết {{$cats->id.' : '.$cats->name}}</h3>

    <div class="container ">
        <div class="row">
            <div class="">
                <form name="category" action="{{url('admin/content/category/'.$cats->id.'/destroy')}}" method="post" class="">
                    @csrf
                    <div class="">
                        <button type="submit" class="btn btn-primary ">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="margin: 20px 0">
        <a href="{{route('category.index')}}" class="btn btn-success">Quản lý danh mục</a>
    </div>

@endsection
