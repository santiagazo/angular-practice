@extends('layouts.user.main')

@section('title')

@endsection

@section('css')
	<link rel="stylesheet" href="{{ url('assets/plugins/owl-carousel3/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/select2-master/dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/jquery-ui/jquery-ui.min.css') }}">

	<style>
		.input-section {
			margin-top: 2px;
			border: 1px solid #bbb;
			padding-top: 10px;
			overflow: auto;
		}
		.document-section {
			border: 1px solid #bbb;
		}

		.document-section img {
			background-color: #fff;
			margin-top: 15px;
			margin-bottom: 15px;
		}

		.all-documents-section {
			border: 1px solid #bbb;
			overflow: auto;
		}

		.all-documents-section .each-document-box {
			margin: 15px;
			position: relative;
		}

		.each-document-box img {
			background-color: #fff;
		}

		.bottom-triangle{
			position: absolute;
		    width: 50px;
			height: 50px;
			top: -51px;
			background: #173353;
			-webkit-clip-path: polygon(0 0, 0% 100%, 100% 100%);
			clip-path: polygon(0 0, 0% 100%, 100% 100%);
			padding: 25px 0 0 10px;
			color: #fff;
			font-weight: 300;
			z-index: 20;
		}

		.bottom-triangle.three-digit-padding{
			padding: 25px 0 0 4px;
		}

		.active-triangle {
			background: #f47f20;
		}

		.select2result img{
			width: 35px;
		}
		.select2result .select2info{
			padding: 0px 10px 2px 10px;
			margin-left: 36px;
		}

		.select2-container--default .select2-selection--multiple {
		    border-radius: 0px;
		}

		.label{
			margin-right: 2px;
			margin-bottom: 5px;
		}

		.input-draggable{
			cursor: pointer;
			z-index: 1000;
		}


	</style>
@stop

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="">
			<div class="col-md-2 input-section">






				<div class='form-group'>
					{!! Form::label('fireteam', 'Select Your Fireteam:') !!}
					{!! Form::select('fireteam', [], null, ['class' => 'form-control addFireteam', 'style' => 'width:100%']) !!}
				</div>

				<div class='form-group userSelector' style='display: none'>
					{!! Form::label('user', 'Select a Member:') !!}
					{!! Form::select('user', [], null, ['class' => 'form-control selectUser', 'style' => 'width:100%']) !!}
				</div>

				<ul class="list-unstyled draggable-inputs-section" style='display: block'>
					<li class="list-group-item"><span class="signature label label-warning input-draggable"><i class='fa fa-pencil'></i> Signature</span></li>
					<li class="list-group-item"><span class="signature label label-warning input-draggable"><i class='fa fa-pencil'></i> Initial</span></li>
					<li class="list-group-item"><span class="signature label label-warning input-draggable"><i class='fa fa-pencil'></i> Optional Signature </span></li>
					<li class="list-group-item"><span class="signature label label-warning input-draggable"><i class='fa fa-pencil'></i> Optional Initial</span></li>
					<li class="list-group-item"><span class="signature label label-warning input-draggable"><i class='fa fa-paperclip'></i> Signer Attachment</span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable">Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class='fa fa-caret-down'></i></span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-pencil-square-o'></i> Full Name</span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-building'></i> Company</span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-calendar-o'></i> Date Signed</span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-check'></i> Approve</span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-times'></i> Decline</span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-pencil-square-o'></i> Data Field</span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-check-square-o'></i> Check Box</li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-dot-circle-o'></i> Radio Button</li>
					<li class="list-group-item"><span class="label label-warning input-draggable">Drop Down &nbsp;&nbsp;&nbsp; <i class='fa fa-caret-down'></i></span></li>
					<li class="list-group-item"><span class="label label-warning input-draggable"><i class='fa fa-pencil-square-o'></i> Note</span></li>
				</ul>



			</div>
		</div>
		<div class="">
			<div class="col-md-8 document-section document-droppable">
				<div>
					@foreach($documents as $document)
						<img src="{{ url('document/mediacollection/'.$document->collection.'/'.$document->id) }}" class="img-responsive" alt="">
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-2 all-documents-section scrollRightCarousel off">
			<?php $count = 1 ?>
			@foreach($allDocuments as $eachDocument)
			<div class="item">
				<a href="{{ url('document/edit/'.$eachDocument->collection.'?'.'dMcSN0='.$eachDocument->id.'&page='.$count) }}" class="each-document-box">
					<img src="{{ url('document/mediacollection/'.$eachDocument->collection.'/'.$eachDocument->id) }}" class="img-responsive" alt="">
					<span class="bottom-triangle triangle-{{ $eachDocument->id }} {{ strlen($count) > 2 ? 'three-digit-padding' : '' }}">{{ $count }}</span>
				</a>
				<?php $count++ ?>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

@section('js')
	<script src="{{ url('assets/plugins/owl-carousel3/owl.carousel.js') }}"></script>
	<script src="{{ url('assets/plugins/select2-master/dist/js/select2.full.js') }}"></script>
	<script src="{{ url('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script>
		$(function(){

    		$( ".input-draggable" ).draggable({
    			containment: '#main',
    			cursor: 'move',
    			snap: '.document-section',
    			helper: 'clone',
    			appendTo: 'body',
    			stop: function(event, ui){
    				var droppedPosition = $(this).position();
    				console.log($(this));
    				console.log(droppedPosition);
    			}
    		});

			$('.document-droppable').droppable({
				drop: handleDropEvent
			});

			function handleDropEvent( event, ui ) {
			  console.log(event);
			  console.log(ui);
			  console.log($('.document-droppable').position());
			}

			$(".addFireteam").select2({
			  ajax: {
			    url: "{{ url('document/fireteamselectlist') }}",
			    dataType: 'json',
			    delay: 250,
			    data: function (params) {
			      return {
			        q: params.term, // search term
			        page: params.page,
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
			  templateResult: formatFireteamResult,
			  templateSelection: formatSelectionAndGetInputs,
			});

			function formatFireteamResult(result) {
				if(result.text){
					var $result = $('<span>' +result.text +'</span>');
				}else{
					var users = '';
					var leader = result.leader;
					var resultUsers = result.users;
					var count = resultUsers.length;
					var i = 1;
					var bar = '';
					$.each(resultUsers, function(key, user){
						if(i % 2 == 0){bar = '<br/>'}else{bar = ''}
						if(count == i){bar = '';}
						users += '<span class="label label-primary">'+user.name+'</span>'+bar;
						i++;
					});
					var $result = $(''+
						'<div class="select2result clearfix">'+
						'<strong>'+result.title+'</strong><br/>'+
							'<span class="pull-left">'+
								'<img src="'+result.leader.avatar+'" alt="" class="img-responsive">'+
							'</span>'+
							'<div class="select2info clearfix">'+
								'<span><strong>Owner: </strong>'+result.leader.name+'</span><br/>'+
								'<span><strong>Members: </strong></span><br/>'+
							'</div>'+
							'<div class="select2Members">'+
								'<span>'+users+'</span>'+
							'</div>'+
						'</div>');
				}

				return $result;
			};

			function formatSelectionAndGetInputs(result) {
				var $result = $('<span>'+result.title+'</span>');
				var usersArray = [];
				$.each(result.users, function(key, user){
					usersArray.push(user.id);
				});
				getInputFields(usersArray);
				return $result;
			};

			function getInputFields(usersArray){
				$('.userSelector').fadeIn();
				$('.selectUser').click(function(){
					console.log('here');
				});
				console.log(usersArray);
				$(".selectUser").select2({
				  ajax: {
				    url: "{{ url('/document/fireteammembers') }}",
				    dataType: 'json',
				    delay: 250,
				    data: function (params) {
				      return {
				        q: params.term, // search term
				        page: params.page,
				        usersArray: usersArray
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
				  templateResult: formatMemberResult,
				  templateSelection: formatMemberSelection,
				});
			}

			function formatMemberResult(result) {
				if(result.text){
					var $result = $('<span>' +result.text +'</span>');
				}else{
					var roles = '';
					var resultRoles = result.roles;
					var count = resultRoles.length;
					var i = 1;
					var bar = '';
					$.each(resultRoles, function(key, role){
						if(i % 2 == 0){bar = '<br/>'}else{bar = ''}
						if(count == i){bar = '';}
						roles += '<span class="label label-primary">'+role.name+'</span>'+bar;
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
							'</div>'+
							roles+
						'</div>');
				}

				return $result;
			};

			function formatMemberSelection(result) {
				var $result = $('<span>'+result.name+'</span>');
				$('.draggable-inputs-section').fadeIn();
				return $result;
			};




			@foreach($documents as $document)
				$('.triangle-{{ $document->id }}').addClass('active-triangle');
			@endforeach
			manageDocumentDimensions();
			$( window ).on('load', function(){
				manageDocumentDimensions();
			});

            $( window ).resize(function() {
                manageDocumentDimensions();
            });

            function findDocumentDimensions(){
                var fullWidthContainer = $('#main').width();
                var documentHeight = $('.document-section').height();

                var dimensions = new Object;
                dimensions['fullWidthContainer'] = fullWidthContainer;
                dimensions['documentHeight'] = documentHeight;

                return dimensions;
            }

            function manageDocumentDimensions(){
                var dimensions = findDocumentDimensions();
                if( dimensions.fullWidthContainer <= 991 ){
                    scrollRightPagination(dimensions);
                } else {
                    scrollUpPagination(dimensions);
                }
            }

            function scrollRightPagination(dimensions){
                if(!$('.document-section').hasClass('scrollRightView')){
                	$('.document-section').addClass('scrollRightView');
                	$('.all-documents-section').height('auto');
                    $('.input-section').height('auto');
                    $('.scrollRightCarousel').removeClass('off');
                    owlInit();
                }
            }

            function scrollUpPagination(dimensions){
                	$('.document-section').removeClass('scrollRightView');
                	$('.all-documents-section').height(Math.floor(dimensions.documentHeight)+'px');
                    $('.input-section').height(Math.floor(dimensions.documentHeight-10)+'px');
                    if(!$('.scrollRightCarousel').hasClass('off')){
                    	$('.scrollRightCarousel').addClass('off');
                    	$('.scrollRightCarousel').trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
						$('.scrollRightCarousel').find('.owl-stage-outer').children().unwrap();
                    }
            };

            function owlInit(){
            	var owl = $('.scrollRightCarousel');
            		owl.owlCarousel({
            		loop: true,
            		margin: 10,
            		nav: false,
            		callbacks: true,
				    responsive:{
				        0:{
				            items:4
				        },
				        600:{
				            items:6
				        }
				    },
				})

            }

		});

	</script>

@stop
