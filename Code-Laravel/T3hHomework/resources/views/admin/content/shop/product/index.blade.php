@extends('admin.layouts.glance')

@section('title')
    Quản trị sản phẩm
@endsection

@section('content')
    <h3>Quản lý sản phẩm</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-product')}}" class="btn btn-success">Thêm sản phẩm</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số:</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Slug</th>
                    <th>Ảnh</th>
                    <th>Mô tả ngắn</th>
                    <th>Mô tả</th>
                    <th>Giá cũ</th>
                    <th>Giá sale</th>
                    <th>Hàng tồn</th>
                    <th>Danh mục</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->slug}}</td>
                        <td><img src="{{$product->images}}" alt=""></td>
                        <td>{{$product->intro}}</td>
                        <td>{{$product->desc}}</td>
                        <td>{{$product->priceCore}}</td>
                        <td>{{$product->priceSale}}</td>
                        <td>{{$product->stock}}</td>

                        <td>
                            @foreach($cats as $cat)
                                @if($product->cat_id == $cat->id)
                                    {{$cat->name}}
                                @endif
                            @endforeach
                        </td>

                        <td><a class="btn btn-warning" href="{{url('/admin/shop/product/'.$product->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/shop/product/'.$product->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$products->links()}}
            </div>

        </div>
    </div>
@endsection
