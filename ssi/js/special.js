
jQuery(document).ready(function() {	
    jQuery("#viewport").mapbox();
    jQuery(".map-control a").click(function() {
		var viewport = $("#viewport");
		if(this.className == "back") {
			viewport.mapbox(this.className, 2);
		}
		else {
			viewport.mapbox(this.className);
		}
		return false;
	});

	jQuery(".fields_inner .category").click(function() {
		var first = jQuery("#hd_first").val();
		var id = jQuery(this).attr("data-id");
		if (first == "1"){
	        jQuery( "." + id ).toggle();
	        if (jQuery(this).parent().hasClass("active")){
	        	jQuery(this).parent().removeClass("active");
	        }
	        else{
	        	jQuery(this).parent().addClass("active");
	        }
		}else{
			if (id == "red"){
				jQuery( ".yellow" ).toggle();
				jQuery( ".blue" ).toggle();	
				jQuery(".field_title_2").addClass("active");
				jQuery(".field_title_3").addClass("active");
			}
			else if (id == "yellow"){			
				jQuery( ".red" ).toggle();
				jQuery( ".blue" ).toggle();
				jQuery(".field_title_1").addClass("active");
				jQuery(".field_title_3").addClass("active");
			}
			else if (id == "blue"){			
				jQuery( ".red" ).toggle();
				jQuery( ".yellow" ).toggle();		
				jQuery(".field_title_1").addClass("active");
				jQuery(".field_title_2").addClass("active");				
			}
			jQuery("#hd_first").val("1");
		}		
		
	});

});

$(document).ready(function(){
	if( jQuery(window).width() > 767 ) {
		$(".inline").colorbox({inline:true, width:"750px", height:"400px"});
	}
	else{
        $(".inline").colorbox({inline:true, width:"100%", height:"auto"});
	}
    
});

// $(function(){
//      $(".tooltip a").hover(function() {
//         $(this).next("span").animate({opacity: "show"}, "slow");}, function() {
//                $(this).next("span").animate({opacity: "hide"}, "fast");
//      });
// });
