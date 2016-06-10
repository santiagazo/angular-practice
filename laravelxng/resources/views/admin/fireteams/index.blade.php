@extends('layouts.user.main')

@section('title')

@endsection

@section('css')
	<link rel="stylesheet" href="">

	<style>
		.table>thead>tr>th {
		     border-top: none;
		}
	</style>
@stop

@section('content')
	<div class="container-fluid content-wrapper">
		<div class="row">
			<div class="col-md-12">

				<a href="{{ url('admin/fireteam/create') }}" class="btn btn-blue pull-right margin-bottom-20">Add Fireteam</a>
				<table id="user-list" class="table">
					{!! Form::open(['url' => 'admin/fireteam/index', 'method' => 'GET']) !!}
						<thead>
							<tr>
								<th></th>
								<th>
									<div class="form-group">
										<label for="id">ID</label>
										{!! Form::text('id', $id, ['placeholder' => 'Search ID', 'class' => 'form-control fireteam-id']) !!}
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="title">Name</label>
										{!! Form::text('title', $title, ['placeholder' => 'Search Name', 'class' => 'form-control fireteam-title']) !!}
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="leader">Leader</label>
										{!! Form::text('leader', $leader, ['placeholder' => 'Search Leader', 'class' => 'form-control fireteam-leader']) !!}
									</div>
								</th>
								<th>
									<div class="form-group">
										<label for="users">Members</label>
										{!! Form::text('users', $users, ['placeholder' => 'Search Members', 'class' => 'form-control fireteam-users']) !!}
									</div>
								</th>
							</tr>
						</thead>

						<input type="submit" style="visibility: hidden; position: absolute;"/>
					{!! Form::close() !!}

					<tbody>
						@foreach($fireteams as $fireteam)
							<tr>
								<td>
									<a href="{{ url('admin/fireteam/edit/'.$fireteam->id) }}" class="btn btn-primary responsive-button">
										<i class="fa fa-pencil"></i>
									</a>
								</td>
								<td>{{ $fireteam->id ?: NULL }}</td>
								<td>
									{{ $fireteam->title ?: NULL }}
								</td>
								<td>
									{{ $fireteam->leader ? $fireteam->leader->name : NULL }}
								</td>
								<td>
									@if(count($fireteam->users) < 1)
										This Fireteam has no members
									@else
										@foreach($fireteam->users as $user)
											<div class="label label-primary">{{ $user->name }}</div>
										@endforeach
									@endif
								</td>
							</tr>

						@endforeach
					</tbody>
				</table>
				{!! $fireteams->links() !!}


			</div>
		</div>
	</div>

@endsection

@section('js')

	<script>

		$(function(){

		});

	</script>

@stop
