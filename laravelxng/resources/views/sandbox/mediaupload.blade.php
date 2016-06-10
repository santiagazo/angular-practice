@extends('layouts.user.main')

@section('title')

@endsection

@section('css')
	<link rel="stylesheet" href="">

	<style>

	</style>
@stop

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 margin-bottom-60 margin-top-20">
			{!! Form::open( ['url' => 'sandbox/pdf', 'files' => true] ) !!}

				<!--Text form input-->
				<div class="col-md-12">
					<div class='form-group'>
						{!! Form::label('title', 'Title:') !!}
						{!! Form::text('title', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('file', 'File Upload:') !!}
						{!! Form::file('file', ['class' => 'form-control']) !!}
					</div>
				</div>
				<!--Submit form input-->
				<div class="col-md-12">
					<div class="form-group">
						{!! Form::submit('Submit', ['class' => 'btn btn-default pull-right']) !!}
					</div>
				</div>

			{!! Form::close() !!}
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



