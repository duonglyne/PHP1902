
@extends('admin.layouts.glance')

@section('title')
    Sửa menu item
@endsection

@section('content')
    <h3>Sửa menu {{$menuItem->id.' : '.$menuItem->name}}</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/menu-item')}}" class="btn btn-success">Quản lý menu item</a>
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
                <form name="category" action="{{url('admin/menu-item/'.$menuItem->id.'/update')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tên</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="{{$menuItem->name}}" class="form-control1" id="focusedinput" placeholder="Tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menuinput" class="col-sm-2 control-label">Kiểu menu</label>
                        <div class="col-sm-8">
                            <select name="type" id="menuinput">
                                @foreach($types as $type_id => $type)
                                    <option {{(($menuItem->type) == $type_id)? "selected" : ""}} value="{{$type_id}}">-{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="loactioninput" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-8">
                            <input type="text" name="link" class="form-control1" value="{{$menuItem->link}}" class="" id="locationinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="iconinput" class="col-sm-2 control-label">Icon</label>
                        <div class="col-sm-8">
                            <input type="text" name="link" value="{{$menuItem->icon}}" class="form-control1" id="iconinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parentinput" class="col-sm-2 control-label">Cha</label>
                        <div class="col-sm-8">
                            <select name="parent_id" id="parentinput">
                                <option value="0">Mặc định</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menuidinput" class="col-sm-2 control-label">Thuộc menu</label>
                        <div class="col-sm-8">
                            <select name="menu_id" id="menuidinput">
                                @foreach($menus as $menu)
                                    <option {{(($menuItem->menu_id) == $menu->id)? "selected" : ""}} value="{{$menu->id}}">-{{$menu->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                        <div class="col-sm-8"><textarea name="desc"  id="txtarea1" cols="50" rows="4" class="form-control1">{{$menuItem->desc}}</textarea></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

