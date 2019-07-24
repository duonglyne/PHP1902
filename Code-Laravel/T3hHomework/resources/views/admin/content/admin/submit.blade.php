@extends('admin.layouts.glance')

@section('title')
    Thêm tài khoản admin
@endsection

@section('content')
    <h3>Thêm mới thẻ</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/users-admin')}}" class="btn btn-success">Quản lý tài khoản admin</a>
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
                <form name="category" action="{{route('add-users-admin-post')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tên tài khoản</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control1" id="focusedinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" value="{{old('email')}}" class="form-control1" id="focusedinput" >
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
