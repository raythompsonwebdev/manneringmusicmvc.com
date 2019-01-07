  	$(document).ready(function(){
            
		$(".grid_1_of_5").on('mouseenter', function () {

			$(this).find('figcaption.cap_1_of_5 form#front-btn').css({'opacity' : '1','top':'0px'}).slideDown('100', 'swing');
						
			$(this).find('figcaption.cap_1_of_5 form#front-btn').css({'opacity' : '1','top':'0px'}).slideDown('100', 'swing');

		});
		
		$(".grid_1_of_5 ").on('mouseleave', function () {
			
			$(this).find('figcaption.cap_1_of_5 form#front-btn').css({'opacity' : '1','top':'-40px'}).slideUp('100', 'swing');
			
		});
     
	});

