@extends("seller/template")

@section("title","Item Jual")

@section("content_header")
      <h1>
        Data Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
@endsection

@section("content")
	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_input"><i class="fa fa-plus"></i>Tambah Item Baru</a><button type="button" class="btn btn-primary" onclick="refreshData()">Refresh Data</button>
	<hr>
	<div id="data_container">
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
				<?php $no = 0; ?>
					@forelse($data as $i)
					<?php
						$delete_url = url('items/delete/'.$i->id_item);
						$view_url = url('items/detail/'.$i->id_item);
						$edit_url = url('items/edit/'.$i->id_item);
					?>
						<tr>
							<td>{{++$no}}</td>
							<td>{{$i->nama_item}}</td>
							<td>{{ucfirst($i->tipe_item)}}</td>
							<td>Rp.{{$i->harga_item}}</td>
							<td><button class="btn btn-sm btn-primary" onclick="detailData('{{$view_url}}')"><i class="fa fa-eye"></i></button>
								<button class="btn btn-sm btn-warning" onclick="editData('{{$edit_url}}')"><i class="fa fa-edit"></i></button>
								<button class="btn btn-sm btn-danger" onclick="deleteData('{{$delete_url}}')"><i class="fa fa-trash"></i></button></td>
						</tr>
					@empty
						<tr>
							<td colspan="5">Tidak ada data item. Silahkan tambah baru</td>
						</tr>
					@endforelse
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Tambah Data Item Baru</h4>
	      </div>
	      <div class="modal-body">
	      	<form class="form" action="{{url('seller/items/add')}}" method="post" id="form_input">
	      		{{csrf_field()}}
	      		<input type="hidden" name="status_item" value="ready">
	      		<input type="hidden" name="id_user" value="{{Auth::user()->id}}">
	      		<div class="form-group">
	      			<input type="text" class="form-control" name="nama_item" placeholder="Nama Item..." required minlength="4">
	      		</div>
	      		<div class="form-group">
	      			<select class="form-control" name="tipe_item">
	      				<?php
	      					$data = config("config.item_type");
	      				?>
	      				@foreach($data as $key => $d)
	      					<option value="{{$key}}">{{$d}}</option>
	      				@endforeach
	      			</select>
	      		</div>
	      		<div class="form-group">
	      			<input type="number" class="form-control" name="harga_item" placeholder="Harga Item..." required minlength="3">
	      		</div>
	      		<div class="form-group">
	      			<input type="number" class="form-control" name="stok_item" placeholder="Stok Item..." required minlength="1">
	      		</div>
				<!-- <div class="dropzone needsclick dz-clickable text-center" id="photos_upload">
					<div class="dz-default dz-message needsclick">
				      	<b><h3>Taruh Foto Disini untuk mengupload<h3></b>
				      </div>
				    <h3 class="note needsclick"><small>(Ukuran foto tidak lebih dari 5mb)</small><br><small>(Jika lebar resolusi foto lebih dari 1024px maka akan diperkecil)</small></h3>
				</div> -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Tambah Data</button>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="modal_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Detail Data Item</h4>
	      </div>
	      <div class="modal-body" id="view_container">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-primary text-white">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Ubah Data Item</h4>
	      </div>
	      <div class="modal-body">
	      	<form class="form" action="{{url('seller/items/update')}}" method="post" id="form_edit">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Edit Data</button>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('js_no_ready')
//Dropzone.autoDiscover = false;
$('.modal').find('form').validate({
	errorClass:"help-block",
    validClass:"help-block",
    ignore : ".ignore",
    errorElement:'span',
    highlight: function (element, errorClass, validClass) { 
      $(element).parent().addClass("has-error").removeClass("has-success"); 
    }, 
    unhighlight: function (element, errorClass, validClass) { 
      $(element).parent().removeClass("has-error").addClass("has-success"); 
    },
    errorPlacement: function(error, element) {
      if(element.parent('.form-group').length){
        element.parent().addClass('has-error');
        error.insertAfter(element);
      }
    }
});
$("#form_input").on('submit',function(e){
   	e.preventDefault();
   	var isvalid = $("#form_input").valid();
   	if(isvalid){
		var form_data = $('#form_input').serialize();
		$.ajax({
			url:'{{url('items/add')}}',
			method:"POST",
			data:form_data,
			dataType:"json"
		});
   	}
});
$("#form_edit").on('submit',function(e){
   	e.preventDefault();
   	var isvalid = $("#form_edit").valid();
   	if(isvalid){
		var form_data = $('#form_edit').serialize();
		$.ajax({
			url:'{{url('items/update')}}',
			method:"POST",
			data:form_data,
			dataType:"json"
		});
   	}
});
function refreshData(){
	$('#data_container').fadeOut(500,function(){
		$("#data_container").html(' ');
		$("#data_container").load("{{url('items/refresh')}}",$("#data_container").fadeIn());
	});
}
function deleteData(url){
	iziToast.question({
	    close: false,
	    overlay: true,
	    displayMode: 'once',
	    id: 'question',
	    zindex: 999,
	    title: 'Konfirmasi',
        icon:'fa fa-exclamation-circle',
        backgroundColor:'#f39c12',
	    message: 'Yakin ingin menghapus data ini?',
	    position: 'center',
	    buttons: [
	        ['<button><b>Hapus</b></button>', function (instance, toast) {
	 
	            instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
				$.ajax({
					url:url,
					method:"GET",
					dataType:"json"
				});
	 			
	        }, true],
	        ['<button>Tidak</button>', function (instance, toast) {
	 
	            instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
	 
	        }],
	    ],
	});
}
function detailData(url){
	$('#view_container').html(' ');
	$('#view_container').load(url,function(){
		$('#modal_view').modal();
	});
}
function editData(url){
	$('#form_edit').html(' ');
	$('#form_edit').load(url,function(){
		$('#modal_edit').modal();
	});
}
@endsection

@section('js_ready')
var dzone = new Dropzone('div#photos_upload',{
	acceptedFiles: ".jpeg,.jpg,.png",
	uploadMultiple:false,
	paramName:'file',
	maxFilesize: 5,
	addRemoveLinks: true,
	parallelUploads:1,
	autoProcessQueue:false,
	url: "<?php echo URL::to('ajax/galeri-images-upload');?>",
	params:{
		_token: "<?php echo Session::getToken(); ?>"
	},
	init: function(){
		var myDropzone = this;
		$('#submit_btn').on("click", function(e) {
			e.preventDefault();
			var valid = checkForm();
			if(valid){
				var id = Math.random().toString(36).substr(2,12);
				$('#id_galeri').prop("value",id);
				$('#submit_btn').addClass('disabled');
				$('#cancel_btn').addClass('disabled');
				myDropzone.processQueue();
				iziToast.show({
					timeout:3600000,
					close:false,
					closeOnClick:false,
					closeOnEscape:false,
					overlay:true,
					zindex:1052,
					animateInside:true,
					theme:'dark',
					position:'center',
					icon:null,
					message:"<i class='fa fa-spinner fa-pulse fa-2x' style='float:left;align:center;'></i><b style='vertical-align:center;'>&nbsp;&nbsp;&nbsp;Sedang Mengupload...</b>",
								backgroundColor:'rgb(40,40,40)'
				});
			}
			else{
				form_validator.focusInvalid();
			}
		});
		myDropzone.on('processing',function(){
			myDropzone.options.autoProcessQueue = true;
		});
		myDropzone.on("sending", function(file, xhr, data) {
			data.append("id",$('#id_galeri').val());
		});
		myDropzone.on("success",function(files){
			if(myDropzone.getQueuedFiles().length == 0 && myDropzone.getUploadingFiles().length == 0){
				iziToast.destroy();
				sendForm();
			}
		});
	},
	success: function (file, response) {
		file.previewElement.classList.add("dz-success");
	},
	error: function (file, response) {
		file.previewElement.classList.add("dz-error");
	}
});
@endsection