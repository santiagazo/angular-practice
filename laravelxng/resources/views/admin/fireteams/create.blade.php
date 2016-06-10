@extends('layouts.user.main')

@section('title')

@endsection

@section('css')
	<link rel="stylesheet" href="{{ url('assets/plugins/select2-master/dist/css/select2.min.css') }}">

	<style>
		.deleteFireTeamBtn{
			color: #fff;
		}
		.deleteFireTeamBtn:hover{
			color: #bbb;
			text-decoration: none;
		}

		.btn.btn-fireTeam.text-left {
			text-align: left;
		    color: #fff;
		    background-color: #2c4a6b;
		    border-color: #173353;
		}
		.select2result img{
			width: 100px;
		}
		.select2result .select2info{
			padding: 20px 10px 20px 10px;
			margin-left: 101px;
		}
		.select2-container--default .select2-selection--multiple {
		    border-radius: 0px;
		}
	</style>
@stop

@section('content')
	<div class="container-fluid content-wrapper">
		@include('errors.flash')
		<div class="row">
			<div class="col-md-12">
				<h3>Name Your Fireteam</h3>
			</div>

			<div class="col-md-6">
				{!! Form::label('title', 'Name:') !!}
				<div class="input-group">
					{!! Form::text('title', null, ['class' => 'form-control']) !!}
					<span class="input-group-btn">
						<button class="btn btn-secondary saveFireteamName" type="button">Save</button>
					</span>
				</div>
				<button class="btn btn-fireTeam btn-block text-left" style="display: none">
					<span id="fireteamName"></span>
					<a href="javascript:void(0)" class="deleteFireTeamBtn pull-right" onclick="editFireteamName()"><i class="fa fa-pencil"></i></a>
				</button>
			</div>
		</div>

		<hr class="dark-border">

		<div class="row">
			<div class="col-md-12">
				<h3>Build Your Fireteam</h3>
			</div>
			<div class="col-md-4">
				<div class='form-group'>
					{!! Form::label('realtors[]', 'Add a Realtor:') !!}
					{!! Form::select('realtors[]', [], null, ['class' => 'form-control addRealtor', 'multiple', 'style' => 'width:100%']) !!}
				</div>
			</div>

			<div class="col-md-4">
				<div class='form-group'>
					{!! Form::label('lenders[]', 'Add a Lender:') !!}
					{!! Form::select('lenders[]', [], null, ['class' => 'form-control addLender', 'multiple', 'style' => 'width:100%']) !!}
				</div>
			</div>

			<div class="col-md-4">
				<div class='form-group'>
					{!! Form::label('title_companies[]', 'Add a Title Company:') !!}
					{!! Form::select('title_companies[]', [], null, ['class' => 'form-control addTitle', 'multiple', 'style' => 'width:100%']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class='form-group'>
					{!! Form::label('buyers[]', 'Add a Buyer:') !!}
					{!! Form::select('buyers[]', [], null, ['class' => 'form-control addBuyer', 'multiple', 'style' => 'width:100%']) !!}
				</div>
			</div>

			<div class="col-md-4">
				<div class='form-group'>
					{!! Form::label('sellers[]', 'Add a Seller:') !!}
					{!! Form::select('sellers[]', [], null, ['class' => 'form-control addSeller', 'multiple', 'style' => 'width:100%']) !!}
				</div>
			</div>

			<div class="col-md-4">
				<div class='form-group'>
					{!! Form::label('others[]', 'Add Other:') !!}
					{!! Form::select('others[]', [], null, ['class' => 'form-control addOther', 'multiple', 'style' => 'width:100%']) !!}
				</div>
			</div>
			<div class="col-md-12 clearfix">
				<button class="btn btn-secondary pull-right saveFireteamMembers">Save</button>
			</div>
		</div>

		<hr class="dark-border">

		<div class="row">
			<div class="col-md-12">
				<h3>Edit Your Fireteam's Permissions</h3>
			</div>
			<div class="col-md-2">
				<div class='form-group'>
					{!! Form::label('name', 'Add a Realtor:') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>

	</div>
@endsection

@section('js')
	<script src="{{ url('assets/plugins/select2-master/dist/js/select2.full.js') }}"></script>
	<script>

		$(function(){
			$('body').on('click', '.saveFireteamName', function(){
				var title = $('[name=title]').val();
				console.log(title);
				$.ajax({
					url: "{{ url('admin/fireteam/store') }}",
					type: 'POST',
					data: {
						type: 'fireteamName',
						title: title
					},
					success: function (response) {
						console.log(response);
						var response = $.parseJSON(response);
						if (typeof response == "string") {
							console.log(response);
						} else if (typeof response == "object") {
							console.log(response);
						}

					},
					error: function (xhr) {
						if(xhr.status == 422){
							var errors = $.parseJSON(xhr.responseText);
							var messages = '';
							$.each(errors, function(key, errorMessage){
								$.each(errorMessage, function(index, message){
									messages += '<li>'+message+'</li>';
								});
							});
							console.log(messages);
							jsFlash('error', messages, false);
						}else{
							console.log(xhr);
						}
					}
				});
			});

			$('body').on('click', '.saveFireteamMembers', function(){
				var realtors = $('[name="realtors[]"]').val();
				var lenders = $('[name="lenders[]"]').val();
				var title_companies = $('[name="title_companies[]"]').val();
				var buyers = $('[name="buyers[]"]').val();
				var sellers = $('[name="sellers[]"]').val();
				var others = $('[name="others[]"]').val();
				$.ajax({
					url: "{{ url('admin/fireteam/store') }}",
					type: 'POST',
					data: {
						type: 'fireteamMembers',
						realtors: realtors,
						lenders: lenders,
						title_companies: title_companies,
						buyers: buyers,
						sellers: sellers,
						others: others,
					},
					success: function (response) {
						console.log(response);
						var response = $.parseJSON(response);
						if (typeof response == "string") {
							alert(response);
						} else if (typeof response == "object") {
							console.log(response);
						}

					},
					error: function (xhr) {
						if(xhr.status == 422){
							var errors = $.parseJSON(xhr.responseText);
							var messages = '';
							$.each(errors, function(key, errorMessage){
								$.each(errorMessage, function(index, message){
									messages += '<li>'+message+'</li>';
								});
							});
							console.log(messages);
							jsFlash('error', messages, false);
						}else{
							console.log(xhr);
						}
					}
				});
			});

			$(".addRealtor").select2({
			  ajax: {
			    url: "{{ url('admin/fireteam/roleuserselectlist') }}",
			    dataType: 'json',
			    delay: 250,
			    data: function (params) {
			      return {
			        q: params.term, // search term
			        page: params.page,
			        role: 'Realtor'
			      }
			    },
			    processResults: function (data, params) {
			      // parse the results into the format expected by Select2
			      // since we are using custom formatting functions we do not need to
			      // alter the remote JSON data, except to indicate that infinite
			      // scrolling can be used
			      params.page = params.page || 1;

			      return {
			        results: data.data,
			        pagination: {
			          more: (params.page * 30) < data.total_count
			        }
			      };
			    },
			    cache: true
			  },
			  escapeMarkup: function (markup) { return markup; },
			  minimumInputLength: 1,
			  allowClear: true,
			  templateResult: formatResult,
			  templateSelection: formatSelection,
			});

			$(".addLender").select2({
				ajax: {
			    url: "{{ url('admin/fireteam/roleuserselectlist') }}",
			    dataType: 'json',
			    delay: 250,
			    data: function (params) {
			      return {
			        q: params.term, // search term
			        page: params.page,
			        role: 'Lender'
			      }
			    },
			    processResults: function (data, params) {
			      // parse the results into the format expected by Select2
			      // since we are using custom formatting functions we do not need to
			      // alter the remote JSON data, except to indicate that infinite
			      // scrolling can be used
			      params.page = params.page || 1;

			      return {
			        results: data.data,
			        pagination: {
			          more: (params.page * 30) < data.total_count
			        }
			      };
			    },
			    cache: true
			  },
			  escapeMarkup: function (markup) { return markup; },
			  minimumInputLength: 1,
			  allowClear: true,
			  templateResult: formatResult,
			  templateSelection: formatSelection,
			});

			$(".addTitle").select2({ajax: {
			    url: "{{ url('admin/fireteam/roleuserselectlist') }}",
			    dataType: 'json',
			    delay: 250,
			    data: function (params) {
			      return {
			        q: params.term, // search term
			        page: params.page,
			        role: 'Title Company'
			      }
			    },
			    processResults: function (data, params) {
			      // parse the results into the format expected by Select2
			      // since we are using custom formatting functions we do not need to
			      // alter the remote JSON data, except to indicate that infinite
			      // scrolling can be used
			      params.page = params.page || 1;

			      return {
			        results: data.data,
			        pagination: {
			          more: (params.page * 30) < data.total_count
			        }
			      };
			    },
			    cache: true
			  },
			  escapeMarkup: function (markup) { return markup; },
			  minimumInputLength: 1,
			  allowClear: true,
			  templateResult: formatResult,
			  templateSelection: formatSelection,
			});

			$(".addBuyer").select2({
				ajax: {
			    url: "{{ url('admin/fireteam/roleuserselectlist') }}",
			    dataType: 'json',
			    delay: 250,
			    data: function (params) {
			      return {
			        q: params.term, // search term
			        page: params.page,
			        role: 'Buyer'
			      }
			    },
			    processResults: function (data, params) {
			      // parse the results into the format expected by Select2
			      // since we are using custom formatting functions we do not need to
			      // alter the remote JSON data, except to indicate that infinite
			      // scrolling can be used
			      params.page = params.page || 1;

			      return {
			        results: data.data,
			        pagination: {
			          more: (params.page * 30) < data.total_count
			        }
			      };
			    },
			    cache: true
			  },
			  escapeMarkup: function (markup) { return markup; },
			  minimumInputLength: 1,
			  allowClear: true,
			  templateResult: formatResult,
			  templateSelection: formatSelection,
			});

			$(".addSeller").select2({
				ajax: {
			    url: "{{ url('admin/fireteam/roleuserselectlist') }}",
			    dataType: 'json',
			    delay: 250,
			    data: function (params) {
			      return {
			        q: params.term, // search term
			        page: params.page,
			        role: 'Seller'
			      }
			    },
			    processResults: function (data, params) {
			      // parse the results into the format expected by Select2
			      // since we are using custom formatting functions we do not need to
			      // alter the remote JSON data, except to indicate that infinite
			      // scrolling can be used
			      params.page = params.page || 1;

			      return {
			        results: data.data,
			        pagination: {
			          more: (params.page * 30) < data.total_count
			        }
			      };
			    },
			    cache: true
			  },
			  escapeMarkup: function (markup) { return markup; },
			  minimumInputLength: 1,
			  allowClear: true,
			  templateResult: formatResult,
			  templateSelection: formatSelection,
			});

			$(".addOther").select2({
				ajax: {
			    url: "{{ url('admin/fireteam/roleuserselectlist') }}",
			    dataType: 'json',
			    delay: 250,
			    data: function (params) {
			      return {
			        q: params.term, // search term
			        page: params.page,
			        role: 'User'
			      }
			    },
			    processResults: function (data, params) {
			      // parse the results into the format expected by Select2
			      // since we are using custom formatting functions we do not need to
			      // alter the remote JSON data, except to indicate that infinite
			      // scrolling can be used
			      params.page = params.page || 1;

			      return {
			        results: data.data,
			        pagination: {
			          more: (params.page * 30) < data.total_count
			        }
			      };
			    },
			    cache: true
			  },
			  escapeMarkup: function (markup) { return markup; },
			  minimumInputLength: 1,
			  allowClear: true,
			  templateResult: formatResult,
			  templateSelection: formatSelection,
			});


			function formatResult (result) {
				if(result.text){
					var $result = $('<span>' +result.text +'</span>');
				}else{
					var roles = '';
					var resultRoles = result.roles;
					var count = resultRoles.length;
					var i = 1;
					var bar = ' | ';
					$.each(resultRoles, function(key, role){
						if(count == i){bar = '';}
						roles += '<strong>'+role.name+bar+'</strong>';
						i++;
					});
					var $result = $(''+
						'<div class="select2result clearfix">'+
							'<span class="pull-left">'+
								'<img src="'+result.avatar+'" alt="" class="img-responsive">'+
							'</span>'+
							'<div class="select2info clearfix">'+
								'<strong>'+result.name+'</strong><br/>'+
								'<strong>'+result.email+'</strong><br/>'+
								roles+
							'</div>'+
						'</div>');
				}

				return $result;
			};

			function formatSelection (result) {
				var $result = $('<span>'+result.name+'</span>');

				return $result;
			};

		});

	</script>

@stop
