
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/202012301711017728.jpeg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
    /*
        Form
    */
    $('.registration-form fieldset:first-child').fadeIn('slow');
    
    $('.registration-form input[type="text"], .registration-form input[type="password"], .registration-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    

    // next step
    $('.registration-form .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	
    	// parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function() {
    	// 	if( $(this).val() == "" ) {
    	// 		$(this).addClass('input-error');
    	// 		next_step = false;
    	// 	}
    	// 	else {
    	// 		$(this).removeClass('input-error');
    	// 	}
    	// });
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
	    		$(this).next().fadeIn();
	    	});
    	}
    	
    });


    
    // previous step
    $('.registration-form .btn-previous').on('click', function() {
    	$(this).parents('fieldset').fadeOut(400, function() {
    		$(this).prev().fadeIn();
    	});
    });
    
    // submit 
    $('.registration-form').on('submit', function(e) { 
    	
    	$(this).find('input[type="text"], input[type="password"],input[type="date"],  textarea').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error'); 



			// Email matched validation 
				
			if($("#email").val()!=$("#confirm-email").val()){
				e.preventDefault();
				$("#confirm-email").addClass('input-error');
				alert('Email not matched.');
				return false;
			} else {
				$("#confirm-email").removeClass('input-error'); 
			}

		     // password matched validation 

             if($("#password").val()!=$("#confirmpassword").val()){
				e.preventDefault();
				$("#confirmpassword").addClass('input-error');
				alert('password not matched.');
				return false;
			} else {
				$("#confirmpassword").removeClass('input-error'); 
			}


    		}
    	});  
    	
    });


	$('.registration-form1').on('submit', function(e) { 
    	
    	$(this).find('input[type="text"], input[type="password"]').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');  
    		}
    	});  
    	
    });


    
    
});
