@extends("seller/template")

@section("title","Data Item")
@section('breadcrumb')
	<li>
		<a href="{{url('seller')}}">Seller</a>
	</li>
	<li class="active">
		<a href="{{url('seller/items')}}">List Item</a>
	</li>
@endsection
@section('breadcrumb_title','Data List Item ')
@section("content")
	<div class="modal fade rating_modal item_remove_modal" id="modal_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header text-white">
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
    <section class="bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modules__content">
                        <div class="withdraw_module withdraw_history">
                            <div class="withdraw_table_header">
                	           	<a href="{{url('seller/items/add')}}" class="btn btn-lg btn--round btn-primary float-right"><i class="fa fa-plus"></i> Tambah Item Baru</a>
                                <h3>List Item</h3>
                            </div>
                            <div class="table-responsive">
								<table class="table withdraw__table">
									<thead>
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
												$delete_url = url('seller/items/delete/'.$i->id_item);
												$view_url = url('seller/items/detail/'.$i->id_item);
												$edit_url = url('seller/items/edit/'.$i->id_item);
											?>
												<tr>
													<td>{{++$no}}</td>
													<td>{{$i->nama_item}}</td>
													<td>{{ucfirst($i->tipe_item)}}</td>
													<td>Rp.{{$i->harga_item}}</td>
													<td><button class="btn btn-sm btn-primary" onclick="detailData('{{$view_url}}')"><i class="fa fa-eye"></i></button>
														<a href="{{$edit_url}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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

@section('js_addon')
<script type="text/javascript">
//Dropzone.autoDiscover = false;
// $('.modal').find('form').validate({
// 	errorClass:"help-block",
//     validClass:"help-block",
//     ignore : ".ignore",
//     errorElement:'span',
//     highlight: function (element, errorClass, validClass) { 
//       $(element).parent().addClass("has-error").removeClass("has-success"); 
//     }, 
//     unhighlight: function (element, errorClass, validClass) { 
//       $(element).parent().removeClass("has-error").addClass("has-success"); 
//     },
//     errorPlacement: function(error, element) {
//       if(element.parent('.form-group').length){
//         element.parent().addClass('has-error');
//         error.insertAfter(element);
//       }
//     }
// });
function refreshData(){
	$('#data_container').fadeOut(500,function(){
		$("#data_container").html(' ');
		$("#data_container").load("{{url('seller/items/refresh')}}",$("#data_container").fadeIn());
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
	            window.location = url;
	 			
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
</script>
@endsection