
@extends('layouts/user/main')

@section('head')
@stop


@section('title')
	Role
@stop

@section('bodystart')
	<body class="{{ $user->theme or Config::get('settings.default_theme') }} main-menu-animated">
@stop


@section('content-header')
	<div class="page-header">
		<h1>Role</h1>
	</div> <!-- / .page-header -->

@stop

@section('css')
	<style>
		.btn-submit-right{
			position: absolute;
			top: 25px;
			right: 15px;
			height: 34px;
			border-top-left-radius: 0px;
			border-bottom-left-radius: 0px;
		}

		.label{
			margin-right: 3px;
			margin-bottom: 3px;
		}

		#role_name{
			width: 95%;
		}

		.media screen and (max-width: 777px) { /*FYI YOU NEED TO SET THIS BACK TO @ BECUASE THE SYNTAX WAS BROKEN>*/
			#role_name{
				width: 95% !important;
			}
		}

		.permissions-box{
			background-color: #E8E8E8;
			-webkit-box-shadow: inset 0px 0px 18px -2px rgba(0,0,0,0.12);
			-moz-box-shadow: inset 0px 0px 18px -2px rgba(0,0,0,0.12);
			box-shadow: inset 0px 0px 18px -2px rgba(0,0,0,0.12);
			border-radius: 4px;
			border: 1px solid #ccc;
			min-height: 300px;
			padding: 5px;
		}
		.permissions-box .removePermission {
			cursor: pointer;
		}
		.removePermission a{
			color: #fff;
			text-decoration: none;
		}
		.removePermission a:hover,
		.removePermission a:focus,
		.removePermission a:active{
			color: #ccc;
		}

	</style>
@stop

@section('content')
	<div class="container-fluid content-wrapper">
	@include('errors.flash')

		<div class="row">
			<div class="col-md-12">

				{!! Form::label('role_name', 'Role') !!}
				<div class='form-group'>
					@if($role->name)
						{!! Form::text('role_name', $role->name, ['class' => 'form-control', 'disabled' => "disabled", 'id' => 'non-edit-role-name']) !!}
					@else
						{!! Form::open(['url' => 'admin/roles/addrole']) !!}
							{!! Form::text('role_name', NULL, ['class' => 'form-control']) !!}
							{!! Form::hidden('role_id', $role->id) !!}
							<div class="pull-right">
								{!! Form::submit('Add', ['class' => 'btn btn-primary btn-submit-right']) !!}
							</div>
						{!! Form::close() !!}
					@endif
				</div>

				<div class="form-group">
					{!! Form::label('addPermission', 'Add a Permission') !!}
					@if($role->name)
						{!! Form::select('addPermission', $permissionsArray, null, ['class' => 'form-control']) !!}
					@else
						{!! Form::select('addPermission', $permissionsArray, null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
					@endif
				</div>


				<div class="form-group">
					{!! Form::label('current_permissions', 'Current Permissions') !!}
					<div class="permissions-box">
						@foreach($role->permissions as $permission)
							<div class="label label-primary">
								{{ $permission->name }}
								<span class="removePermission">
									<a href="{{ url('admin/roles/removepermission/'.$role->id.'/'.$permission->name) }}">
										&nbsp;&nbsp;&nbsp;&times;
									</a>
								</span>
							</div>
							<br>
						@endforeach
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
						<!-- <a href="{{ url('admin/roles/delete/id/'.$role->id) }}" class="btn btn-danger">Delete</a> -->
						<a href="{{ url('admin/roles/index') }}" class='btn btn-primary pull-right'>Save</a>
					</div>
				</div>

			</div>


		</div>
	</div>
@stop

@section('js')
	<script>
		$(function(){
		  	$('[data-toggle="tooltip"]').tooltip()

		    $('body').on('change', '#addPermission', function(){
		  		var selectedPermission = $(this).val();
		  		$.ajax({
		  			url: "{{ url('admin/roles/giverolepermission') }}",
		  			type: 'POST',
		  			data: {
		  				role_id: "{{ $role->id ?: NULL}}",
		  				permission_name: selectedPermission
		  			},
		  			success: function (response) {
		  				var response = jQuery.parseJSON(response);
		  				if(typeof response == 'string'){
		  					console.log(response);
		  					$('.permissions-box').append(''+
		  						'<div class="label label-primary">'+
									response+
									'<span class="removePermission">'+
										'<a href="{{ url('admin/roles/removepermission') }}/{{ $role->id }}/'+response+'">'+
											'&nbsp;&nbsp;&nbsp;&times;'+
										'</a>'+
									'</span>'+
								'</div>'+
		  					'<br/>');
		  				}else if(typeof response == 'object' && response.priority){
		  					jsFlash(response.priority, response.message);
		  				}
		  			},
		  			error: function (xhr) {
		  				console.log(xhr);
		  			}
		  		});
		    });

		});
	</script>
@stop
