@extends('admin.layouts.glance')

@section('title')
    Xóa thẻ
@endsection

@section('content')
    <h3>Xóa trang {{$tag->id.' : '.$tag->name}}</h3>

    <div class="container ">
        <div class="row">
            <div class="">
                <form name="category" action="{{url('admin/content/tag/'.$tag->id.'/destroy')}}" method="post" class="">
                    @csrf
                    <div class="">
                        <button type="submit" class="btn btn-primary ">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/content/tag')}}" class="btn btn-success">Quản lý thẻ</a>
    </div>

@endsection
