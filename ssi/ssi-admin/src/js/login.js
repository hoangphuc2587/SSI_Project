jQuery(document).ready(function($){

    //Login button click event
    $( "#btnLogin" ).click(function(event) {

        if(!checkInput()){
            $('#errMessage').text("ユーザーIDとパスワードを入力してください。");
            event.preventDefault();
            return;
        }

        // get the form data
        var formData = {
            'inputUserId': $('input[name=inputUserId]').val(),
            'inputPassword': $('input[name=inputPassword]').val()
        };

        // process the form
        $.ajax({
            type:'POST',
            contentType: 'application/json',
            url: './?rt=login/login',
            dataType: "json",
            data:JSON.stringify(formData),
                success:function(response) {
                    if(response.result != "OK"){
                        $('#errMessage').text("ユーザーIDまたはパスワードが不正です。");
                    }else{
                        $('#errMessage').text("");
                        window.location.replace("./?rt=dashboard");
                    }
                },
                error: function() {
                    $('#errMessage').val("サーバーエラー");
                }
        })
        // using the done promise callback
        .done(function(data) {
            // log data to the console so we can see
            console.log(data); 
            // here we will handle errors and validation messages
        });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
   
    });

    //forgot user id
    $( "#sendUserId" ).click(function(event) {
        $('#sendUserId').prop('disabled', true);

        var userEmail = $.trim($('input[name=inputEmail]').val());
        var password = $.trim($('input[name=inputPassword]').val());
        if(userEmail == "" ){
            $('#errMessage').text("入力してください。");
            $('input[name=inputEmail]').focus();
            $('#sendUserId').prop('disabled', false);
            return false;
        }
        if(password == ""){
            $('#errMessage').text("入力してください。");
            $('input[name=inputPassword]').focus();
            $('#sendUserId').prop('disabled', false);
            return false;
        }
        if (password != ""&&userEmail != "") {
            // get the form data
            var formData = {
                'inputEmail': $('input[name=inputEmail]').val(),
                'inputPassword': $('input[name=inputPassword]').val()
            };

            // process the form
            $.ajax({
                type:'POST',
                contentType: 'application/json',
                url: './?rt=idForget/forgotUserID',
                dataType: "json",
                data:JSON.stringify(formData),
                    success:function(response) {
                        if(response.result == "0"){
                            $('#sendUserId').prop('disabled', false);
                            $('#errMessage').text("このメールアドレスは登録されていません。");//email not found
                        }else if(response.result == "2"){
                            $('#sendUserId').prop('disabled', false);
                            $('#errMessage').text("メールアドレスとパスワードが一致しません");//email &pass not same
                            // event.preventDefault();
                        }else{
                            alert('ご登録のメールアドレスにIDを送信しました。');
                            window.location.replace("./?rt=login");
                        }
                    },
                    error: function() {
                        $('#errMessage').val("サーバーエラー");
                    }
            })
            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
            });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        }
    });

    //forgot password
    $( "#sendForgotPassword" ).click(function(event) {
        $('#sendForgotPassword').prop('disabled', true);

        var userEmail = $.trim($('input[name=inputEmail]').val());
        var userId = $.trim($('input[name=inputId]').val());
        if(userEmail == ""){
            $('input[name=inputEmail]').focus();
            $('#errMessage').text("入力してください。");
            $('#sendForgotPassword').prop('disabled', false);
            return false;
        }
        if(userId == ""){
            $('input[name=inputId]').focus();
            $('#errMessage').text("入力してください。");
            $('#sendForgotPassword').prop('disabled', false);
            return false;
        }
        if(userEmail != ""&&userId != ""){
            // get the form data
            var formData = {
                'inputEmail': $('input[name=inputEmail]').val(),
                'inputId': $('input[name=inputId]').val()
            };

            // process the form
            $.ajax({
                type:'POST',
                contentType: 'application/json',
                url: './?rt=idForget/forgotPassword',
                dataType: "json",
                data:JSON.stringify(formData),
                    success:function(response) {
                        if(response.result == "0"){
                            $('#sendForgotPassword').prop('disabled', false);
                            $('#errMessage').text("ユーザーのメールアドレスまたはIDが無効です。");
                        }else if(response.result == "2"){//mail &user not match
                            $('#sendForgotPassword').prop('disabled', false);
                            $('#errMessage').text("メールアドレスとIDが一致しません。");
                        }
                        else if(response.result == "3"){//email not found
                            $('#sendForgotPassword').prop('disabled', false);
                            $('#errMessage').text("このメールアドレスは登録されていません。");
                        }else if(response.result == "4"){//id not match
                            $('#sendForgotPassword').prop('disabled', false);
                            $('#errMessage').text("このIDは登録されていません。");
                        }else{
                            alert('ご登録のメールアドレスにパスワードを送信しました。');
                            window.location.replace("./?rt=login");
                        }
                    },
                    error: function() {
                        $('#errMessage').val("サーバーエラー");
                    }
            })
            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see
                console.log(data); 
                // here we will handle errors and validation messages
            });
            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        }
        
   
    });
   
}); 

function checkInput(){
    var userId = $.trim($('input[name=inputUserId]').val());
    var password = $.trim($('input[name=inputPassword]').val());
    if(userId == "" || password == ""){
        return false;
    }
    return true;
}