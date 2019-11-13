@extends('buyer/template')
@section('body_class','home3')
@section('title','Selamat Datang')
@section('content')
<?php
    use App\KategoriItem;
    use App\Item;
    $kategori = KategoriItem::all();
?>
<!--================================
        START SEARCH AREA
    =================================-->
    <form action="{{url('/')}}" method="GET">
    <section class="search-wrapper">
        <div class="search-area2 bgimage">
            <div class="bg_image_holder">
                <img src="images/search.jpg" alt="">
            </div>
            <div class="container content_above">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="search">
                            <div class="search__title">
                                <h3> Apa produk yang anda butuhkan ?</h3>
                            </div>
                            <div class="search__field">
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text" placeholder="Masukan produk yang dicari" name="search">
                                    <button class="btn btn--round" type="submit">Search</button>
                                </div>
                            </div>
                            <div class="breadcrumb">
                                <ul>
                                    <li>
                                        <!-- <a href="#">Home</a> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.search-area2 -->
    </section>
    <!--================================
        END SEARCH AREA
    =================================-->

    <!--================================
        START FILTER AREA
    =================================-->
    <div class="filter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar">
                        <div class="filter__option filter--dropdown">
                            <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="custom_dropdown custom_drop2 dropdown-menu" aria-labelledby="drop1">
                                <li>
                                    <button type="submit" name="kategori" value="none">Reset
                                    </button>
                                </li>
                                @forelse($kategori as $k)
                                <li>
                                    <button type="submit" name="kategori" value="{{$k->slug}}">{{$k->nama_kategori}}
                                        <span>{{Item::where('id_kategori',$k->id_kategori)->count()}}</span>
                                    </button>
                                </li>
                                @empty

                                @endforelse
                            </ul>
                        </div>
                        <!-- end /.filter__option -->

                        <!-- <div class="filter__option filter--dropdown">
                            <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
                                <li>
                                    <a href="#">Trending items</a>
                                </li>
                                <li>
                                    <a href="#">Popular items</a>
                                </li>
                                <li>
                                    <a href="#">New items </a>
                                </li>
                                <li>
                                    <a href="#">Best seller </a>
                                </li>
                                <li>
                                    <a href="#">Best rating </a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- end /.filter__option -->

                        <div class="filter__option filter--dropdown filter--range">
                            <a href="#" id="drop3" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Range Harga
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <div class="custom_dropdown dropdown-menu" aria-labelledby="drop3">
                                <div class="range-slider price-range"></div>

                                <div class="price-ranges">
                                    <span class="from rounded">$30</span>
                                    <span class="to rounded">$300</span>
                                </div>
                            </div>
                        </div>
                        <!-- end /.filter__option -->

                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price" onchange="this.form.submit()">
                                    <option value="low">Harga : Menaik</option>
                                    <option value="high">Harga : Menurun</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>
                        <!-- end /.filter__option -->

                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price">
                                    <option value="12">12 Item per halaman</option>
                                    <option value="15">15 Item per halaman</option>
                                    <option value="25">25 Item per halaman</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>
                        <!-- end /.filter__option -->

                        <div class="filter__option filter--layout">
                            <a href="#">
                                <div class="svg-icon">
                                    <img class="svg" src="images/svg/grid.svg" alt="">
                                </div>
                            </a>
                            <a href="#">
                                <div class="svg-icon">
                                    <img class="svg" src="images/svg/list.svg" alt="">
                                </div>
                            </a>
                        </div>
                        <!-- end /.filter__option -->
                    </div>
                    <!-- end /.filter-bar -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end filter-bar -->
        </div>
    </div>
    </form>
    <!-- end /.filter-area -->
    <!--================================
        END FILTER AREA
    =================================-->
    <!--================================
        START PRODUCTS AREA
    =================================-->
    <section class="products">
        <!-- start container -->
        <div class="container">

            <!-- start .row -->
            <div class="row">
            	<?php
					$data = null;
                    $search = (isset($_GET['search']))?$_GET['search']:null;
                    $kategori = (isset($_GET['kategori']))?$_GET['kategori']:"none";
                    $price = (isset($_GET['price']))?$_GET['price']:"low";
					if(Auth::check()){
						$data = Item::where('id_user','!=',Auth::user()->id_user)->when($search,function($query) use ($search){
                            if($search != null){
                                return $query->where('nama_item','like','%'.$request->get('search')."%");
                            }
                            else{
                                return $query;
                            }
                        })->when($kategori,function($query) use ($kategori){
                            if($kategori != "none"){
                                return $query->where('id_kategori',(KategoriItem::where('slug',$kategori)->first())->id_kategori);
                            }
                            else{
                                return $query;
                            }
                        })->when($price,function($query) use($price){
                            if($price == "low"){
                                return $query->orderBy('harga_item',"asc");
                            }
                            else{
                                return $query->orderBy('harga_item','desc');
                            }
                        })->with('ruser')->paginate(15);

					}
					else{
                        $data = Item::when($search,function($query) use ($search){
                            if($search != null){
                                return $query->where('nama_item','like','%'.$request->get('search')."%");
                            }
                            else{
                                return $query;
                            }
                        })->when($kategori,function($query) use ($kategori){
                            if($kategori != "none"){
                                return $query->where('id_kategori',(KategoriItem::where('slug',$kategori)->first())->id_kategori);
                            }
                            else{
                                return $query;
                            }
                        })->when($price,function($query) use($price){
                            if($price == "low"){
                                return $query->orderBy('harga_item',"asc");
                            }
                            else{
                                return $query->orderBy('harga_item','desc');
                            }
                        })->with('ruser')->paginate(15);
					}
					$count =0;
				?>
	            @foreach($data as $d)
	            	<?php $count++;?>
	                <!-- start .col-md-4 -->
	                <div class="col-lg-4 col-md-6">
	                    <!-- start .single-product -->
	                    <div class="product product--card">

	                        <div class="product__thumbnail">
	                            <img src="https://via.placeholder.com/361x230.png?text=Adestore" alt="Product Image">
	                            <div class="prod_btn">
	                                <a href="{{url('i/'.$d->id_item)}}" class="transparent btn--sm btn--round">Detail</a>
	                            </div>
	                            <!-- end /.prod_btn -->
	                        </div>
	                        <!-- end /.product__thumbnail -->

	                        <div class="product-desc">
	                            <a href="{{url('i/'.$d->id_item)}}" class="product_title">
	                                <h4>{{$d->nama_item}}</h4>
	                            </a>
	                            <ul class="titlebtm">
	                                <li>
	                                    <img class="auth-img" src="images/auth.jpg" alt="author image">
	                                    <p>
	                                        <a href="#">{{$d->ruser->nama}}</a>
	                                    </p>
	                                </li>
	                                <li class="product_cat">
	                                    <a href="#">{{(KategoriItem::find($d->id_kategori))->nama_kategori}}</a>
	                                </li>
	                            </ul>

	                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
	                                leo quam aliquet congue.</p>
	                        </div>
	                        <!-- end /.product-desc -->

	                        <div class="product-purchase">
	                            <div class="price_love">
	                                <span>Rp. {{number_format($d->harga_item,0,',','.')}}</span>
	                                <!-- <p><span class="lnr lnr-heart"></span> 90</p> -->
	                            </div>
	                            <div class="sell">
	                                <p>
	                                    <span class="lnr lnr-cart"></span>
	                                    <span>{{$d->stok_item}}</span>
	                                </p>
	                            </div>
	                        </div>
	                        <!-- end /.product-purchase -->
	                    </div>
	                    <!-- end /.single-product -->
	                </div>
	                <!-- end /.col-md-4 -->
	            @endforeach
	            @if($count < 1)
	            	<h2>Tidak ada data produk yang bisa dilihat. Silahkan coba lagi nanti!</h2>
	            @endif
            </div>
            <!-- end /.row -->
			
            @if($count>0)
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="pagination-area">
                            {{$data->links()}}
	                    </div>
	                </div>
	            </div>
            @endif
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END PRODUCTS AREA
    =================================-->
@endsection
@section('js_addon')
    <script type="text/javascript">
    </script>
@endsection