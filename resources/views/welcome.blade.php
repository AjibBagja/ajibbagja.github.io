@extends('buyer/template')

@section('title','Selamat Datang di Adestore Marketplace')
@section('content')
    <?php
        use App\Item;
        use App\KategoriItem;
        $kategori = KategoriItem::all();
    ?>
    <!--================================
        START HERO AREA
    =================================-->
    <section class="hero-area hero--1 bgimage">
        <div class="bg_image_holder">
            <img src="{{url('images/index_top_bg.jpg')}}" alt="">
        </div>
        <!-- start hero-content -->
        <div class="hero-content content_above">
            <!-- start .contact_wrapper -->
            <div class="content-wrapper">
                <!-- start .container -->
                <div class="container">
                    <!-- start row -->
                    <div class="row">
                        <!-- start col-md-12 -->
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <h1>
                                    <span class="light">Selamat Datang</span>
                                    <span class="bold">di Adestore Marketplace</span>
                                </h1>
                                <p class="tagline">Buatlah toko sendiri sesukamu</p>
                            </div>

                            <!-- start .hero__btn-area-->
                            <div class="hero__btn-area">
                                <a href="{{url('i')}}" class="btn btn--round btn--lg">Lihat semua produk</a>
                            </div>
                            <!-- end .hero__btn-area-->
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.container -->
            </div>
            <!-- end .contact_wrapper -->
        </div>

        <!--start search-area -->
        <div class="search-area">
            <!-- start .container -->
            <div class="container">
                <!-- start .container -->
                <div class="row">
                    <!-- start .col-sm-12 -->
                    <div class="col-sm-12">
                        <!-- start .search_box -->
                        <div class="search_box">
                            <form action="{{url('i')}}" method="GET">
                                <input type="text" class="text_field" placeholder="Cari Produk yang diinginkan...">
                                <div class="search__select">
                                    <select name="kategori" class="select--field">
                                        <option value="none">Kategori : Semua</option>
                                        @forelse($kategori as $k)
                                        <option value="{{$k->slug}}">Kategori : {{$k->nama_kategori}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                                <button type="submit" class="search-btn btn--lg">Cari Item</button>
                            </form>
                        </div>
                        <!-- end ./search_box -->
                    </div>
                    <!-- end /.col-sm-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!--start /.search-area -->
    </section>
    <!--================================
        END HERO AREA
    =================================-->

    <!--================================
        START FEATURED PRODUCT AREA
    =================================-->
    <!-- <section class="featured-products bgcolor2 section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Our Featured
                            <span class="highlighted">Products</span>
                        </h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats. Lid
                            est laborum dolo rumes fugats untras.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="featured-product-slider prod-slider2">
                        <div class="featured__single-slider">
                            <div class="featured__preview-img">
                                <img src="images/featprod.jpg" alt="Featured products">
                            </div>

                            <div class="featured__product-description">
                                <div class="product-desc desc--featured">
                                    <a href="single-product.html" class="product_title">
                                        <h4>Rida - vCard, Portfolio / Resume Template</h4>
                                    </a>
                                    <ul class="titlebtm">
                                        <li>
                                            <img class="auth-img" src="images/auth.jpg" alt="author image">
                                            <p>
                                                <a href="#">AazzTech</a>
                                            </p>
                                        </li>
                                        <li class="product_cat">
                                            <a href="#">
                                                <span class="lnr lnr-book"></span> WordPress</a>
                                        </li>
                                    </ul>

                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                        mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra,
                                        justo ut scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.</p>
                                </div>
                                <div class="product_data">
                                    <div class="tags tags--round">
                                        <ul>
                                            <li>
                                                <a href="#">website</a>
                                            </li>
                                            <li>
                                                <a href="#">plugin</a>
                                            </li>
                                            <li>
                                                <a href="#">landing page</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-purchase featured--product-purchase">
                                        <div class="price_love">
                                            <span>$10 - $50</span>
                                            <p>
                                                <span class="lnr lnr-heart"></span> 90</p>
                                        </div>
                                        <div class="sell">
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <span>16</span>
                                            </p>
                                        </div>

                                        <div class="rating product--rating">
                                            <ul>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="featured__single-slider">
                            <div class="featured__preview-img">
                                <img src="images/featprod.jpg" alt="Featured products">
                            </div>

                            <div class="featured__product-description">
                                <div class="product-desc desc--featured">
                                    <a href="single-product.html" class="product_title">
                                        <h4>One Page Resume Template</h4>
                                    </a>
                                    <ul class="titlebtm">
                                        <li>
                                            <img class="auth-img" src="images/auth.jpg" alt="author image">
                                            <p>
                                                <a href="#">AazzTech</a>
                                            </p>
                                        </li>
                                        <li class="product_cat">
                                            <a href="#">
                                                <span class="lnr lnr-book"></span> WordPress</a>
                                        </li>
                                    </ul>

                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                        mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra,
                                        justo ut scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.</p>
                                </div>

                                <div class="product_data">
                                    <div class="tags tags--round">
                                        <ul>
                                            <li>
                                                <a href="#">website</a>
                                            </li>
                                            <li>
                                                <a href="#">plugin</a>
                                            </li>
                                            <li>
                                                <a href="#">landing page</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-purchase featured--product-purchase">
                                        <div class="price_love">
                                            <span>$10 - $50</span>
                                            <p>
                                                <span class="lnr lnr-heart"></span> 90</p>
                                        </div>
                                        <div class="sell">
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <span>16</span>
                                            </p>
                                        </div>

                                        <div class="rating product--rating">
                                            <ul>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    end /.product-purchase
                                </div>
                            </div>
                        </div>

                        <div class="featured__single-slider">
                            <div class="featured__preview-img">
                                <img src="images/featprod.jpg" alt="Featured products">
                            </div>

                            <div class="featured__product-description">
                                <div class="product-desc desc--featured">
                                    <a href="single-product.html" class="product_title">
                                        <h4>AppsPress App Landing</h4>
                                    </a>
                                    <ul class="titlebtm">
                                        <li>
                                            <img class="auth-img" src="images/auth.jpg" alt="author image">
                                            <p>
                                                <a href="#">AazzTech</a>
                                            </p>
                                        </li>
                                        <li class="product_cat">
                                            <a href="#">
                                                <span class="lnr lnr-book"></span> WordPress</a>
                                        </li>
                                    </ul>

                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                        mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra,
                                        justo ut scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.</p>
                                </div>

                                <div class="product_data">
                                    <div class="tags tags--round">
                                        <ul>
                                            <li>
                                                <a href="#">website</a>
                                            </li>
                                            <li>
                                                <a href="#">plugin</a>
                                            </li>
                                            <li>
                                                <a href="#">landing page</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-purchase featured--product-purchase">
                                        <div class="price_love">
                                            <span>$10 - $50</span>
                                            <p>
                                                <span class="lnr lnr-heart"></span> 90</p>
                                        </div>
                                        <div class="sell">
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <span>16</span>
                                            </p>
                                        </div>

                                        <div class="rating product--rating">
                                            <ul>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="featured__single-slider">
                            <div class="featured__preview-img">
                                <img src="images/featprod.jpg" alt="Featured products">
                            </div>

                            <div class="featured__product-description">
                                <div class="product-desc desc--featured">
                                    <a href="single-product.html" class="product_title">
                                        <h4>MartPlace - Digital Marketplace</h4>
                                    </a>
                                    <ul class="titlebtm">
                                        <li>
                                            <img class="auth-img" src="images/auth.jpg" alt="author image">
                                            <p>
                                                <a href="#">AazzTech</a>
                                            </p>
                                        </li>
                                        <li class="product_cat">
                                            <a href="#">
                                                <span class="lnr lnr-book"></span> WordPress</a>
                                        </li>
                                    </ul>

                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                        mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Praesent pharetra,
                                        justo ut scelerisque the mattis, leo quam aliquet congue justo ut scelerisque.</p>
                                </div>

                                <div class="product_data">
                                    <div class="tags tags--round">
                                        <ul>
                                            <li>
                                                <a href="#">website</a>
                                            </li>
                                            <li>
                                                <a href="#">plugin</a>
                                            </li>
                                            <li>
                                                <a href="#">landing page</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-purchase featured--product-purchase">
                                        <div class="price_love">
                                            <span>$10 - $50</span>
                                            <p>
                                                <span class="lnr lnr-heart"></span> 90</p>
                                        </div>
                                        <div class="sell">
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <span>16</span>
                                            </p>
                                        </div>

                                        <div class="rating product--rating">
                                            <ul>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <span class="lnr lnr-chevron-left prod_slide_prev"></span>
                    <span class="lnr lnr-chevron-right prod_slide_next"></span>
                </div>
            </div>
        </div>
    </section> -->
    <!--================================
        END FEATURED PRODUCT AREA
    =================================-->


    <!--================================
        START PRODUCTS AREA
    =================================-->
    <section class="products section--padding">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="product-title-area">
                        <div class="product__title">
                            <h2>Produk Terbaru</h2>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-4 -->
                @forelse(Item::orderBy('created_at','desc')->with('ruser')->limit(6)->get() as $i)
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card product--card3">

                        <div class="product__thumbnail">
                            <img src="https://via.placeholder.com/361x230.png?text=Adestore" alt="Product Image">
                            <div class="prod_btn">
                                <a href="{{url('i/'.$i->id_item)}}" class="transparent btn--sm btn--round">Detail</a>
                            </div>
                            <!-- end /.prod_btn -->
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>{{$i->nama_item}}</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="images/auth.jpg" alt="author image">
                                    <p>
                                        <a href="#">{{$i->ruser->nama}}</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                        <a href="{{url('i'.'?kategori='.(KategoriItem::find($i->id_kategori))->slug)}}">{{(KategoriItem::find($i->id_kategori))->nama_kategori}}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.product-desc -->

                        
                            <div class="product-purchase">
                                <div class="price_love">
                                    <span>Rp. {{number_format($i->harga_item,0,',','.')}}</span>
                                    <!-- <p><span class="lnr lnr-heart"></span> 90</p> -->
                                </div>
                                <div class="sell">
                                    <p>
                                        <span class="lnr lnr-cart"></span>
                                        <span>{{$i->stok_item}}</span>
                                    </p>
                                </div>
                            </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                @empty
                <div class="col-lg-4 col-md-6">
                    <h2>Tidak ada data item</h2>
                </div>
                @endforelse
                <!-- end /.col-md-4 -->
            </div>

            <!-- start .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="more-product">
                        <a href="{{url('i')}}" class="btn btn--lg btn--round">Semua Produk</a>
                    </div>
                </div>
                <!-- end ./col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END PRODUCTS AREA
    =================================-->

    <!--================================
        START COUNTER UP AREA
    =================================-->
    <section class="counter-up-area bgimage">
        <div class="bg_image_holder">
            <img src="images/countbg.jpg" alt="">
        </div>
        <!-- start .container -->
        <div class="container content_above">
            <!-- start .col-md-12 -->
            <div class="col-md-12">
                <div class="counter-up">
                    <div class="counter mcolor2">
                        <span class="lnr lnr-briefcase"></span>
                        <span class="count">38,436</span>
                        <p>items for sale</p>
                    </div>
                    <div class="counter mcolor3">
                        <span class="lnr lnr-cloud-download"></span>
                        <span class="count">38,436</span>
                        <p>total Sales</p>
                    </div>
                    <div class="counter mcolor1">
                        <span class="lnr lnr-smile"></span>
                        <span class="count">38,436</span>
                        <p>appy customers</p>
                    </div>
                    <div class="counter mcolor4">
                        <span class="lnr lnr-users"></span>
                        <span class="count">38,436</span>
                        <p>members</p>
                    </div>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END COUNTER UP AREA
    =================================-->


    <!--================================
        START WHY CHOOSE US AREA
    =================================-->
    <section class="why_choose section--padding">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Why Choose
                            <span class="highlighted">MartPlace</span>
                        </h1>
                        <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats. Lid
                            est laborum dolo rumes fugats untras.</p>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <!-- start row -->
            <div class="row">
                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .reason -->
                    <div class="feature2">
                        <span class="feature2__count">01</span>
                        <div class="feature2__content">
                            <span class="lnr lnr-license pcolor"></span>
                            <h3 class="feature2-title">One Time Payment</h3>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet diam congue is laoreet elit metus.</p>
                        </div>
                        <!-- end /.feature2__content -->
                    </div>
                    <!-- end /.feature2 -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .feature2 -->
                    <div class="feature2">
                        <span class="feature2__count">02</span>
                        <div class="feature2__content">
                            <span class="lnr lnr-magic-wand scolor"></span>
                            <h3 class="feature2-title">Quality Products</h3>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet diam congue is laoreet elit metus.</p>
                        </div>
                        <!-- end /.feature2__content -->
                    </div>
                    <!-- end /.feature2 -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .feature2 -->
                    <div class="feature2">
                        <span class="feature2__count">03</span>
                        <div class="feature2__content">
                            <span class="lnr lnr-lock mcolor1"></span>
                            <h3 class="feature2-title">100% Secure Paymentt</h3>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet diam congue is laoreet elit metus.</p>
                        </div>
                        <!-- end /.feature2__content -->
                    </div>
                    <!-- end /.feature2 -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .feature2 -->
                    <div class="feature2">
                        <span class="feature2__count">04</span>
                        <div class="feature2__content">
                            <span class="lnr lnr-chart-bars mcolor2"></span>
                            <h3 class="feature2-title">Well Organized Code</h3>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet diam congue is laoreet elit metus.</p>
                        </div>
                        <!-- end /.feature2__content -->
                    </div>
                    <!-- end /.feature2 -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .feature2 -->
                    <div class="feature2">
                        <span class="feature2__count">05</span>
                        <div class="feature2__content">
                            <span class="lnr lnr-leaf mcolor3"></span>
                            <h3 class="feature2-title">Life Time Free Update</h3>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet diam congue is laoreet elit metus.</p>
                        </div>
                        <!-- end /.feature2__content -->
                    </div>
                    <!-- end /.feature2 -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .feature2 -->
                    <div class="feature2">
                        <span class="feature2__count">06</span>
                        <div class="feature2__content">
                            <span class="lnr lnr-phone mcolor4"></span>
                            <h3 class="feature2-title">Fast and Friendly Support</h3>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                                leo quam aliquet diam congue is laoreet elit metus.</p>
                        </div>
                        <!-- end /.feature2__content -->
                    </div>
                    <!-- end /.feature2 -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END WHY CHOOSE US AREA
    =================================-->


    <!--================================
        START SPECIAL FEATURES AREA
    =================================-->
    <section class="special-feature-area bgcolor2 special-feature--2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="special-feature feature--1">
                        <img src="images/spf1.png" alt="Special Feature image">
                        <h3 class="special__feature-title">30 Days Money Back
                            <span class="highlight">Guarantee</span>
                        </h3>
                    </div>
                </div>
                <!-- end /.col-md-6 -->
                <div class="col-md-6">
                    <div class="special-feature feature--2">
                        <img src="images/spf2.png" alt="Special Feature image">
                        <h3 class="special__feature-title">Fast and Friendly
                            <span class="highlight">Support</span>
                        </h3>
                    </div>
                </div>
                <!-- end /.col-md-6 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END SPECIAL FEATURES AREA
    =================================-->
@endsection