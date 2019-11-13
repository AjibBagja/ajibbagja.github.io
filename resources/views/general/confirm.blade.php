@extends('buyer/template')
@section('title',"Cart")
@section('content')
<section class="section-content bg padding-y-sm">
	<div class="container">
		<div class="row">
			<main class="col-sm-9">
			<form action="{{url('c/confirm')}}" method="POST">
			{{csrf_field()}}
				<div class="card">
					<table class="table table-hover shopping-cart-wrap">
						<thead class="text-muted">
							<tr>
	  							<th scope="col">Nama Produk</th>
	  							<th scope="col" width="120">Jumlah</th>
	  							<th scope="col" width="120">Harga</th>
	  							<th scope="col" class="text-right" width="200">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse($data as $d)
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
									<?php $count = 1; ?>
								  	@if($d->ritem->stok_item >=1)
								  		<select class="form-control" name="{{$d->ritem->id_item}}">
									  		<?php
									  			$stok = $d->ritem->stok_item;
									  			$count = 1;
									  		?>
									  		@while($count <= $stok)
									  			<option value="{{$count}}">{{$count++}}</option>
									  		@endwhile
								  		</select>
								  	@else
								  		Out Of Stock
							  		@endif
								</td>
								<td> 
									<div class="price-wrap"> 
										<var class="price" id="price_total">Rp.{{$d->ritem->harga_item}}</var> 
										<small class="text-muted">(Rp.<span id="price_each">{{$d->ritem->harga_item}}</span> per item)</small>
										<input type="hidden" value="{{$d->ritem->harga_item}}"> 
									</div> <!-- price-wrap .// -->
								</td>
								<td class="text-right"> 
									<!-- <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>  -->
									<a  href="{{url('c/delete/'.$d->ritem->id_item)}}" class="btn btn-outline-danger"> Hapus </a>
								</td>
							</tr>
							@empty
							
							@endforelse
						</tbody>
					</table>
				</div>
			</main>
			<aside class="col-sm-3">
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
				<figure class="itemside mb-3">
					<aside class="aside"><img src="{{asset('images/icons/pay-visa.png')}}"></aside>
		 			<div class="text-wrap small text-muted">
						Pay 84.78 AED ( Save 14.97 AED )
						By using ADCB Cards 
					</div>
				</figure>
				<figure class="itemside mb-3">
					<aside class="aside"> <img src="{{asset('images/icons/pay-mastercard.png')}}"> </aside>
					<div class="text-wrap small text-muted">
						Pay by MasterCard and Save 40%. <br>
						Lorem ipsum dolor 
					</div>
				</figure>
				<button type="submit" class="btn btn-flat btn-success btn-block"><i class="fa fa-shopping-cart"></i> Bayar!</button>
				</form>
			</aside>
		</div>
	</div>
</section>
@endsection