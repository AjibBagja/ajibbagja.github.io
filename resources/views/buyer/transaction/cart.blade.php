@extends('buyer/template')

@section('title','Shopping Cart')
@section('body_class','cart-page')
@section('content')
<!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Keranjang Belanja</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Keranjang Belanja</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START DASHBOARD AREA
    =================================-->
    <section class="cart_area section--padding2 bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product_archive added_to__cart">
                        <div class="title_area">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Detail Produk</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="add_info">Kategori</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Harga</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Opsi</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        	<?php $count = 0; ?>
                        	@forelse($data as $d)
                        	<?php $count++;?>
                            <div class="col-md-12">
                                <div class="single_product clearfix">
                                    <div class="col-lg-5 col-md-7 v_middle">
                                        <div class="product__description">
                                            <img src="images/pur1.jpg" alt="Purchase image">
                                            <div class="short_desc">
                                                <a href="single-product.html">
                                                    <h4>{{$d->ritem->nama_item}}</h4>
                                                </a>
                                                <p>Nunc placerat mi id nisi inter dum mollis. Praesent phare...</p>
                                            </div>
                                        </div>
                                        <!-- end /.product__description -->
                                    </div>
                                    <!-- end /.col-md-5 -->

                                    <div class="col-lg-3 col-md-2 v_middle">
                                        <div class="product__additional_info">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <img src="images/catword.png" alt="">Wordpress</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end /.product__additional_info -->
                                    </div>
                                    <!-- end /.col-md-3 -->

                                    <div class="col-lg-4 col-md-3 v_middle">
                                        <div class="product__price_download">
                                            <div class="item_price v_middle">
                                                <span>Rp. {{number_format($d->ritem->harga_item,0,',','.')}}</span>
                                            </div>
                                            <div class="item_action v_middle">
                                                <a href="{{url('c/delete/'.$d->ritem->id_item)}}" class="remove_from_cart">
                                                    <span class="lnr lnr-trash"></span>
                                                </a>
                                            </div>
                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>
                                    <!-- end /.col-md-4 -->
                                </div>
                                <!-- end /.single_product -->
                            </div>
                            @empty
                            <div class="col-md-12 text-center p-5">
                            	<h4 class="text-center">Keranjang belanja kosong!</h4>
                            </div>
                            @endforelse
                        </div>
                        <!-- end /.row -->

                        @if($count > 0)
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="cart_calculation">
                                    <a href="{{url('c/deleteall')}}" class="btn btn--round btn--md btn-danger checkout_link">Kosongkan Keranjang</a>
                                    <a href="{{url('checkout')}}" class="btn btn--round btn--md btn-success checkout_link">Checkout</a>
                                </div>
                            </div>
                            <!-- end .col-md-12 -->
                        </div>
                        @endif
                    </div>
                    <!-- end /.product_archive2 -->
                </div>
                <!-- end .col-md-12 -->
            </div>
            <!-- end .row -->

        </div>
        <!-- end .container -->
    </section>
    <!--================================
            END DASHBOARD AREA
    =================================-->
@endsection