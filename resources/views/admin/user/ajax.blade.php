<br>
<div class="col-ms-12">	

	<ol class="breadcrumb">
		<li>
			<a href="#" class="fa fa-home"></a>
		</li>
		<li class="active">User</li>
	</ol>

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

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<div class="form-group">
							<div class="col-md-11">
								<label for="inputLoai" class="col-sm-4 control-label"><strong>List Users</strong></label>
							</div>
							<div class="col-md-1">
								<a href="{!!URL::to('admin/user/create')!!}" class="btn btn-primary">Create User</a>
							</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>										
									<th>ID</th>										
									<th>Name</th>
									<th>Account</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $stt=0;?>
								@foreach ($user as $us)
									<?php $stt++;?>
									<tr>
										<td>{!!$stt!!}</td>
										<td>{{ $us['name'] }}</td>
										<td>{{ $us['account'] }}</td>
										{{-- <td>{{ $us['status'] }}</td> --}}
										<td>
											@if($us->status == 0)
												<span class="status0">Not activated</span>
											@else
												@if($us->status == 1)
													<span class="status1">Activated</span>
												@else
													<span class="status2">Ban</span>
											@endif
											@endif
										</td>		
										<td>
					                    	{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $us->id] ]) !!}
					                    			<a href="{{ route('user.edit', $us->id) }}" class="btn btn-primary">Edit</a>
					                    			{{-- <a href="{{ route('user.edit', $us->id) }}" class="btn btn-warning">Ban</a> --}}

					                    			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ban">Ban</button>

					                    			{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					                    	{!! Form::close() !!}
					                    </td>
									</tr>	
								@endforeach		
							</tbody>
						</table>
						{{ $user->links()}}
					</div>
				</div>
			</div>			
		</div>
	</div>

</div>

