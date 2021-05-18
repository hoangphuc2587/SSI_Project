$(document).ready(function () {
	//Active menu
	$('.sidebar').removeClass('active');
	$('#menuUser').addClass('active');

	//Event when click Delete button
	$("button[name='btnDeleteUser']").click(function(e) {

		var confirm = window.confirm('このユーザーを削除してよろしいですか？')
		if (confirm) {
            var row = $(this).closest('tr');
			//get UserId 
			var userId = row.find('td.userId').text();
			var postData = { 
				userId:userId
			};
			//Call ajax for delete user
			$.ajax({
				type:'POST',
				contentType: 'application/json',
				url: './?rt=loginUserList/deleteUser',
				dataType: "json",
				data:JSON.stringify(postData),
				success:function(response) {
					//alert(response.result);
					if(response.result == "NOLOGIN"){
						window.location.replace("./?rt=login");
					}
					if(response.result == "LOGINOK" && response.return){
						row.remove();
					}
				},
		        error: function() {
		            alert("サーバエラー");
	            }
			});		
        }else{
        	e.preventDefault();
        }
		
		e.stopPropagation();
    });



	//Add new user button click
	$("#btnAddUser").click(function() {
		window.location.replace("./?rt=userDetail");
    });

	//Table user list row click event
	$("#tblUserList > tbody > tr").click(function(e) {
		//Get userId
		var userId = $(this).find('td.userId').text();
		window.location.replace("./?rt=userDetail&userId=" + userId);
		e.stopPropagation();
    });

}); 
		