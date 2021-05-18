jQuery(document).ready(function($){
	//Active menu
	$('.sidebar').removeClass('active');
	$('#menuContact').addClass('active');
	
    //Event when click update
	$("button[name='submit']").click(function() {
		//Check input
		var strErr = inputCheck(true);
		if(strErr != ""){
			alert(strErr);
			return;
		}
        else{
        	var id= $('#id').val();
			var currentUser=$('#loginUser').val();
			var mail= $('#mail').val();
			var i = 0, strLength = mail.length;
			for(i; i < strLength; i++) {
				mail= mail.replace(" ","");
			}
			var contentMail= CKEDITOR.instances.contentMail.getData();
			var contentMailAdmin= CKEDITOR.instances.contentMailAdmin.getData();
			if (id!='') {
				var postData = {
		        	id:id,
		        	currentUser:currentUser,
		        	mail:mail,
		        	contentMail:contentMail,
		        	contentMailAdmin:contentMailAdmin
		        };
				//Call ajax for update Display Flag to DB
				$.ajax({
					type:'POST',
					contentType: 'application/json',
					url: './?rt=contactModify/update',
					dataType: "json",
					data:JSON.stringify(postData),
					success:function(response) {
						alert("お問い合わせ情報の設定が登録されました。");
						// alert(response.result);
					},
		             error: function() {
		                alert("お問い合わせ情報の設定が失敗です。");
		            }
				});	
			}
			else{
				var postData = {
		        	currentUser:currentUser,
		        	mail:mail,
		        	contentMail:contentMail,
		        	contentMailAdmin:contentMailAdmin
		        };
				//Call ajax for update Display Flag to DB
				$.ajax({
					type:'POST',
					contentType: 'application/json',
					url: './?rt=contactModify/add',
					dataType: "json",
					data:JSON.stringify(postData),
					success:function(response) {
						alert("お問い合わせ情報の設定が登録されました。");
						// alert(response.result);
					},
		             error: function() {
		                alert("お問い合わせ情報の設定が失敗です。");
		            }
				});	
			}
	        
        }
			
    });

}); 
function inputCheck(isInsert){

	var mail = $('input[name=mail]').val();
	var contentMail=CKEDITOR.instances.contentMail.getData();
	var contentMailAdmin=CKEDITOR.instances.contentMailAdmin.getData();
	var strErr = "";

	//Require check
	strErr = requireCheck(mail, contentMail, contentMailAdmin);
	if(strErr == ""){
		//Mail type check
		strErr = mailCheck(mail);
	}
	return strErr;
}
function requireCheck(mail, contentMail, contentMailAdmin){
	if(contentMail == ""){
		return "自動返信メール表示用内容を入力してください。";
	}
	if(contentMailAdmin == ""){
		return "自動返信メール表示用内容(Admin)を入力してください。";
	}	
	if(mail == ""){
		return "メールアドレスを入力してください。";
	}
	if (mail.length >1000) {
		return "メールアドレスは1000文字以内にしてください。";
	}
	if (contentMail.length >4096) {
		return "自動返信メール表示用内容は4096文字以内にしてください。";
	}
	return "";
}
function mailCheck(mail){
	// var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
	// var re = /\s*(?:;|$)\s*,/; 
	var member_split = mail.split([',']); 
	var emailReg = /^(\s?[^\s,]+@[^\s,]+\.[^\s,]+\s?,)*(\s?[^\s,]+@[^\s,]+\.[^\s,]+)$/;  
	if (member_split.length>2) {
		return '最大2つのメールアドレスを入力してください。';
	}
	for (var n = 0; n < member_split.length; n++) {
		var member_info = member_split[n];
		if(!emailReg.test(member_info)) {  
			return "メールアドレスの形式が正しくありません。";
		} 
	}
	return "";
}

// if(CKEDITOR) {
//     CKEDITOR.replace('contentMail', {
//         fullPage: true,
//         allowedContent: true
//     });
//     CKEDITOR.config.extraAllowedContent = 'audio[*]{*}';
// }