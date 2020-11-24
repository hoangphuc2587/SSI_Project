
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
		var id = jQuery(this).attr("data-id");
        jQuery( "." + id ).toggle();
        if (jQuery(this).parent().hasClass("active")){
        	jQuery(this).parent().removeClass("active");
        }
        else{
        	jQuery(this).parent().addClass("active");
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
