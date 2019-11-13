@extends("buyer/template")

@section("title","Notifikasi")
@section('breadcrumb')
	<li class="active">
		<a href="{{url('seller/items')}}">Notifikasi</a>
	</li>
@endsection
@section('breadcrumb_title','Notifikasi ')
@section("content")
	<?php
		use App\Notif;
		$data = Notif::where('id_user',Auth::user()->id_user)->orderBy('created_at','desc')->paginate(10);
	?>
    <section class="bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modules__content">
                        <div class="withdraw_module withdraw_history">
                            <div class="withdraw_table_header">
                	           	<a href="{{url('seller/items/add')}}" class="btn btn-lg btn--round btn-primary float-right"><i class="fa fa-plus"></i> Tandai semua dibaca</a>
                                <h3>Notifikasi Terbaru</h3>
                            </div>
                            <div class="table-responsive">
								<table class="table withdraw__table">
									<thead>
										<tr>
											<th>Thumbnail</th>
											<th>Pesan Notif</th>
											<th>Waktu</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@forelse($data as $d)
											<tr class="{{($d->readed)?'color_notif_readed':'color_notif_unreaded'}}">
												<td>
		                                            <img src="{{asset('images/notification_head.png')}}" alt=""></td>
												<td>
													<p>
														<?= htmlspecialchars_decode($d->text_notif,ENT_QUOTES)?>
													</p>
												</td>
												<td>{{Carbon::parse($d->created_at)->diffForHumans()}}</td>
												<td><a href="{{url('notif/'.$d->id_notif)}}" class="btn btn-sm btn-primary btn--round"><i class="fa fa-eye"></i></a></td>
	                                        </tr>
										@empty
										<tr>
											<td colspan="4"><h2> Kosong! Check lagi nanti.</h2></td>
										</tr>
										@endforelse
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