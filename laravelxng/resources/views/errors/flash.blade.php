@if($errors->has())
	<div id="form-errors" class="alert alert-danger">
		<p>The following errors have occurred:</p>

		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div><!-- end form-errors -->
@endif

@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! Session::get('flash_notification.message') !!}
        </div>
    @endif
@endif

<div class="alert" id='jsFlash' style='display:none'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   	<ul class='list-unstyled' id="jsFlash-message"></ul>
</div>


@section('jsFlash')

	<script>


		function jsFlash(priority, message, fadeOut){
			// remove any class that starts with 'alert-'.
			$('#jsFlash').removeClass(function (index, css) {
			    return (css.match (/(^|\s)alert-\S+/g) || []).join(' ');
			});
			// Allow the use of laracasts syntax to use error instead of danger.
			if(priority == 'error'){
				var priority = 'danger';
			}
			// hide any previously pending alerts that the user didn't close so they don't pile up.
			// add the appropriate alert priority (success/danger/info/warning).
			$('#jsFlash').hide().addClass('alert-'+priority);
			// add the message.
			$('ul#jsFlash li').remove();
	 		$('#jsFlash-message').html(message);
	 		// if fadeOut is set to true have the message flash and then disappear.
	 		if(fadeOut == true){
		 		$('#jsFlash').show().delay(3000).fadeOut();
	 		}else{
	 			$('#jsFlash').show();
	 		}
		}


	</script>


	<script>


			// function fadeOut(el){
			//   el.style.opacity = 1;

			//   (function fade() {
			//     if ((el.style.opacity -= .1) < 0) {
			//       el.style.display = "none";
			//     } else {
			//       requestAnimationFrame(fade);
			//     }
			//   })();
			// }


			// function jsFlash(priority, message, fadeOut){
			// 	// remove any class that starts with 'alert-'.
			// 	var jsFlash = document.getElementById('jsFlash');
			// 	var jsFlashMessage = document.getElementById('jsFlash-message');
			// 	jsFlash.classList.remove(function(index, css){
			// 	    return (css.match(/(^|\s)alert-\S+/g) || []).join(' ');
			// 	});
			// 	// hide any previously pending alerts that the user didn't close so they don't pile up.
			// 	// add the appropriate alert priority (success/danger/info/warning).
			// 	[].forEach.call( document.querySelectorAll('#jsFlash'), function(el) {
			// 	  el.style.display = 'none';
			// 	});

			// 	jsFlash.classList.add('alert-'+priority);
			// 	// add the message.
		 // 		jsFlashMessage.contentText(message);
		 // 		// if fadeOut is set to true have the message flash and then disappear.
		 // 		if(fadeOut == true){
		 // 			[].forEach.call( document.querySelectorAll('#jsFlash'), function(el) {
			// 		  el.style.display = 'block';
			// 		});

		 // 			window.setTimeout(fadeOut(jsFlash), 3000);

		 // 		}else{
		 // 			[].forEach.call( document.querySelectorAll('#jsFlash'), function(el) {
			// 		  el.style.display = 'block';
			// 		});
		 // 		}
			// }

	</script>

@stop
