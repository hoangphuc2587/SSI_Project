jQuery(document).ready(function($){

	
	//Update role button click event
	$( "#btnUpdateRole" ).click(function() {
		var postData = {
        	updateRole:'updateRole',
			userId:'user1',
			role:'5'
        };	
		//Call ajax for update Display Flag to DB
		$.ajax({
			type:'POST',
			contentType: 'application/json',
			url: './?rt=test/getRequest',
			dataType: "json",
			data:JSON.stringify(postData),
				success:function(response) {
					alert('update success!');
				},
	            error: function() {
	                //alert("サーバエラー");
	            }

		});		
   
	});

		//Event when click Delete button
	$("button[name='btnDeleteUser']").click(function(e) {

		if (confirm('Some message')) {
		    alert('Thanks for confirming');
		} else {
		    alert('Why did you press cancel? You should have confirmed');
		}
		// var row = $(this).closest('tr');
		// //get UserId 
		// var userId = row.find('td.userId').text();
		// var postData = { 
		// 	userId:userId
		// };
		// //Call ajax for delete user
		// $.ajax({
		// 	type:'POST',
		// 	contentType: 'application/json',
		// 	url: './?rt=loginUserList/deleteUser',
		// 	dataType: "json",
		// 	data:JSON.stringify(postData),
		// 	success:function(response) {
		// 		//alert(response.result);
		// 		if(response.result == "NOLOGIN"){
		// 			window.location.replace("./?rt=login");
		// 		}
		// 		if(response.result == "LOGINOK" && response.return){
		// 			row.remove();
		// 		}
		// 	},
	 //        error: function() {
	 //            alert("サーバエラー");
  //           }
		// });		
		e.stopPropagation();
    });

    	//Table user list row click event
	$("#tblUserList > tbody > tr").click(function(e) {
		var rowIndex = $(this).index();
		alert(rowIndex);
		e.stopPropagation();
    });

}); 
		