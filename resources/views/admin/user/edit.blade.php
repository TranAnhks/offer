@extends('admin.layouts.admin')
<!--Xac dinh title cho view thong qua yield('title')-->
@section('title','Contact page')
<!--xac dinh noi dung cho yield('noidung')-->
@section('noidung')

	{!! Form::model($user_edit, array('route' => array('user.update', $user_edit->id), 'method' => 'put')) !!}

	<div class="container-fluid mt-5">
  		<div class="form-group row">
       		@if (session('ketqua'))
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('ketqua') }}
                    </div>
                </div>
            @endif
        </div>
   	</div>

	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class=""><a href="{!!URL::to('admin/category')!!}">Category</a></li>
		<li class="active">Edit Category</li>
	</ol>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><small>Edit Category</small></h1>
		</div>
	</div>
		
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">					
				<div class="panel-body">
			    	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			      		{!! Form::label('input-id', 'Name', ['class'=>'control-label']) !!}
			      		{!! Form::text('name', $user_edit->name, ['class' => 'form-control']) !!}
	      		  		<span class="text-danger">{{ $errors->first('name') }}</span>

	      		  	</div>

		      		<div class="form-group {{ $errors->has('account') ? 'has-error' : '' }}">
			      		{!! Form::label('input-id', 'Account', ['class'=>'control-label']) !!}
			      		{!! Form::text('account',$user_edit->account, ['class' => 'form-control']) !!}
			      		<span class="text-danger">{{ $errors->first('account') }}</span>
		      		</div>

		      		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			      		{!! Form::label('input-id', 'Password', ['class'=>'control-label']) !!}
			      		{!! Form::text('password',$user_edit->password, ['class' => 'form-control']) !!}
			      		<span class="text-danger">{{ $errors->first('password') }}</span>
		      		</div>

			 
		      		<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
						{!! Form::label('input-id', 'status', ['class'=>'control-label']) !!}
							<select name="status"  class="form-control" >
								<option value="1">Activated</option>
								<option value="0">Not activated</option>
								<option value="2">Ban</option>
							</select>
			      			<span class="text-danger">{{ $errors->first('status') }}</span>
					</div>

		      		{!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
				</div>
			</div>
		</div>
	</div>

	{!! Form::close() !!}
	
@endsection

