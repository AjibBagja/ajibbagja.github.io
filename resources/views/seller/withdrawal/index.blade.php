@extends("seller/template")

@section("title","Tarik Tunai")
@section('breadcrumb')
	<li>
		<a href="{{url('seller')}}">Seller</a>
	</li>
	<li class="active">
		<a href="{{url('seller/items')}}">Tarik Tunai</a>
	</li>
@endsection
@section('breadcrumb_title','Tarik Tunai')
@section("content")
    <section class="bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modules__content">
                        <div class="withdraw_module withdraw_history">
                            <div class="withdraw_table_header">
                                <h3>List Transaksi</h3>
                                <hr>
								<p>Halaman ini digunakan untuk meminta tarik tunai ke rekening anda berdasarkan dari hasil penjualan produk anda.<br>Biasanya akan memakan waktu sekitar 2x24 Jam sampai uang sampai ke rekening anda</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table withdraw__table">
                                    <thead>
										<th>No</th>
										<th>Tanggal Transaksi</th>
										<th>Jumlah Uang</th>
										<th>Opsi</th>
                                    </thead>
                                    <tbody>
										<?php
											use App\Transaksi;
											use App\User;
											use App\Item;
											use App\DetailTransaksi;
											$curuser = Auth::user()->id_user;
											$items = array_values(Item::where('id_user',$curuser)->pluck('id_item')->toArray());
											// $trans = Transaksi::where('status_transaksi','selesai')->with('ruser')->whereHas('ruser',function($q) use($curuser){$q->where('id_user',"!=",$curuser);})->with('rdettrans')->whereHas('rdettrans',function($q) use($items){$q->whereIn('id_item',$items);})->get();
											$no = 0;
										?>
										@forelse($data as $d)
										<?php
											$tr = DetailTransaksi::whereIn('status_withdraw',["belum",'proses'])->whereIn('id_item',$items)->with('rtrans')->whereHas('rtrans',function($q) use($d){
												$q->where('status_transaksi',"selesai");
												$q->where('total_bayar',$d->amount);
											})->first();
										?>
											@if($tr)
												<tr>
													<td>{{++$no}}</td>
													<td>{{ 'asd'}}</td>
													<td>{{ $tr->withdrawal }}</td>
													<td class="{{$tr->status_withdraw == 'proses'?'pending':''}}">
														@if($tr->status_withdraw == "belum")
															<form action="{{url('seller/withdrawal/request')}}" method="POST">
																{{csrf_field()}}
																<input type="hidden" name="id_trans" value="{{$tr->id_transaksi}}">
																<input type="hidden" name="id_item" value="{{$tr->id_item}}">
																<input type="hidden" name="amount" value="{{$tr->withdrawal}}">
																<input type="hidden" name="system_date" value="{{date('Y-m-d')}}">
																<button type="submit" class="btn btn-sm btn--round btn-success">Request Penarikan!</button>
															</form>
														@elseif($tr->status_withdraw == "proses")
															<span>Proses</span>
														@endif
													</td>
												</tr>
											@endif
										@empty

										@endforelse
										@if($no == 0)
											<tr>
												<td colspan="4">Tidak ada data transaksi yang berhasil.</td>
											</tr>
										@endif
                                    </tbody>
                                </table>
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