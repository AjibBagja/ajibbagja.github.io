@extends("seller/template")

@section("title","Tarik Tunai")

@section("content_header")
      <h1>
        Tarik Tunai
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('seller')}}"><i class="fa fa-dashboard"></i> Toko</a></li>
        <li class="active">Tarik Tunai</li>
      </ol>
@endsection

@section("content")
	<p>Halaman ini digunakan untuk meminta tarik tunai ke rekening anda berdasarkan dari hasil penjualan produk anda.</p>
	<p>Biasanya akan memakan waktu sekitar 2x24 Jam sampai uang sampai ke rekening anda.</p>
	<table class="table table-striped">
		<thead class="bg-primary text-white">
			<tr>
				<th>No</th>
				<!-- <th>Barang</th> -->
				<th>Tanggal Transaksi</th>
				<th>Jumlah Uang</th>
				<th>Opsi</th>
			</tr>
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
				$trans = DetailTransaksi::with('rtrans')->whereHas('rtrans',function($q){
					$q->where('status_transaksi',"selesai");
				})->get();
				$no = 1;
			?>
			@forelse($trans as $t)
				<tr>
					<td>{{$no++}}</td>
					<td>{{ 'asd'}}</td>
					<td>{{ $t->rtrans->withdrawal }}</td>
					<td>
						<form action="{{url('seller/withdrawal/request')}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="amount" value="{{$t->withdrawal}}">
							<input type="hidden" name="system_date" value="{{'asd'}}">
							<button type="submit" class="btn btn-sm btn-flat btn-success">Request Penarikan!</button>
						</form>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="4">Tidak ada data transaksi yang berhasil.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection