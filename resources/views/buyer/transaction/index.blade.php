@extends('buyer/template')

@section('title','Status Transaksi')

@section('content')
	<div class="container">
		<h2> Status Transaksi </h2>
		<hr>
		<table class="table table-striped">
			<thead class="bg-primary text-white">
				<tr>
					<td> No </td>
					<td> Tanggal Pesan </td>
					<td> Jumlah Item </td>
					<td> Opsi </td>
				</tr>
			</thead>
			<tbody>
				<?php
					use App\Transaksi;
					$data = Transaksi::where('id_user',Auth::user()->id_user)->with('ruser')->with('rdettrans')->withTrashed()->get();
					$no = 1;
				?>
				@forelse($data as $d)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$d->created_at}}</td>
						<td>{{count($d->rdettrans)}}</td>
						<td>
							<a href="{{url('t/'.$d->id_transaksi)}}" data-toggle="tooltip" title="Lihat detail" class="btn btn-flat btn-primary"><i class="fa fa-search"></i></a>
							@if(!$d->trashed())
								<a href="{{url('t/d/'.$d->id_transaksi)}}" data-toggle="tooltip" title="Batalkan transaksi" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></a>
							@endif
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4"> Tidak ada data transaksi</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>
@endsection


@section('additional_header')
	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@endsection