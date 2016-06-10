$(function () {


	 $("#header-owl").owlCarousel({

          autoPlay : true,
          items : 9,
          pagination : false,
          itemsCustom : [[0, 3], [450, 3.25], [500, 4], [575, 5.25], [750, 6], [800, 7], [1080, 8], [1200, 9], [1300, 9], [1400, 10], [1550, 11], [1750, 12], [1875, 13]]

    });

    $('#header-owl').show();

    $('#header-owl').mouseover(function(){
    	$('.realPeople').fadeOut().css({zIndex: '-100'});
    });

    $('.realPeople').mouseover(function(){
        $('.realPeople').fadeOut().css({zIndex: '-100'});
    });

    $('#header-owl').mouseleave(function(){
    	$('.realPeople').css({'zIndex': '17'}).fadeIn();
    });

    $('.link img').mouseover(function(){
    	var $this = $(this);
    	var width = $this.width();
    	$this.addClass('masked');
    });

    $('.link img').mouseleave(function(){
    	var $this = $(this);
    	var width = $this.width();
    	$this.removeClass('masked');
    })

    $('.tipso-mipso').tipso({
    	background 		  : '#ffffff',
    	useTitle		  : false,
		tooltipHover      : true,
		position		  : 'bottom',
		width             : 250
	});

	$('.search-button').click(function(){
		$('.top-menu-absolute').animate({top:'40px'});
	});

	$('.search-close .icon-close').click(function(){
		$('.top-menu-absolute').animate({top: '5px'});
	});

    $('.launch-testimonial-modal').click(function(){
        alert('got-here');
    });

});





