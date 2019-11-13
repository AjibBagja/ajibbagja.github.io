<table class="table table-striped" style="width:100%;">
	<thead class="bg-primary text-white">
		<tr>
			<td>No</td>
			<td>Info</td>
			<td>Data</td>
		</tr>
	</thead>
	<?php
		$key = Arr::except(config('config.tb_item_schema'),['id_user','id_item']);
		$no = 1;
		$status = config('config.item_status');
		$type = config('config.item_type');
	?>
	@foreach($key as $ke => $k)
		<tr>
			<td> {{$no++}} </td>
			<td>{{ucfirst($k)}}</td>
			@if($ke == "tipe_item")
				<td>{{$type[$data[$ke]]}}</td>
			@elseif($ke == "status_item")
				<td>{{$status[$data[$ke]]}}</td>
			@elseif($ke == "created_at" || $ke == "updated_at")
				<td>{{Carbon::parse($data[$ke])->diffForHumans()}}</td>
			@else
				<td>{{$data[$ke]}}</td>
			@endif
		</tr>
	@endforeach
</table>