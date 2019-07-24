
@extends('admin.layouts.glance')

@section('title')
    Quản trị danh mục sản phẩm
@endsection

@section('content')
    <h3>Sửa danh mục sản phẩm {{$product->id.' : '.$product->name}}</h3>
    <div class="" style="margin: 20px 0">
        <a href="{{route('product-index')}}" class="btn btn-success">Quản lý sản phẩm</a>
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
                <form name="category" action="{{url('admin/shop/product/'.$product->id.'/update')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Tên danh mục</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" value="{{$product->name}}" class="form-control1" id="focusedinput" placeholder="Tên danh mục">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileinput" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" value="{{$product->slug}}" class="form-control1" id="fileinput" placeholder="slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoryinput" class="col-sm-2 control-label">Danh mục</label>
                        <div class="col-sm-8">
                            <select name="cat_id" id="">
                                <option value="0">Không có danh mục nào</option>
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}" <?php echo ($product->cat_id == $cat->id)? "selected" : "" ?>>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <?php
                    $images = $product->images ? json_decode($product->images) : array();
                    $i = 0;
                    ?>

                    @foreach($images as $image)
                        <?php $i++?>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                            <div class="col-sm-8">
                        <span class="input-group-btn">
                         <a id="lfm{{$i}}" data-input="thumbnail{{$i}}" data-preview="holder{{$i}}" class="lfm-btn btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                            <a class="btn btn-warning remove-image">
                           <i class="fa fa-remove"></i> Xóa
                         </a>
                       </span>
                                <input id="thumbnail{{$i}}" type="text" name="images[]" value="{{$image}}" class="form-control"  placeholder="Default Input">
                                <img id="holder{{$i}}" src="{{asset($image)}}" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        @endforeach


                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Thêm ảnh</label>
                        <div class="col-sm-8">
                            <a id="plus-image" class="btn btn-success">
                                <i class="fa fa-plus"></i> Thêm
                            </a></div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Mô tả ngắn</label>
                        <div class="col-sm-8"><textarea name="intro"  id="txtarea1" cols="50" rows="4" class="form-control1">{{$product->intro}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea2" class="col-sm-2 control-label">Mô tả</label>
                        <div class="col-sm-8"><textarea name="desc" id="txtarea2" cols="50" rows="4" class="form-control1">{{$product->desc}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="priceCoreinput" class="col-sm-2 control-label">Giá gốc</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" value="{{$product->priceCore}}" name="priceCore" class="" id="priceCoreinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priceSaleinput" class="col-sm-2 control-label">Giá sale</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" value="{{$product->priceSale}}" name="priceSale" class="" id="priceSaleinput" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stockinput" class="col-sm-2 control-label">Hàng tồn</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" value="{{$product->stock}}" name="stock" class="" id="stockinput" >
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

