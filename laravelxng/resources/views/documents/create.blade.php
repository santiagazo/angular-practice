@extends('layouts.user.main')

@section('title')
	Create Document
@endsection

@section('css')
	<link rel="stylesheet" href="{{ url('assets/plugins/dropzone-4.3.0/dist/dropzone.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/pages/document_create.css') }}">
@stop

@section('content')
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="progress-section btn-group btn-group-justified">
						<div class="btn btn-blue btn-block" id='add-metadata-btn'>Add File Info</div>
						<div class="btn btn-blue btn-block disabled" id='add-file-btn'>Upload File</div>
						<div class="btn btn-blue btn-block disabled" id='verify-documents-btn'>Verify Documents</div>
					</div>
				</div>
			</div>

			<div class="form-section add-metadata-section" style="">
				<div class="row">
					<div class="col-md-12">
						<div class="completed-message">File Info Status: <span class="color-green">Completed!</span></div>
						<div class="uncompleted-form-section clearfix">
							<div class="add-metadata-form">
								<!--Text form input-->
								<div class="col-md-12">
									<div class='form-group'>
										{!! Form::label('title', 'File Name') !!}<span class="color-red">*</span>
										{!! Form::text('title', null, ['class' => 'form-control']) !!}
									</div>
								</div>
								<!--Textarea form input-->
								<div class="col-md-12">
									<div class="form-group">
										{!! Form::label('description', 'Description or Instructions') !!}
										{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
									</div>
								</div>
								<!--Submit form input-->
								<div class="col-md-12 clearfix">
									<div class="form-group">
										{!! Form::submit('Save', ['class' => 'btn btn-blue pull-right', 'id' => 'add-metadata-save']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="add-file-section" style='display:none;'>
				<div class="row">
					<div class="col-md-12">
						<div class="completed-message">File Upload Status: <span class="color-green">Completed!</span></div>
						<div class="dropzone-previewer">
							<div class="dropzone-absoluter">
								<div id="fileDropzone" class="dropzone hoverable dropzone-box"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="form-section verify-documents-section" style='display: none'>
				<div class="row">
					<div class="col-md-12">
						<div class="verify-documents-previewer">
							<img src="#" id='verifyImage' class="img-responsive" alt="">
							<div class="verify-documents-underlayer">
								<div class="verify-documents-cover">
									<div class="verify-documents-info-box">
										<h3>Document Name: <span id='doc-name'></span></h3>
										<h4>Number of Uploaded Pages: <span id='doc-pages'></span></h4>
										<h5>Are you ready to add Signature Capture Feilds?</h5>
										<div class="verify-documents-options">
											<button class="btn btn-danger margin-bottom-5" id='deleteCollection' data-collection='#'>Delete and Start Over</button>
											<button class="btn btn-success margin-bottom-5" id="addSignatures" data-collection="#">Add Signature Captures</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

@endsection

@section('js')
	<script type="text/javascript" src="{{ url('assets/plugins/dropzone-4.3.0/dist/dropzone.js') }}"></script>

	<script>
		function findSizes(){
			var imgHeight = $('#verifyImage').height();
			var infoBoxHeight = $('.verify-documents-info-box').height();
			// var dropzoneHeight = $('.dropzone-box').height();

			var heights = new Object;
			heights['imgHeight'] = imgHeight;
			heights['infoBoxHeight'] = infoBoxHeight;
			// heights['dropzoneHeight'] = dropzoneHeight;

			return heights;
		}

		function manageSizes(){
			var heights = findSizes();
		  	var middleHeight = (heights.imgHeight - heights.infoBoxHeight)/2;
		  	$('.verify-documents-cover').height(heights.imgHeight);
		  	$('.verify-documents-info-box').css({'margin': middleHeight+'px auto'});
		  	// $('.dropzone-cover').height(dropzoneHeight);
		}

		$( window ).resize(function() {
			manageSizes();
		});

		function getFileInfo(){
			title = $('[name="title"]').val();
			description = $('#description').val();

			var fileInfo = new Object;
			fileInfo['title'] = title;
			fileInfo['description'] = description;
			return fileInfo;
		}

		$(function(){

			$('body').on('click', '#add-metadata-save', function(){
				getFileInfo();

				if(title.length == 0){
					jsFlash('error', '<li>The File Name is required.</li>');
					return;
				}

				$.ajax({
					url: "{{ url('/document/store') }}",
					type: 'POST',
					data: {
						title: title,
						description: description
					},
					success: function (response) {
						console.log(response);
						var response = $.parseJSON(response);
						if (typeof response == "string") {
							$('.add-metadata-section .uncompleted-form-section').delay('800').slideToggle('slow');
				            $('.add-metadata-section').addClass('completed');
				            $('.add-metadata-section .completed-message').delay('1500').slideToggle('fast');
				            $('.add-file-section').delay('2000').slideToggle('fast', function(){
					        	$('.progress-section #add-file-btn').removeClass('disabled');
					        	// $('.dropzone-box').css({'min-height':'161px'});
				            });
						} else if (typeof response == "object") {
							console.log(response);
						}
					},
					error: function (xhr) {
						if(xhr.status == 422){
							var errors = jQuery.parseJSON(xhr.responseText);
							var messages = '';
							$.each(errors, function(key, errorMessage){
								$.each(errorMessage, function(index, message){
									messages += '<li>'+message+'</li>';
								});
							});
							jsFlash('error', messages);
						}else{
							console.log(xhr);
						}
					}
				});
			});

			$("div#fileDropzone").dropzone({
			    url: "{{ url('document/store') }}",
			    method: "POST",
			    uploadMultiple: false,
			    headers: {
			      'X-CSRF-TOKEN': '{{ csrf_token() }}',
			    },
			    maxFiles: 1,
			    dictMaxFilesExceeded: 'Only 1 file at a time is allowed.',
			    init: function() {
			    	  this.on("addedfile", function(){
				    	  	getFileInfo();
				    	  	$('.dropzone-box').removeClass('hoverable');
				    	  	$('.dropzone.dz-started').append(''+
								'<div class="dropzone-message">'+
									'<span class="fa fa-circle-o-notch fa-5x fa-spin"></span>'+
									'<div class="dropzone-response-block">'+
										'<div class="dropzone-response">Upload in Progress...</div>'+
										'<div class="dropzone-response">Hang tight. We\'re working on it...</div>'+
										'<div class="dropzone-response">Wow, this is a BIG file.</div>'+
										'<div class="dropzone-response">Everything is still working, don\'t quit now.</div>'+
										'<div class="dropzone-response">I stand corrected, this is a REALLY BIG file.</div>'+
										'<div class="dropzone-response">I hope this document makes you lots of money.</div>'+
										'<div class="dropzone-response">"Are we there yet?!" No. I\'ll let you know when we are.</div>'+
										'<div class="dropzone-response">We\'ll be done soon. Maybe.</div>'+
									'</div>'+
								'</div>');

				    	  	$('.dropzone-response:nth-child(1)').fadeToggle('slow', 'linear');

				    	  	var responseCount = $('.dropzone-response-block').children().length;
							var i = 1;
							var interval = 15000;

				    	  	setInterval(rotateResponse, interval);

							function rotateResponse(){
								console.log(i);
								if(i == responseCount){
							  		i = 1;
							  		$('.dropzone-response:nth-child('+responseCount+')').fadeToggle('fast', function(){
										$('.dropzone-response:nth-child('+i+')').fadeToggle('slow', function(){
											window.clearInterval(rotateResponse);
										});
									});
							  	}else{
									$('.dropzone-response:nth-child('+i+')').fadeToggle('fast', function(){
										$(this).next().fadeToggle('slow', 'linear', function(){
										  	i++;
										});
									});
							  	}
							}
			    	  });
			          this.on("maxfilesexceeded", function(file) {
			                this.removeAllFiles();
			                this.addFile(file);
			          });
			    },
			    sending: function(file, xhr, formData){
				  	formData.append('title', title);
				  	formData.append('description', description);
			    },
			    addRemoveLinks: true,
			    success: function (file, response) {
			    		var response = $.parseJSON(response);
			            getMedia(response.collection);
			            $('#doc-name').text(response.name+'.pdf');
			            $('#doc-pages').text(response.totalNumberOfPages);
			            $('.dropzone-message').remove();
			            $('.dropzone.dz-started').append(''+
							'<div class="dropzone-message">'+
								'<span class="fa fa-check fa-5x color-green"></span>'+
								'<div class="dropzone-response-block">'+
									'<div class="dropzone-response done" style="display:block">Done!</div>'+
								'</div>'+
							'</div>');
			            $('#deleteCollection').attr('data-collection', response.collection);
			            $('#addSignatures').attr('data-collection', response.collection);
			        },
			        error: function (file, response) {
			            file.previewElement.classList.add("dz-error");
			        }
			  });
			Dropzone.autoDiscover = false;
			$('.dz-default.dz-message').prepend('<div class="fa fa-plus-circle fa-5x"></div>');

		});

		$('body').on('click', '#deleteCollection', function(){

			var collection = $(this).data('collection');

			swal({
				title: "Are you sure?",
				text: "Are you sure you want to delete this and start over?",
				type: "warning",
				animation: false,
				showCancelButton: true,
				confirmButtonColor: "#D9534F",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false },
				function(){
					$.ajax({
						url: "{{ url('/document/destroy') }}",
						type: 'GET',
						data: {
							collection: collection,

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
										console.log('message = '+message);
											messages += '<li>'+message+'</li>';
									});
								});
								console.log('messages = '+messages)
								jsFlash('error', messages, false);
							}else{
								console.log(xhr);
							}
						}
					});
			});

		});

		$('body').on('click', '#addSignatures', function(){
			var collection = $('#addSignatures').data('collection');
			location.href = '{{ url('document/edit') }}/'+collection;
		});

		function getMedia(collection){
				  console.log(collection);
			      var url = '{{ url('document/firstmedia') }}/'+collection;
			      $.ajax({
			          url : url,
			          cache: true,
			          processData : false,
			      }).always(function(response){
			          $("#verifyImage").attr("src", url).fadeIn();
					  $('.add-file-section .dropzone-box').delay('800').slideToggle('slow');
					  $('.add-file-section').addClass('completed');
					  $('.add-file-section .completed-message').delay('1500').slideToggle('fast');
					  $('.verify-documents-section').delay('2000').slideToggle('fast', function(){
						  manageSizes();
					  });
					  $('.progress-section #verify-documents-btn').removeClass('disabled');
			      });
		}

	</script>

@stop
