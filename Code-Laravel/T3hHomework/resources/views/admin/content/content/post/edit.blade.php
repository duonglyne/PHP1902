
@extends('admin.layouts.glance')

@section('title')
    Sửa bài viết
@endsection

@section('content')
    <h3>Sửa bài viết {{$post->id.' : '.$post->name}}</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{url('shop/product')}}" class="btn btn-success">Quản lý sản phẩm</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="form-three widget-shadow">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form name="category" action="{{url('admin/content/post/'.$post->id.'/update')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tên danh mục</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="{{$post->name}}" class="form-control1" id="focusedinput" placeholder="Tên danh mục">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileinput" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" value="{{$post->slug}}" class="form-control1" id="fileinput" placeholder="slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoryinput" class="col-sm-2 control-label">Danh mục</label>
                        <div class="col-sm-8">
                            <select name="cat_id" id="">
                                <option value="0">Không có danh mục nào</option>
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}" {{($post->cat_id == $cat->id)? "selected" : ""}}>{{$cat->name}}</option>
                                @endforeach
                            </select>
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
                        <div class="col-sm-8"><textarea name="intro"  id="txtarea1" cols="50" rows="4" class="form-control1">{{$post->intro}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea2" class="col-sm-2 control-label">Mô tả</label>
                        <div class="col-sm-8"><textarea name="desc" id="txtarea2" cols="50" rows="4" class="form-control1">{{$post->desc}}</textarea></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

