$(document).ready(function () {
    var tab = $('li.tabs a');
	tab.on('click', function(e){
		e.preventDefault();
		var a = $(this).data("toggle");
		var id = $(this).data("id");
		if (a == "tab") {
			$('li.tabs').removeClass('active');
			$('.tab-panel').removeClass('active');		
			$(this).parent().addClass('active');
			$("#"+id).addClass('active');
		}		
	});
});