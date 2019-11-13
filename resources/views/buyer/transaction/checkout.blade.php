@extends('buyer/template')

@section('title','Checkout')
@section('body_class','checkout-page')
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
                                <a href="#">Checkout</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Checkout</h1>
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
                                <div class="col-md-6">
                                    <h4>Detail Produk</h4>
                                </div>
                                <div class="col-md-2">
                                    <h5>Harga Per Item</h5>
                                </div>
                                <div class="col-md-2">
                                    <h4>Total Harga</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Jumlah Beli</h4>
                                </div>
                            </div>
                        </div>

                        <form action="{{url('checkout')}}" method="POST">
                            {{csrf_field()}}
                        <div class="row">
                        	<?php $count = 0; ?>
                        	@forelse($data as $d)
                        	<?php $count++;?>
                            <div class="col-md-12">
                                <div class="single_product clearfix">
                                    <div class="col-lg-6 col-md-6 v_middle">
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

                                    <div class="col-lg-2 col-md-2 v_middle">
                                        <div class="product__price_download">
                                            <div class="item_price v_middle">
                                                <span>Rp. {{number_format($d->ritem->harga_item,0,',','.')}}</span>
                                            </div>
                                            <div class="item_action v_middle">

                                            </div>
                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>

                                    <!-- <div class="col-lg-4 col-md-6 v_middle">
                                        <div class="product__price_download">
                                            
                                        </div>
                                    </div> -->


                                    <div class="col-lg-4 col-md-4 v_middle">
                                        <div class="product__price_download">
                                            <input type="hidden" class="price_item" value="{{$d->ritem->harga_item}}">
                                            <div class="item_price v_middle">
                                                <span>Rp. <font class="price_total">{{number_format($d->ritem->harga_item,0,',','.')}}</font></span>
                                            </div>
                                            <div class="item_action v_middle">
                                                <div class="select-wrap">
                                                    <select class="jml_select">
                                                        @for($i = 1;$i<=$d->ritem->stok_item;$i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <span class="lnr lnr-chevron-down"></span>
                                                    <input type="hidden" name="{{$d->ritem->id_item}}" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.col-md-4 -->
                                </div>
                                <!-- end /.single_product -->
                            </div>
                            @empty
                            <div class="col-md-12 text-center p-5">
                            	<h4 class="text-center">Daftar belanjaan kosong!</h4>
                            </div>
                            @endforelse
                        </div>
                        <!-- end /.row -->

                        @if($count > 0)
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="cart_calculation">
                                    <button type="submit" class="btn btn--round btn--md btn-success checkout_link">Pesan Barang</button>
                                </div>
                            </div>
                            <!-- end .col-md-12 -->
                        </div>
                        @endif
                        </form>
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

@section('js_addon')
<script type="text/javascript">
    $(document).ready(function(){
        $('.jml_select').change(function(){
            var selected = $(this).children('option:selected').val();
            $(this).parent().find('input').val(selected);
            $(this).parent().parent().parent().find('.price_total').html(formatRupiah(selected * $(this).parent().parent().parent().find('.price_item').val()));
        });
    });
</script>
@endsection