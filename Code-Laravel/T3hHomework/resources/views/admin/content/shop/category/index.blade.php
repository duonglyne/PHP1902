@extends('admin.layouts.glance')

@section('title')
    Quản trị danh mục sản phẩm
@endsection

@section('content')
<h3>Quản lý danh mục sản phẩm</h3>
<div class="" style="margin: 20px 0">
    <a href="{{route('add-category')}}" class="btn btn-success">Thêm danh mục</a>
</div>
 <div class="tables">
     <div class="table-responsive bs-example widget-shadow">
         <h4>Tổng số: {{count($cats)}}</h4>
         <table class="table table-bordered">
             <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
             </thead>
             <tbody>

             @foreach($cats as $cat)
                <tr>
                    <th scope="row">{{$cat->id}}</th>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->slug}}</td>
                    <td><img src="{{ asset($cat->images) }}" style="margin-top:15px;max-height:100px;"></td>
                    <td><a class="btn btn-warning" href="{{url('/admin/shop/category/'.$cat->id.'/edit')}}">Sửa</a>
                        <a class="btn btn-danger" href="{{url('/admin/shop/category/'.$cat->id.'/delete')}}">Xóa</a>
                    </td>
                </tr>
             </tbody>
             @endforeach
         </table>
         <div class="text-center">
             {{$cats->links()}}
         </div>

     </div>
 </div>
@endsection
