<table class="table table-striped">
	<thead class="bg-primary text-white">
		<tr>
			<th>No</th>
			<th>Nama Item</th>
			<th>Tipe Item</th>
			<th>Harga</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			use App\Item;
			$data = Item::where('id_user',Auth::user()->id_user)->get(); 
			$no = 0;
		?>
			@forelse($data as $i)
			<?php
				$delete_url = url('items/delete/'.$i->id_item);
			?>
				<tr>
					<td>{{++$no}}</td>
					<td>{{$i->nama_item}}</td>
					<td>{{ucfirst($i->tipe_item)}}</td>
					<td>Rp.{{$i->harga_item}}</td>
					<td><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
						<a href="#" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
						<button class="btn btn-sm btn-danger" onclick="deleteData('{{$delete_url}}')"><i class="fa fa-trash"></i></button></td>
				</tr>
			@empty
				<tr>
					<td colspan="5">Tidak ada data item. Silahkan tambah baru</td>
				</tr>
			@endforelse
	</tbody>
</table>