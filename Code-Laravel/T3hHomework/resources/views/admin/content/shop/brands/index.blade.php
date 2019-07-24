@extends('admin.layouts.glance')

@section('title')
    Quản trị nhãn hiệu
@endsection

@section('content')
    <h3>Quản lý nhãn hiệu</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('add-brand')}}" class="btn btn-success">Thêm nhãn hiệu</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số: {{count($brands)}}</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên nhãn hiệu</th>
                    <th>Link</th>
                    <th>Ảnh</th>
                    <th>Mô tả ngắn</th>
                    <th>Mô tả</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{$brand->id}}</th>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->link}}</td>
                        <td><img src="{{$brand->images}}" alt=""></td>
                        <td>{{$brand->intro}}</td>
                        <td>{{$brand->desc}}</td>
                        <td><a class="btn btn-warning" href="{{url('/admin/shop/brand/'.$brand->id.'/edit')}}">Sửa</a>
                            <a class="btn btn-danger" href="{{url('/admin/shop/brand/'.$brand->id.'/delete')}}">Xóa</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div class="text-center">
                {{$brands->links()}}
            </div>

        </div>
    </div>

@endsection
