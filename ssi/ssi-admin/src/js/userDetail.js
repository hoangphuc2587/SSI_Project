jQuery(document).ready(function($){

	//Active menu
	$('.sidebar').removeClass('active');
	$('#menuUser').addClass('active');

	// //Set role selected when first time display
	// if($('select[name=role]').length){
	// 	var userRole = $("#hdnRole").val();
	// 	if(userRole != ""){
	// 		$('select[name=role]').val(userRole).change();
	// 	}	
	// }
	

	//Event when click Update button
	$("#btnUpdateUser").click(function(e) {

		var strErr = inputCheck(false);
		if(strErr != ""){
			alert(strErr);
			return;
		}

		var confirm = window.confirm('このユーザーの情報を更新してよろしいですか？')
		if (confirm) {
			$('#btnUpdateUser').css('cursor', 'wait');
			$('body').css('cursor', 'wait');
			var userId = $('input[name=userId]').val();
			var oldUserId = $('input[name=oldUserId]').val();
			var oldMail = $('input[name=oldMail]').val();
			// var role = $("#hdnRole").val();
			var role = 1;
			var ckbSendMail = "0";
			var editMode = $("#hdnEditMode").val();
			// if($('select[name=role]').length){
			// 	role = $('select[name=role]').val();
			// }
			role = 1;
			if($('#ckbSendMail').is(':checked'))
			{
			   ckbSendMail = "1";
			}
			var postData = { 
				userId:userId,
            	oldUserId:oldUserId,
            	role:role,
            	mail: $('input[name=mail]').val(),
            	oldMail:oldMail,
            	password: $('input[name=password]').val(),
            	ckbSendMail: ckbSendMail,
            	editMode:editMode
			};
			
			//Call ajax for delete user
			$.ajax({
				type:'POST',
				contentType: 'application/json',
				url: './?rt=userDetail/updateUser',
				dataType: "json",
				data:JSON.stringify(postData),
				success:function(response) {
					if(response.result == "NOLOGIN"){
						window.location.replace("./?rt=login");
					}
					if(response.result == "LOGINOK"){
						if(response.return == '-1'){
							$('#btnUpdateUser').css('cursor', 'default');
							$('body').css('cursor', 'default');
							$('#errMessage').html("このIDまたはEメールは登録済みです。 別のメールアドレスまたはIDを入力してください。");
							e.stopPropagation();
						}
						if(response.return == '-2'){
							$('#btnUpdateUser').css('cursor', 'default');
							$('body').css('cursor', 'default');
							$('#errMessage').html("ユーザー情報の更新が失敗です。");//fail
							e.stopPropagation();
						}
						if(response.return == '1'){
							afterUpdateSuccess(userId, oldUserId);
						}
					}
				},
		        error: function(response) {

		            $("#errMessage").html(response.responseText);
	            }
			});		
        }else{
        	e.preventDefault();
        }
		
		//e.stopPropagation();
    });

	//Event when click Register button
	$("#btnInsertUser").click(function(e) {
		var strErr = inputCheck(true);
		if(strErr != ""){
			alert(strErr);
			
			return;
		}

		var confirm = window.confirm('アカウントを登録してしてよろしいですか？')
		if (confirm) {
			$('#btnInsertUser').css('cursor', 'wait');
			$('body').css('cursor', 'wait');
			var ckbSendMail = "0";
			// if($('select[name=role]').length){
			// 	role = $('select[name=role]').val();
			// }
			if($('#ckbSendMail').is(':checked'))
			{
			   ckbSendMail = "1";
			}
			var postData = { 
				userId:$('input[name=userId]').val(),
            	// role:$('select[name=role]').val(),
            	role: 1,
            	mail: $('input[name=mail]').val(),
            	password: $('input[name=password]').val(),
            	ckbSendMail: ckbSendMail
			};
			
			//Call ajax for delete user
			$.ajax({
				type:'POST',
				contentType: 'application/json',
				url: './?rt=userDetail/insertUser',
				dataType: "json",
				data:JSON.stringify(postData),
				success:function(response) {
					if(response.result == "NOLOGIN"){
						window.location.replace("./?rt=login");
					}
					if(response.result == "LOGINOK"){
						if(response.return == '-1'){
							$('#btnInsertUser').css('cursor', 'default');
							$('body').css('cursor', 'default');
							$('#errMessage').html("このIDまたはEメールは登録済みです。 別のメールアドレスまたはIDを入力してください。");//duplication id|| email
						}
						if(response.return == '-2'){
							$('#btnInsertUser').css('cursor', 'default');
							$('body').css('cursor', 'default');
							$('#errMessage').html("ユーザー情報の登録が失敗です。");//fail
						}
						if(response.return == '1'){
							alert("アカウントが登録されました。"); //User registration successful.
							window.location.replace("./?rt=loginUserList");
						}
					}
				},
		        error: function(response) {
		            alert("サーバエラー");
	            }
			});		
        }else{
        	e.preventDefault();
        }
		
		//e.stopPropagation();
    });

    $("#changePassword").click(function(e) {
    	$("#ipPass").css("display", "inline");
    	// alert('ddd');
    	$("#changePassword").css("display", "none");
    });
}); 

function inputCheck(isInsert){

	var userId = $('input[name=userId]').val();
	var mail = $('input[name=mail]').val();
	var newPassword = $('input[name=password]').val();
	var retypeNewPassword = $('input[name=retypePassword]').val();

	var strErr = "";

	//Require check
	strErr = requireCheck(isInsert, userId, newPassword, mail, retypeNewPassword);
	if(strErr == ""){
		//Lenght check
		strErr = lenghtCheck(userId, newPassword);
		if(strErr == ""){
			//Alphanumeric check
			strErr = alphanumericCheck(userId, newPassword);
			if(strErr == ""){
				//Mail type check
				strErr = mailCheck(mail);
				if(strErr == ""){
					//New password and Retype new password check
					strErr = samePasswordCheck(newPassword, retypeNewPassword);
				}
			}
		}
	}
	return strErr;
}

function requireCheck(isInsert, userId, newPassword, mail, retypeNewPassword){
	if(userId == ""){
		$("input[name=userId]" ).focus();
		// return "ユーザーIDを入力してください。";
		return "入力してください。";
	}
	if(mail == ""){
		$("input[name=mail]" ).focus();
		// return "メールアドレスを入力してください。";
		return "入力してください。";

	}
	if(isInsert){
		if(newPassword == ""){
			$("input[name=password]" ).focus();
			// return "パスワードを入力してください。";
			return "入力してください。";
		}
	}
	if(isInsert){
		if(retypeNewPassword == ""){
			$("input[name=retypePassword]" ).focus();
			return "入力してください。";
		}
	}
	
	return "";
}

function alphanumericCheck(userId, newPassword){
	if(isAlphanumeric(userId) == false){
		$("input[name=userId]" ).focus();
		// return "ユーザーIDを半角英数字で入力してください。";
		return "正しく入力されていません。";
	}
	if(newPassword != ""){
		if(isAlphanumeric(newPassword) == false){
			$("input[name=password]" ).focus();
			return "パスワードを半角英数字で入力してください。";
			// return "正しく入力されていません。";
		}
	}
	return "";
}

function lenghtCheck(userId, newPassword){
	if(userId.length < 4 || userId.length > 8){
		$("input[name=userId]" ).focus();
		// return "ユーザーIDを半角英数字で4文字以上8文字以内で入力してください。";
		return "正しく入力されていません。";
	}
	if(newPassword != ""){
		if(newPassword.length < 4 || newPassword.length > 8){
			$("input[name=password]" ).focus();
			// return "パスワードを半角英数字で4文字以上8文字以内で入力してください。";
			return "正しく入力されていません。";
		}
	}
	return "";
}

function mailCheck(mail){
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
	if(!emailReg.test(mail)) {  
		// return "メールアドレスの形式が正しくありません。";
		$("input[name=mail]" ).focus();
		return "正しく入力されていません。";
	} 
	return "";
}

function samePasswordCheck(newPassword, retypeNewPassword){
	if(newPassword != retypeNewPassword){
		// return "新しいパスワードと再入力新しいパスワードが一致しません。";
		$("input[name=retypePassword]" ).focus();
		return "正しく入力されていません。 ";
	}
	return "";
}

function isAlphanumeric(str){
	str = (str==null)?"":str;
	if(str.match(/^[A-Za-z0-9]*$/)){
		return true;
	}
	return false;
}

function afterUpdateSuccess(userId, oldUserId){
	var editMode = $("#hdnEditMode").val();
	if(editMode == "ADMIN_EDIT"){
		alert('情報が更新されました。');
		window.location.replace("./?rt=loginUserList");
	}
	if(editMode == "LOGIN_EDIT"){
		if(userId != oldUserId){
			alert("ユーザーIDが変更されました。もう一度ログインしてください。");
			window.location.replace("./?rt=login&logout=true");
		}else{
			alert("アカウントが変更されました。");
		}
	}
}