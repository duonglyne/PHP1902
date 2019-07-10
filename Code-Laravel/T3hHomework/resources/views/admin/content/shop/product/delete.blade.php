@extends('admin.layouts.glance')

@section('title')
    Xóa sản phẩm
@endsection

@section('content')
    <h3>Xóa danh mục sản phẩm {{$product->id.' : '.$product->name}}</h3>

    <div class="container ">
        <div class="row">
            <div class="">
                <form name="category" action="{{url('admin/shop/product/'.$product->id.'/destroy')}}" method="post" class="">
                    @csrf
                    <div class="">
                        <button type="submit" class="btn btn-primary ">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="" style="margin: 20px 0">
        <a href="{{url('shop/product')}}" class="btn btn-success">Quản lý sản phẩm</a>
    </div>

@endsection
