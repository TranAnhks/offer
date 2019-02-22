@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')
	<br>

	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class=""><a href="{!!URL::to('admin/home')!!}">Home</a></li>
	</ol>

	<div class="row">
		<div class="col-md-12">
			<h2 class="page-header"><small>Home</small></h2>
		</div>
	</div>

	<h2>Welcome to the Admin page</h2>
	
@endsection

