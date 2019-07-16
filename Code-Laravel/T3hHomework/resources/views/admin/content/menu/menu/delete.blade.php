@extends('admin.layouts.glance')

@section('title')
    Xóa menu
@endsection

@section('content')
    <h3>Xóa trang {{$menu->id.' : '.$menu->name}}</h3>

    <div class="container ">
        <div class="row">
            <div class="">
                <form name="category" action="{{url('admin/menu/'.$menu->id.'/destroy')}}" method="post" class="">
                    @csrf
                    <div class="">
                        <button type="submit" class="btn btn-primary ">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/menu')}}" class="btn btn-success">Quản lý menu</a>
    </div>

@endsection
