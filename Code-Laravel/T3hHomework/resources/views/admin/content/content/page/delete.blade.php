@extends('admin.layouts.glance')

@section('title')
    Xóa trang
@endsection

@section('content')
    <h3>Xóa trang {{$page->id.' : '.$page->name}}</h3>

    <div class="container ">
        <div class="row">
            <div class="">
                <form name="category" action="{{url('admin/content/page/'.$page->id.'/destroy')}}" method="post" class="">
                    @csrf
                    <div class="">
                        <button type="submit" class="btn btn-primary ">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/content/page')}}" class="btn btn-success">Quản lý trang</a>
    </div>

@endsection
