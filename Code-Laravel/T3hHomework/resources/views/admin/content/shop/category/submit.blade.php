@extends('admin.layouts.glance')

@section('title')
    Thêm mới danh mục
@endsection

@section('content')
<h3>Thêm mới danh mục sản phẩm</h3>
<div class="" style="margin: 20px 0">
    <a href="{{route('category.index')}}" class="btn btn-success">Quản lý danh mục</a>
</div>
<div class="container">
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="category" action="{{route('add-category-post')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên danh mục</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" placeholder="Tên danh mục">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fileinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1" id="fileinput" placeholder="slug">
                    </div>
                </div>
                <div class="form-group">
                    <label for="imageinput" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" name="images" class="" id="imageinput" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea2" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea2" cols="50" rows="4" class="form-control1"></textarea></div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
