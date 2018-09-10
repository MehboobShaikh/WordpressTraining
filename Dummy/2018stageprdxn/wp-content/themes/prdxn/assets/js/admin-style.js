(function($) {
$(window).on('load', function() {
	if($('#post #titlewrap #title').val() == 'Home' || $('#post #titlewrap #title').val() == 'Work') {
		$('#postbox-container-2').append('<a href="#" class="home_work">Click here to view all Work</a>');
		$('.home_work').attr('href',$('#menu-posts-work a.wp-first-item').attr('href'));
		$('#postbox-container-2').append('<a href="#" class="home_case">Click here to view all Case Studies</a>');
			$('.home_case').attr('href',$('#menu-posts-case_study a.wp-first-item').attr('href'));
	}
	else if($('#post #titlewrap #title').val() == 'Careers') {
		$('#postbox-container-2').append('<a href="#" class="home_careers">Click here to view all Careers</a>');
		$('.home_carrers').attr('href',$('#menu-posts-jobpost a.wp-first-item').attr('href'));
	}
	else if($('#post #titlewrap #title').val() == 'Services') {
		$('#postbox-container-2').append('<a href="#" class="home_services">Click here to view all Services</a>');
		$('.home_services').attr('href',$('#menu-posts-service a.wp-first-item').attr('href'));
	}


	$('#post #titlewrap #title').on('keyup',function() {
		if($(this).val() == 'Home' ||  $(this).val() == 'Work') {
			$('#postbox-container-2 ').append('<a href="#" class="home_work">Click here to view all Work</a>').append('<a href="#" class="home_case">Click here to view all Case Studies</a>');
			$('.home_work').attr('href',$('#menu-posts-work a.wp-first-item').attr('href'));
			$('.home_case').attr('href',$('#menu-posts-case_study a.wp-first-item').attr('href'));
		}
		else if($(this).val() == 'Careers') {
		$('#postbox-container-2').append('<a href="#" class="home_careers">Click here to view all Careers</a>');
		$('.home_carrers').attr('href',$('#menu-posts-jobpost a.wp-first-item').attr('href'));
	}
	else if($(this).val() == 'Services') {
		$('#postbox-container-2').append('<a href="#" class="home_services">Click here to view all Services</a>');
		$('.home_services').attr('href',$('#menu-posts-service a.wp-first-item').attr('href'));
	}
	else {
		$('.home_work').remove();
		$('.home_case').remove();
		$('.home_carrers').remove();
		$('.home_services').remove();
	}
	});

});
})(jQuery);