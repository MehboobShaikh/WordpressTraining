jQuery(function($){
	var canBeLoaded = true,
	    bottomOffset = 750;
 
	$(window).scroll(function(){
		var data = {
			'action': 'loadmore',
			'query': firsttheme_loadmore_params.posts,
			'page' : firsttheme_loadmore_params.current_page
		};
		if( ($(document).scrollTop() > (($(document).height()) - bottomOffset)) && canBeLoaded == true ){
			$.ajax({
				url : firsttheme_loadmore_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function(){
					var preloader = '';
					preloader += '<div class="preloader" id="preloader">';
					preloader += '<i></i><i></i><i></i><i></i><i></i>';
					preloader += '</div>';
					preloader += '<p id="preloader_info">Loading More Post Wait...</p>';
					$('.article-container').find('article:last-of-type').after( preloader );
					canBeLoaded = false;
				},
				error: function(xqhr, status, err){
					console.log("XHQR: " + xqhr);
					console.log("Status: " + status);
					console.log("Error: " + err);
				},
				success:function(data){
					setTimeout(function(){
						console.log(data);
						if( data ) {
							$('#preloader').remove();
							$('#preloader_info').remove();
							$('.article-container').find('article:last-of-type').after( data ); 
							canBeLoaded = true;
							firsttheme_loadmore_params.current_page++;
						}
					},2000);
					if( !data && $('#preloader') ){
						$('#preloader').remove();
						$('#preloader_info').remove();
					}
				}
			});
		}
	});
});