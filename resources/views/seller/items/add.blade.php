@extends("seller/template")

@section("title","Tambah Item Baru")
@section('breadcrumb')
	<li>
		<a href="{{url('seller')}}">Seller</a>
	</li>
	<li>
		<a href="{{url('seller/items')}}">List Item</a>
	</li>
	<li class="active">
		<a href="{{url('seller/items/add')}}">Tambah Item Baru</a>
	</li>
@endsection
@section('breadcrumb_title','Tambah Item Baru ')
@section("content")
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h3>Tambah Item Baru</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-8 col-md-7">
						<form class="form" action="{{url('seller/items/add')}}" method="post">
						    {{csrf_field()}}
						    <input type="hidden" name="status_item" value="ready">
						    <input type="hidden" name="id_user" value="{{Auth::user()->id_user}}">
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Tentang Item</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="form-group">
                                        <label for="category">Pilih Kategori Item</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="tipe_item" id="category" class="text_field">
									    		<?php
									    			$data = config("config.item_type");
									    		?>
									    		@foreach($data as $key => $d)
									    			<option value="{{$key}}">{{$d}}</option>
									    		@endforeach
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_name">Nama Item
                                            <span>(Maksimal 100 Character)</span>
                                        </label>
                                        <input type="text" id="product_name" name="nama_item" required min="4" class="text_field" placeholder="Nama Item...">
                                    </div>

                                    <div class="form-group">
                                        <label for="item_price">Harga Item
                                            <span>(Masukan angka saja)</span>
                                        </label>
                                        <input type="number" id="item_price" name="harga_item" required min="1" class="text_field" placeholder="Harga Item...">
                                    </div>

                                    <div class="form-group">
                                        <label for="item_stok">Stok Item
                                            <span>(Masukan angka saja)</span>
                                        </label>
                                        <input type="number" id="item_stok" name="stok_item" required min="1" class="text_field" placeholder="Stok Item...">
                                    </div>

                                    <!-- <div class="form-group no-margin">
                                        <p class="label">Product Description</p>
                                        <div id="trumbowyg-demo"></div>
                                    </div> -->
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.upload_modules -->

                            <!-- submit button -->
                            <button type="submit" class="btn btn--round btn--fullwidth btn--lg">Tambahkan Item!</button>
                        </form>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Aturan dan Ketentuan</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Image Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>File Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Vector Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Trouble Uploading?</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the
                                        mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->
                        </aside>
                        <!-- end /.sidebar -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
@endsection