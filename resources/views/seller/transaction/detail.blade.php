@extends('seller/template')

@section('title','Detail Pemesanan')
@section('breadcrumb')
	<li>
		<a href="{{url('seller')}}">Seller</a>
	</li>
	<li>
		<a href="{{url('seller/orders')}}">Pemesanan</a>
	</li>
	<li class="active">
		<a href="{{url()->current()}}">Detail Pemesanan</a>
	</li>
@endsection
@section('breadcrumb_title','Detail Pemesanan')
@section('content')
<?php
	use App\DetailTransaksi;
	$d = DetailTransaksi::where('id_transaksi',$data->id_transaksi)->first();
	$cid = $d->conversation_id;
?>
<section class="bgcolor">
	<div class="container">
		<div class="shortcode_modules">
			<div class="modules__content">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<b>Info Pemesanan</b>
						<p>
							Nama Pemesanan 		: {{$data->ruser->nama}} <br>
							Tanggal Pemesanan 	: {{$data->created_at}} <br>
							Status Pemesanan 	: {{Arr::get(config('config.transaksi_status'),$data->status_transaksi)}}
						</p>
					</div>
					<div class="col-sm-12 col-md-6">
						@if($data->status_transaksi != "selesai")
							<a href="{{url('seller/porders/'.$data->id_transaksi)}}" class="btn btn-lg btn--round btn-success"><i class="fa fa-check"></i> Transaksi Selesai</a>
							<a href="{{url('seller/chat/'.$cid)}}" class="btn btn-lg btn--round btn-info"><i class="fa fa-comments"></i> Chat Dengan Pembeli</a>
							<a href="#" class="btn btn-lg btn--round btn-danger"><i class="fa fa-trash"></i> Batalkan Transaksi</a>
						@endif
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-sm-12">
						<table class="table table-striped">
							<thead class="bg-primary text-white">
								<tr>
									<td> No </td>
									<td> Nama Item </td>
									<td> Jumlah </td>
									<td> Opsi </td>
								</tr>
							</thead>
							<tbody>
								<?php
									$no = 1;
								?>
								@foreach(DetailTransaksi::where('id_transaksi',$data->id_transaksi)->with('ritem')->get() as $dt)
									<tr>
										<td> {{$no++}} </td>
										<td> {{$dt->ritem->nama_item}} </td>
										<td> {{$dt->jumlah}} </td>
										<td>
											@if($data->status_transaki == "selesai")
											@else
												<a href="#" class="btn btn-sm btn--round btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Item Di Transaksi Ini"><i class="fa fa-times"></i></a>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('additional_header')
	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection