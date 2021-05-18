$(document).ready(function () {
	//Active menu
	$('.sidebar').removeClass('active');
	$('#menuUser').addClass('active');


	//Add new user button click
	$("#btnAddUser").click(function() {
		window.location.replace("./?rt=inquiryDetail");
    });

	//Table user list row click event
	$("#tblUserList > tbody > tr").click(function(e) {
		//Get userId
		var inquiryId = $(this).find('td.inquiryId').data('id');
		window.location.replace("./?rt=inquiryDetail&id=" + inquiryId);
		e.stopPropagation();
    });

}); 
		