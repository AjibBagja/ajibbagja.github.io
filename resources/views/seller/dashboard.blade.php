@extends('seller/template')
@section('title','Dashboard')
@section('breadcrumb')
	<li>
		<a href="{{url('seller')}}">Seller</a>
	</li>
	<li class="active">
		<a href="{{url('seller')}}">Dashboard</a>
	</li>
@endsection
@section('breadcrumb_title','Dashboard')
@section('content')
<?php
	use App\Item;
?>
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="author-info author-info--dashboard mcolorbg4">
				<p>Jumlah Item</p>
				<h3>{{Item::where('id_user',Auth::user()->id_user)->count()}}</h3>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="author-info author-info--dashboard mcolorbg2">
				<p>Placeholder</p>
				<h3>0</h3>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="author-info author-info--dashboard mcolorbg3">
				<p>Placeholder</p>
				<h3>0</h3>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="author-info author-info--dashboard mcolorbg1">
				<p>Placeholder</p>
				<h3>0</h3>
			</div>
		</div>
	</div>
</div>
@endsection