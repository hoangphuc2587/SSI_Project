jQuery(document).ready(function($){
	//Active menu
	$('.sidebar').removeClass('active');
	$('#menuContact').addClass('active');

    //Event when change select inquiry
	$("select[name=inquiry]").change(function() {
		var inquiry= $(this).val();
		if (inquiry != '0'){
			var postData = {
	        	inquiry:inquiry
	        };
            $.ajax({
				type:'POST',
				contentType: 'application/json',
				url: './?rt=inquiryDetail/getInquiry',
				dataType: "json",
				data:JSON.stringify(postData),
				success:function(response) {
					$('#id').val(response.id);
					$('#mail').val(response.email);
				},
	             error: function() {
	               
	            }
			});
		}else{
			$('#mail').val('');
		}
	});
	
    //Event when click update
	$("#btnUpdateInquiry").click(function() {
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
			var inquiry= $('select[name=inquiry]').val();
			if (id!='') {
				var postData = {
		        	id:id,
		        	currentUser:currentUser,
		        	mail:mail,
		        	inquiry:inquiry
		        };
				//Call ajax for update Display Flag to DB
				$.ajax({
					type:'POST',
					contentType: 'application/json',
					url: './?rt=inquiryDetail/update',
					dataType: "json",
					data:JSON.stringify(postData),
					success:function(response) {
						alert("お問い合わせの種類の設定が登録されました。");
						window.location.replace("./?rt=inquiryList");
					},
		             error: function() {
		                alert("お問い合わせの設定が失敗です。");
		            }
				});	
			}
			else{
				var postData = {
					id: '0',
		        	currentUser:currentUser,
		        	mail:mail,
		        	inquiry:inquiry
		        };
				//Call ajax for update Display Flag to DB
				$.ajax({
					type:'POST',
					contentType: 'application/json',
					url: './?rt=inquiryDetail/update',
					dataType: "json",
					data:JSON.stringify(postData),
					success:function(response) {
						alert("お問い合わせの設定が登録されました。");
						// alert(response.result);
					},
		             error: function() {
		                alert("お問い合わせの設定が失敗です。");
		            }
				});	
			}
	        
        }
			
    });

}); 
function inputCheck(isInsert){

    var inquiry = $('select[name=inquiry]').val();
	var mail = $('input[name=mail]').val();
	var strErr = "";

	//Require check
	strErr = requireCheck(mail, inquiry);
	if(strErr == ""){
		//Mail type check
		strErr = mailCheck(mail);
	}
	return strErr;
}
function requireCheck(mail, inquiry){
	if(inquiry == "0"){
		return "お問い合わせの種類を入力してください。";
	}	
	if(mail == ""){
		return "メールアドレスを入力してください。";
	}
	if (mail.length >1000) {
		return "メールアドレスは1000文字以内にしてください。";
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
