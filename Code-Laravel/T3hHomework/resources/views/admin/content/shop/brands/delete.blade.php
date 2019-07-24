@extends('admin.layouts.glance')

@section('title')
    Quản trị nhãn hiệu
@endsection

@section('content')
    <h3>Xóa nhãn hiệu {{$brands->id.' : '.$brands->name}}</h3>

    <div class="container ">
        <div class="row">
            <div class="">
                <form name="brand" action="{{url('admin/shop/brand/'.$brands->id.'/destroy')}}" method="post" class="">
                    @csrf
                    <div class="">
                        <button type="submit" class="btn btn-primary ">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="margin: 20px 0">
        <a href="{{route('brand-index')}}" class="btn btn-success">Quản lý danh mục</a>
    </div>

@endsection
