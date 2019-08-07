
@extends('admin.layouts.glance')

@section('title')
    Sửa bài viết
@endsection

@section('content')
    <h3>Sửa bài viết {{$post->id.' : '.$post->name}}</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/content/post')}}" class="btn btn-success">Quản lý bài viết</a>
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
                        <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                        <div class="col-sm-8">
                        <span class="input-group-btn">
                         <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="lfm-btn btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>
                            <input id="thumbnail1" type="text" name="images" value="{{ $post->images }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                            <img id="holder1" src="{{ asset($post->images) }}" style="margin-top:15px;max-height:100px;">
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

