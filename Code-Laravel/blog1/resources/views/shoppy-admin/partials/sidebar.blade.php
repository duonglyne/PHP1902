<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
            <!--<img id="logo" src="" alt="Logo"/>-->
        </a> </div>
    <div class="menu">
        <ul id="menu" >
            <li id="menu-home" ><a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li><a href="#"><i class="fa fa-cogs"></i><span>Quản trị bài viết</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul>
                    <li><a href="{{url('article')}}">tin tức</a></li>
                    <li><a href="{{url('article-review')}}">review</a></li>
                </ul>
            </li>
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Tài khoản</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-mensagens" style="width: 120px" ><a href="{{url('users')}}">người dùng</a>
                    </li>
                    <li id="menu-arquivos" ><a href="{{url('users-admin')}}">admin</a></li>
                </ul>
            </li>
            <li><a href="{{url('maps')}}"><i class="fa fa-map-marker"></i><span>Bản đồ</span></a></li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Banners</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-boletim" ><a href="{{url('banners')}}">Banners quảng cáo</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('banners-page')}}">Banners pages</a></li>
                </ul>
            </li>

            <li><a href="{{url('products')}}"><i class="fa fa-bar-chart"></i><span>Quản trị sản phẩm</span></a></li>
            <li><a href="{{url('email')}}"><i class="fa fa-envelope"></i><span>Email</span><span class="fa fa-angle-right" style="float: right"></span></a>
            </li>
            <li><a href="{{url('category')}}"><i class="fa fa-cog"></i><span>Danh mục</span><span class="fa fa-angle-right" style="float: right"></span></a>
            </li>
            {{--<li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>--}}
                {{--<ul id="menu-academico-sub" >--}}
                    {{--<li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>--}}
                    {{--<li id="menu-academico-boletim" ><a href="price.html">Price</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>
<div class="clearfix"> </div>
