@extends('admin.layouts.glance')

@section('title')
    Thêm mới menu
@endsection

@section('content')
    <h3>Thêm mới menu</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/menu')}}" class="btn btn-success">Quản lý menu</a>
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
                <form name="category" action="{{route('add-menu-post')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tên bài viết</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control1" id="focusedinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileinput" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" value="{{old('slug')}}" class="form-control1" id="sluginput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                        <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1">{{old('desc')}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Vị trí</label>
                        <div class="col-sm-8">
                            <input type="text" name="location" value="{{old('location')}}" class="form-control1" id="locationinput" >
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
