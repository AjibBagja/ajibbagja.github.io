@extends('buyer/template')

@section('title','Status Transaksi')

@section('content')
<?php
	use App\Item;
	use App\Transaksi;
	use App\DetailTransaksi;
	$deta = DetailTransaksi::where('id_transaksi',$data->id_transaksi)->get();
?>
<div class="container mb-3">
	<div class="row">
		<main class="col-md-8 col-sm-12">
			<div class="card">
				<table class="table table-hover shopping-cart-wrap">
					<thead class="text-muted">
						<tr>
			  				<th scope="col">Nama Produk</th>
			  				<th scope="col" width="120">Jumlah</th>
			  				<th scope="col" width="120">Harga</th>
						</tr>
					</thead>
					<tbody>
						@forelse($deta as $d)
							<tr>
								<td>
									<figure class="media">
										<div class="img-wrap"><img src="https://via.placeholder.com/500x500.png?text=Adestore Item" class="img-thumbnail img-sm"></div>
										<figcaption class="media-body">
											<h6 class="title text-truncate">{{$d->ritem->nama_item}} </h6>
											<dl class="dlist-inline small">
								  				<dt>Spek 1: </dt>
								  				<dd>Lorem</dd>
											</dl>
											<dl class="dlist-inline small">
								  				<dt>Spek 2: </dt>
								  				<dd>Ipsum</dd>
											</dl>
										</figcaption>
									</figure> 
								</td>
								<td>
									{{$d->jumlah}}
								</td>
								<td> 
									<div class="price-wrap"> 
										<var class="price" id="price_total">Rp.{{$d->ritem->harga_item}}</var> 
										<small class="text-muted">(Rp.<span id="price_each">{{$d->ritem->harga_item}}</span> per item)</small>
										<input type="hidden" value="{{$d->ritem->harga_item}}"> 
									</div> <!-- price-wrap .// -->
								</td>
							</tr>
							@empty
						@endforelse
					</tbody>
				</table>
			</div>
		</main>
		<aside class="col-md-4 col-sm-12">
			<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
			<dl class="dlist-align">
		 		<dt>Total price: </dt>
			  	<dd class="text-right">USD 568</dd>
			</dl>
			<dl class="dlist-align">
			  	<dt>Discount:</dt>
			  	<dd class="text-right">USD 658</dd>
			</dl>
			<dl class="dlist-align h4">
			  	<dt>Total:</dt>
			  	<dd class="text-right"><strong>USD 1,650</strong></dd>
			</dl>
			<hr>
			<label> Beritahu Penjual Sudah Ditransfer disini</label>
			<button type="submit" class="btn btn-flat btn-success btn-block"><i class="fa fa-exclamation"></i> Beritahu Penjual!</button>
		</aside>
	</div>
</div>
@endsection


@section('additional_header')
@endsection