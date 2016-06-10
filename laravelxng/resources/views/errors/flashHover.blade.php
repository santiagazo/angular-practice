<style>
	.hover-shadow,
	.hover-shadow-fade{
		position: absolute;
		top: 2%;
		left: 50%;
		-webkit-transform: translate(-50%, -2%);
      	-ms-transform: translate(-50%, -2%);
        transform: translate(-50%, -2%);
		-webkit-box-shadow: 0px 0px 11px -2px rgba(92,92,92,1);
		-moz-box-shadow: 0px 0px 11px -2px rgba(92,92,92,1);
		box-shadow: 0px 0px 11px -2px rgba(92,92,92,1);
		z-index: 1000;
	}
	.hover-shadow .alert,
	.hover-shadow-fade .alert{
		margin-bottom: 0;
	}

</style>
@if($errors->has())
	<div class="hover-shadow">
		<div id="form-errors" class="alert alert-danger">
			<button type="button" class="close" data-dismiss="hover-shadow" aria-hidden="true">&nbsp; &times;</button>
			<p>The following errors have occurred:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
	</div>
@endif

@if (Session::has('flash_notification.message'))
	<div class="hover-shadow-fade">
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="hover-shadow" aria-hidden="true">&nbsp; &times;</button>
            {!! Session::get('flash_notification.message') !!}
        </div>
	</div>
@endif

<div class="hover-shadow-fade" id='jsFlash' style="display: none;">
    <div class="alert ">
        <button type="button" class="close" data-dismiss="hover-shadow" aria-hidden="true">&nbsp; &times;</button>
        <div id="jsFlash-message"></div>
    </div>
</div>

@section('jsFlash')
	<script>
		$(function(){
			$('.hover-shadow-fade').delay(8000).fadeOut(300);
			$('body').on('click', '[data-dismiss=hover-shadow]', function(){
				$('.hover-shadow, .hover-shadow-fade').remove();
			});
		});

		function jsFlash(priority, message, fadeOut){
			// remove any class that starts with 'alert-'.
			$('#jsFlash').removeClass(function (index, css) {
			    return (css.match (/(^|\s)alert-\S+/g) || []).join(' ');
			});
			// hide any previously pending alerts that the user didn't close so they don't pile up.
			// add the appropriate alert priority (success/danger/info/warning).
			$('#jsFlash').hide().find('.alert').addClass('alert-'+priority);
			// add the message.
	 		$('#jsFlash-message').text(message);
	 		// if fadeOut is set to true have the message flash and then disappear.
	 		if(fadeOut == true){
		 		$('#jsFlash').show().delay(3000).fadeOut();
	 		}else{
	 			$('#jsFlash').show();
	 		}
		}
	</script>
@stop

