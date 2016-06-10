@extends('layouts.user.main')

@section('title')
	Roles
@stop

@section('css')
	<style>
		.table>thead>tr>th {
		     border-top: none;
		}
		.responsive-button {
			margin-bottom: 10px;
			display: inline-block;
		}
	</style>
@stop

@section('bodystart')
	<body class="{{ $user->theme or Config::get('settings.default_theme') }} main-menu-animated">
@stop

@section('content-header')
	<div class="page-header">
		<h1>Roles</h1>
	</div> <!-- / .page-header -->
@stop


@section('content')
	@include('errors.flash')
	<div class="container-fluid content-wrapper">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ url('admin/roles/create') }}" class="btn btn-blue pull-right margin-bottom-20">Add Role</a>
				<table id="user-list" class="table">
					{!! Form::open(['url' => 'admin/roles/index', 'method' => 'GET']) !!}
						<thead>
							<tr>
								<th></th>
								<th>
									<div class="form-group">
										<label for="role_id">Role ID</label>
										{!! Form::text('role_id', $role_id, ['placeholder' => 'Search ID', 'class' => 'form-control role-id']) !!}
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="name">Name</label>
										{!! Form::text('name', $name, ['placeholder' => 'Search Name', 'class' => 'form-control role-name']) !!}
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="permission">Permissions</label>
										{!! Form::text('permission', $permission, ['placeholder' => 'Search Permissions', 'class' => 'form-control role-permission']) !!}
									</div>
								</th>
							</tr>
						</thead>

						<input type="submit" style="visibility: hidden; position: absolute;" />
					{!! Form::close() !!}

					<tbody>
						@foreach($roles as $role)
							<tr>
								<td>
									<a href="{{ url('admin/roles/edit/'.$role->id) }}" class="btn btn-primary responsive-button">
										<i class="fa fa-pencil"></i>
									</a>
								</td>
								<td>{{ $role->id }}</td>
								<td>
									{{ $role->name }}
								</td>
								<td>
									@if(count($role->permissions) < 1)
										No Permissions Given
									@else
										@foreach($role->permissions as $permission)
											<div class="label label-primary">{{ $permission->name }}</div>
										@endforeach
									@endif
								</td>
							</tr>

						@endforeach
					</tbody>
				</table>
				{!! $roles->links() !!}
			</div>
		</div>
	</div>

@stop

@section('js')

	<script>

		$(function(){


			$('body').on('keyup', '.role-id, .role-name, .role-username, .role-email', function(){
				var input = $(this);
				window.timer=setTimeout(function(){ // setting the delay for each keypress
				 	timedAjaxRequest(input); //runs the ajax request
				},
				500);
				}).keydown(function(){
					clearTimeout(window.timer); //clears out the timeout
			});


			function timedAjaxRequest(input){
				var user_id = $('.role-id').val();
				var fullname = $('.role-name').val();
				var username = $('.role-username').val();
				var email = $('.role-email').val();

				$.ajax({
					url: '/admin/roles/superusers',
					type: 'POST',
					data: {
						user_id: user_id,
						fullname: fullname,
						username: username,
						email: email
					},
					success: function (response) {
						console.log(response);
						var response = jQuery.parseJSON(response);
						$('tbody').html('');
						$.each( response, function( key, value ) {
							$('tbody').append('<tr>'+
								'<td>'+
									'<a href="{{ url('admin/edituser') }}/'+value.userId+'" class="btn btn-primary responsive-button">'+
										'<i class="fa fa-pencil"></i>'+
									'</a>'+
									'<a href="{{ url('admin/disguise') }}/'+value.userId+'" class="btn btn-primary responsive-button right">'+
										'<i class="fa fa-user-secret"></i>'+
									'</a>'+
								'</td>'+
								'<td>'+value.userId+'</td>'+
								'<td>'+value.fullname+'</td>'+
								'<td>'+value.username+'</td>'+
								'<td>'+value.email+'</td>'+
							'</tr>')
							$('.responsive-button.right').css({'margin-left': '4px'})
							$('ul.pagination').remove();
						});

					},
					error: function (xhr) {
						console.log(xhr);
					}
				});
			}

		});

	</script>

@stop

