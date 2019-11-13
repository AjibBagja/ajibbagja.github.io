@extends('seller/template')

@section('title','Riwayat Pemesanan')
@section('breadcrumb')
	<li>
		<a href="{{url('seller')}}">Seller</a>
	</li>
	<li>
		<a href="{{url('seller/orders')}}">Pemesanan</a>
	</li>
	<li class="active">
		<a href="{{url('seller/orders/history')}}">Riwayat</a>
	</li>
@endsection
@section('breadcrumb_title','Riwayat Pemesanan')
@section('content')
	<?php
		use App\Transaksi;
		use App\User;
		use App\Item;
		use App\DetailTransaksi;
		$curuser = Auth::user()->id_user;
		$items = array_values(Item::where('id_user',$curuser)->pluck('id_item')->toArray());
		$trans = Transaksi::where('status_transaksi','selesai')->with('ruser')->whereHas('ruser',function($q) use($curuser){
			$q->where('id_user',"!=",$curuser);
		})->with('rdettrans')->whereHas('rdettrans',function($q) use($items){
			$q->whereIn('id_item',$items);
		})->get();
		$no = 1;
	?>

    <section class="bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                    <h3>Riwayat Pemesanan</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Pembeli</th>
												<th>Status</th>
												<th>Opsi</th>
											</tr>
										</thead>
										<tbody>
												@forelse($trans as $t)
													<tr>
														<td>{{$no++}}</td>
														<td>{{$t->ruser->nama}}</td>
														<td>{{array_get(config('config.transaksi_status'),$t->status_transaksi)}}</td>
														<td>
															<a href="{{url('seller/orders/'.$t->id_transaksi)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pembelian"><i class="fa fa-search"></i></a>
														</td>
													</tr>
												@empty
													<tr>
														<td colspan="4">Tidak ada data transaksi yang aktif</td>
													</tr>
												@endforelse
										</tbody>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
@endsection

@section('additional_header')
	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection