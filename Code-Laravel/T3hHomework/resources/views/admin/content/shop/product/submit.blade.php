@extends('admin.layouts.glance')

@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')
    <h3>Thêm mới sản phẩm</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{url('admin/shop/product')}}" class="btn btn-success">Quản lý sản phẩm</a>
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
                <form name="category" action="{{route('add-product-post')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tên sản phẩm</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control1" id="focusedinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileinput" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" value="{{old('slug')}}" class="form-control1" id="fileinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoryinput" class="col-sm-2 control-label">Danh mục</label>
                        <div class="col-sm-8">
                            <select name="cat_id" id="">
                                <option value="0">Không có danh mục nào</option>
                                @foreach($cats as $cat)
                                    <option <?php echo(old('cat_id') == $cat->id)? "selected" : ""?> value="{{$cat->id}}">{{$cat->name}}</option>
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
                            <a class="btn btn-warning remove-image">
                           <i class="fa fa-remove"></i> Xóa
                         </a>
                       </span>
                            <input id="thumbnail1" type="text" name="images[]" value="{{ old('images') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Thêm ảnh</label>
                        <div class="col-sm-8">
                            <a id="plus-image" class="btn btn-success">
                                <i class="fa fa-plus"></i> Thêm
                            </a></div>
                    </div>
                    <div class="form-group">
                        <label for="shipinput" class="col-sm-2 control-label">Thông tin vận chuyển</label>
                        <div class="col-sm-8">
                            <input type="text" name="ship_info" value="{{ old('ship_info') }}" class="form-control1" id="shipinput" placeholder="Default Input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Mô tả ngắn</label>
                        <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4" class="mytinymce form-control1">{{old('intro')}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea2" class="col-sm-2 control-label">Mô tả</label>
                        <div class="col-sm-8"><textarea name="desc" id="txtarea2" cols="50" rows="4" class="mytinymce form-control1">{{old('desc')}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="priceCoreinput" class="col-sm-2 control-label">Giá niêm yết</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" value="{{old('priceCore')}}" name="priceCore" class="" id="priceCoreinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priceSaleinput" class="col-sm-2 control-label">Giá bán</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" value="{{old('priceSale')}}" name="priceSale" class="" id="priceSaleinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stockinput" class="col-sm-2 control-label">Tồn kho</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" value="{{old('stock')}}" name="stock" class="" id="stockinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Thông tin bổ sung</label>
                        <div class="col-sm-8">
                            <textarea name="additional_information" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ old('additional_information') }}</textarea></div>
                    </div>

                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Đánh giá</label>
                        <div class="col-sm-8">
                            <textarea name="review" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ old('review') }}</textarea></div>
                    </div>

                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Trợ giúp</label>
                        <div class="col-sm-8">
                            <textarea name="help" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ old('help') }}</textarea></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
