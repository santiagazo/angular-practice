@extends('layouts.user.main')
@section('title')
	My Documents
@endsection

@section('css')
	<link rel="stylesheet" href="{{ url('assets/css/pages/document.css') }}">
@stop

@section('content')
<div class="container-fluid content-wrapper">

	<div class="row">
		<div class="col-md-12 margin-bottom-40">

			<!--Text form input-->
			<div class="searchBox">
				<div class="input-group">
					{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
					<span class="input-group-btn">
						<button class="btn btn-blue" type="button"><i class="fa fa-search"></i></button>
					</span>
				</div>

			</div>

			<a href="{{ url('document/create') }}" class="btn btn-blue pull-right">Add Document</a>
		</div>
	</div>


	<div class="row">

		@foreach($documents as $document)
			<div class="document-box-container">
				<div class="document-box">
					<div class="document-mime pdf">
						<div class="document-options btn-group-vertical">
							<a href="{{ url('document/edit/'.$document->collection) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Sign"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('document/show/'.$document->collection) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="View"><i class="fa fa-eye"></i></a>
							<a href="{{ url('document/share/'.$document->collection) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" title="Share"><i class="fa fa-share"></i></a>
							<a href="{{ url('document/destroy?collection='.$document->collection) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a>
						</div>
					</div>
					<div class="document-name">
						<span>
							{{ $document->title }}
						</span>
					</div>
				</div>
			</div>
		@endforeach





		<div class="document-box-container">
			<div class="document-box">
				<div class="document-mime pdf">
					<div class="document-options btn-group-vertical">
						<a href="document/edit/id" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Sign"><i class="fa fa-pencil"></i></a>
						<a href="document/show/id" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="View"><i class="fa fa-eye"></i></a>
						<a href="document/share/id" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" title="Share"><i class="fa fa-share"></i></a>
						<a href='document/delete/id' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a>
					</div>
				</div>
				<div class="document-name">
					<span>
						theVeryFirstFakeDocument.pdf
					</span>
				</div>
			</div>
		</div>
		<div class="document-box-container">
			<div class="document-box">
				<div class="document-mime xls">
					<div class="document-options btn-group-vertical">
						<a href="document/edit/id" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Sign"><i class="fa fa-pencil"></i></a>
						<a href="document/show/id" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="View"><i class="fa fa-eye"></i></a>
						<a href="document/share/id" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" title="Share"><i class="fa fa-share"></i></a>
						<a href='document/delete/id' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a>
					</div>
				</div>
				<div class="document-name">
					<span>
						theVeryFirstFakeDocument.pdf
					</span>
				</div>
			</div>
		</div>
		<div class="document-box-container">
			<div class="document-box">
				<div class="document-mime img">
					<div class="document-options btn-group-vertical">
						<a href="document/edit/id" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Sign"><i class="fa fa-pencil"></i></a>
						<a href="document/show/id" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="View"><i class="fa fa-eye"></i></a>
						<a href="document/share/id" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" title="Share"><i class="fa fa-share"></i></a>
						<a href='document/delete/id' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a>
					</div>
				</div>
				<div class="document-name">
					<span>
						theVeryFirstFakeDocument.pdf
					</span>
				</div>
			</div>
		</div>
		<div class="document-box-container">
			<div class="document-box">
				<div class="document-mime doc">
					<div class="document-options btn-group-vertical">
						<a href="document/edit/id" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Sign"><i class="fa fa-pencil"></i></a>
						<a href="document/show/id" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="View"><i class="fa fa-eye"></i></a>
						<a href="document/share/id" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" title="Share"><i class="fa fa-share"></i></a>
						<a href='document/delete/id' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a>
					</div>
				</div>
				<div class="document-name">
					<span>
						theVeryFirstFakeDocument.pdf
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

	<script>

		$(function(){
			$( )
		});

	</script>

@stop
