
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

	jQuery("#viewport-sp").mapbox();
    jQuery(".map-control a").click(function() {
		var viewport = $("#viewport-sp");
		if(this.className == "back") {
			viewport.mapbox(this.className, 2);
		}
		else {
			viewport.mapbox(this.className);
		}
		return false;
	});
	jQuery(".kurashi .process").scrollLeft(300);

	jQuery(".fields_inner .category").click(function() {
		var first = jQuery("#hd_first").val();
		var id = jQuery(this).attr("data-id");
		if (first == "1"){
			var oldActive = jQuery("#hd_active").val();
			if (oldActive != id){
				jQuery( "." + oldActive ).toggle();
		        jQuery( "." + id ).toggle();
		        if (jQuery(this).parent().hasClass("active")){
		        	jQuery(this).parent().removeClass("active");
		        }
		        else{
		        	jQuery(this).parent().addClass("active");
		        }

		        if (oldActive == 'red'){
		        	jQuery(".field_title_1").addClass("active");
		        }
		        else if (oldActive == 'yellow'){
		        	jQuery(".field_title_2").addClass("active");
		        }
		        else if (oldActive == 'blue'){
		        	jQuery(".field_title_3").addClass("active");
		        }
			}else{
                jQuery( "." + id ).toggle();
                jQuery( ".mark-kurashi").toggle();
                if (jQuery(".field_title_1").hasClass("active")){
                	jQuery(".field_title_1").removeClass("active");
                }
                if (jQuery(".field_title_2").hasClass("active")){
                	jQuery(".field_title_2").removeClass("active");
                }
                if (jQuery(".field_title_3").hasClass("active")){
                	jQuery(".field_title_3").removeClass("active");
                }
                jQuery("#hd_first").val("0");
			}			
		}else{
			if (id == "red"){
				jQuery( ".yellow" ).toggle();
				jQuery( ".blue" ).toggle();	
				jQuery( ".info" ).toggle();
				jQuery( ".line" ).toggle();
				jQuery(".field_title_2").addClass("active");
				jQuery(".field_title_3").addClass("active");
			}
			else if (id == "yellow"){			
				jQuery( ".red" ).toggle();
				jQuery( ".blue" ).toggle();
				jQuery( ".info" ).toggle();
				jQuery( ".line" ).toggle();
				jQuery(".field_title_1").addClass("active");
				jQuery(".field_title_3").addClass("active");
			}
			else if (id == "blue"){			
				jQuery( ".red" ).toggle();
				jQuery( ".yellow" ).toggle();
				jQuery( ".info" ).toggle();
				jQuery( ".line" ).toggle();
				jQuery(".field_title_1").addClass("active");
				jQuery(".field_title_2").addClass("active");				
			}
			jQuery("#hd_first").val("1");
		}
		jQuery("#hd_active").val(id);
		
	});

});

$(document).ready(function(){
	if( jQuery(window).width() > 767 ) {
		$(".inline").colorbox({inline:true, width:"700px", height:"370px"});
	}
	else{
        $(".inline").colorbox({inline:true, width:"100%", height:"460px"});
	}
});

// $(function(){
//      $(".tooltip a").hover(function() {
//         $(this).next("span").animate({opacity: "show"}, "slow");}, function() {
//                $(this).next("span").animate({opacity: "hide"}, "fast");
//      });
// });
