$(document).ready(function () {
    $('#submit').prop('disabled', true);
    // var link = document.getElementById('sendMail'); 
    // link.setAttribute("class", "disabled"); 
    // link.setAttribute("style", "color: black;"); 
    //Agree checkbox event
    if ($('#ckbAgree').is(':checked')) {
        $('#submit').prop('disabled', false);
		$("#submit").attr("tabindex","0");
    }
    $("#ckbAgree").change(function () {
        if ($('#ckbAgree').is(':checked')) {
            $("#submit").removeClass("disabled");
			$("#submit").attr("tabindex","0");
        }
        else {
            $("#submit").addClass("disabled");
			$("#submit").removeAttr("tabindex","0");
        }
    });

	$(function(){
		$("input").focus(function(){
			$("input"). keydown(function(e) {
	        	if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
	            	return false;
	            } else {
	            	return true;
	            }
			});
		});
		$("#submit").focus(function(){
			$("#submit"). keydown(function(e) {
        		e.preventDefault();
	        	if ($('#ckbAgree').is(':checked')) {
		        	if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
		            	$("#submit").trigger('click');;
		            }
				}
			});
		});
	});

    $("#submit").click(function (e) {
        e.preventDefault();
        if ($('#ckbAgree').is(':checked')) {
            if (!checkInput()) {
                return false;
            }
            $("#contact_form").css("display", "none");
            $("#confirm_contact").css("display", "");
            $("#headline").css("display", "none");
            $("#policy").css("display", "none");
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $("#company-name").text($('input[name=company-name]').val());
            $("#company-url").text($('input[name=company-url]').val());
            $("#name").text($('input[name=name]').val());
            $("#code").text($('input[name=code]').val() + ' - ' + $('input[name=code02]').val());
            $("#state").text($('input[name=state]').val());
            $("#city").text($('input[name=city]').val());
            $("#address").text($('input[name=address]').val());
            $("#phone").text($('input[name=phone]').val());
            $("#email").text($('input[name=email]').val());
            $("#fax").text($('input[name=fax]').val());
            $("#phoneRequest").text($('input[name=phoneRequest]').val());
            $("#inquiryItem").text($('select[name=inquiry]').val());
	    $("#content").text($('textarea[name=content]').val());
	    $("#content").css("white-space", "pre-wrap");
        }
    });

    $("#sendMail").click(function (event) {
        $('#Contents').css('cursor', 'wait');
        $('#sendMail').css('cursor', 'wait');
        $("#confirm").click();
        event.preventDefault();
    });
    $("#sltImage1").click(function () {
        $("#img1").click();
    });
    $("#sltImage2").click(function () {
        $("#img2").click();
    });
    $("#sltImage3").click(function () {
        $("#img3").click();
    });
    $("#back").click(function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        $("#contact_form").css("display", "");
        $("#confirm_contact").css("display", "none");
        $("#headline").css("display", "");
        $("#policy").css("display", "");
        $("#Contact-form").css("display", "");
    });

    $("#refreshCaptcha").click(function () {
        createCaptcha();
    });
    $('#captchaTextBox').keyup(function() {
        var captcha=$(this).val();
        if(validateCaptcha(captcha)){
            $( "#wrapperSendMail" ).removeClass( "disabled" );
            $( "#sendMail" ).removeClass( "disableLink" );
            $( "span.ic-check" ).html( '<i class="fa fa-check" style="color:#00bc12"></i>' );
        }else{
          $( "#wrapperSendMail" ).addClass( "disabled" );
          $( "#sendMail" ).addClass( "disableLink" );
          $( "span.ic-check" ).html( '<i class="fa fa-times" style="color:#ff0000"></i>' );
        }
    });
});

function checkInput() {

    //check require input
    var inputCompanyName = $('input[name=company-name]').val();
    var inputCompanyUrl = $('input[name=company-url]').val();
    var inputName = $('input[name=name]').val();
    var code = $('input[name=code]').val();
    var code02 = $('input[name=code02]').val();
    var inputState = $('input[name=state]').val();
    var inputCity = $('input[name=city]').val();
    var inputAddress = $('input[name=address]').val();

    var inputPhone = $('input[name=phone]').val();
    var inputEmail = $('input[name=email]').val();
    var selectBox = $('select[name=inquiry]').val();
    var inputContent = $('textarea[name=content]').val();
    var checkBox = document.getElementById("ckbAgree");
    var inputFax = $('input[name=fax]').val();
    var inputPhoneRequest = $('input[name=phoneRequest]').val();
    //set focus cursor if error
    var errPlace = [];

    /*set error message*/
    var result = true;
    var strErrRequire = "必須項目です。";
    var strErrInvalidText = "無効なテキスト形式。";
    var strErrLength = "入力文字が長すぎます。";

    //companyName
    if ($.trim(inputCompanyName) == "") {
        $('#errInputCompanyName').html(strErrRequire);
        errPlace.push(0);
        result = false;
    } else if (!preventLink(inputCompanyName)) {
        $('#errInputCompanyName').html(strErrInvalidText);
        errPlace.push(0);
        result = false;
    } else if (inputCompanyName.length >256) {
        $('#errInputCompanyName').html(strErrLength);
        errPlace.push(0);
        result = false;
	} else {
        $('#errInputCompanyName').html('');
    }

    //companyUrl
    if (inputCompanyUrl.length > 256) {
        $('#errInputCompanyUrl').html(strErrLength);
        errPlace.push(12);
        result = false;
    } else {
        $('#errInputCompanyUrl').html('');
    }

    //customerName
    if ($.trim(inputName) == "") {
        $('#errInputName').html(strErrRequire);
        errPlace.push(1);
        result = false;
    } else if (!preventLink(inputName)) {
        $('#errInputName').html(strErrInvalidText);
        errPlace.push(1);
        result = false;
    } else if (inputName.length >256) {
        $('#errInputName').html(strErrLength);
        errPlace.push(1);
        result = false;
    } else {
        $('#errInputName').html('');
    }

    //zipCode
/*
    if (code == "") {
        $('#errInputZipCode').html(strErrRequire);
        errPlace.push(2);
        result = false;
    } else {
        $('#errInputZipCode').html('');
    }
    if (code02 == "") {
        $('#errInputZipCode').html(strErrRequire);
        errPlace.push(3);
        result = false;
    } else {
        if (code != "") {
            $('#errInputZipCode').html('');
        }
    }
*/
    codestr = code+code02
    if (codestr.length >11) {
        $('#errInputZipCode').html(strErrLength);
        errPlace.push(2);
        result = false;
    }
    //state
    if (inputState == "") {
        $('#errInputAddress').html(strErrRequire);
        errPlace.push(4);
        result = false;
    } else if (!preventLink(inputState)) {
        $('#errInputAddress').html(strErrInvalidText);
        errPlace.push(4);
        result = false;
    } else if (inputState.length >128) {
        $('#errInputAddress').html(strErrLength);
        errPlace.push(4);
        result = false;
    } else {
        $('#errInputAddress').html('');
    }
    //city
    if (inputCity == "") {
        $('#errInputAddress').html(strErrRequire);
        errPlace.push(5);
        result = false;
    } else if (!preventLink(inputCity)) {
        $('#errInputAddress').html(strErrInvalidText);
        errPlace.push(5);
        result = false;
    } else if (inputCity.length >128) {
        $('#errInputAddress').html(strErrLength);
        errPlace.push(5);
        result = false;
    } else {
        if (inputState != "" && preventLink(inputState)) {
            $('#errInputAddress').html('');
        }
    }

    //address
    if (inputAddress == "") {
        $('#errInputAddress').html(strErrRequire);
        errPlace.push(6);
        result = false;
    } else if (!preventLink(inputAddress)) {
        $('#errInputAddress').html(strErrInvalidText);
        errPlace.push(6);
        result = false;
    } else if (inputAddress.length >256) {
        $('#errInputAddress').html(strErrLength);
        errPlace.push(6);
        result = false;
    } else {
        if (inputCity != "" && inputState != "" && preventLink(inputState) && preventLink(inputCity)) {
            $('#errInputAddress').html('');
        }
    }
    //phoneNumber
    if (inputPhone == "") {
        $('#errInputPhone').html(strErrRequire);
        errPlace.push(7);
        result = false;
    } else {
        //check phone 
        if (!checkPhone(inputPhone)) {
            errPlace.push(7);
            result = false;
        } else if (inputPhone.length >15) {
            $('#errInputPhone').html(strErrLength);
            errPlace.push(7);
            result = false;
        } else {
            $('#errInputPhone').html('');
        }
    }
    //email
    if (inputEmail == "") {
        $('#errInputEmail').html(strErrRequire);
        errPlace.push(8);
        result = false;
    } else {
        //check mail format
        if (!checkEmail(inputEmail)) {
            errPlace.push(8);
            result = false;
        } else if (inputEmail.length >128) {
            $('#errInputEmail').html(strErrLength);
            errPlace.push(8);
            result = false;
        } else {
            $('#errInputEmail').html('');
        }
    }

    //Fax
        //check phone 
        if (inputFax != "") {
		    if (!checkPhonenoReq(inputFax)) {
		        $('#errInputFax').html('半角数字を入力してください');
		        result = false;
		    } else if (inputFax.length >15) {
		        $('#errInputFax').html(strErrLength);
		        result = false;
		    }
		}
        //check phone 
        if (inputPhoneRequest != "") {
		    if (!checkPhonenoReq(inputPhoneRequest)) {
		        $('#errInputphoneRequest').html('半角数字を入力してください');
		        result = false;
		    } else if (inputPhoneRequest.length >15) {
		        $('#errInputphoneRequest').html(strErrLength);
		        result = false;
		    }
		}

    //select box
    if (selectBox == "0") {
        $('#errSelectOption').html(strErrRequire);
        errPlace.push(9);
        result = false;
    } else {
        $('#errSelectOption').html('');
    }
    //contact content
    if ($.trim(inputContent) == "") {
        $('#errInputContent').html(strErrRequire);
        errPlace.push(10);
        result = false;
    } else if (!preventLink(inputContent)) {
        $('#errInputContent').html(strErrInvalidText);
        errPlace.push(10);
        result = false;
    } else if (inputContent.length >1024) {
        $('#errInputContent').html(strErrLength);
        errPlace.push(10);
        result = false;
    } else {
        $('#errInputContent').html('');
    }

    if (checkBox.checked == true) {
        errPlace.push(11);
    } else {
        result = false;
    }

    //Set focus to error field
    if (errPlace.length != 0) {
        switch (errPlace[0]) {
            case 0:
                $('input[name=company-name]').focus();
                break;
            case 1:
                $('input[name=name]').focus();
                break;
            case 2:
                $('input[name=code]').focus();
                break;
            case 3:
                $('input[name=code02]').focus();
                break;
            case 4:
                $('input[name=state]').focus();
                break;
            case 5:
                $('input[name=city]').focus();
                break;
            case 6:
                $('input[name=address]').focus();
                break;
            case 7:
                $('input[name=phone]').focus();
                break;
            case 8:
                $('input[name=email]').focus();
                break;
            case 9:
                $('select[name=inquiry]').focus();
                break;
            case 10:
                $('textarea[name=content]').focus();
                break;
            case 11:
                $('input[name=ckbAgree]').focus();
                break;
            case 12:
                $('input[name=company-url]').focus();
                break;
            default:
        }
    }
    return result;
}
function checkAddress(address, strErrRequire) {
    var result = true;
    if ($.trim(address) == "") {
        $('#errInputAddress').html(strErrRequire);
        result = false;
    } else {
        if (address.includes("http://") || address.includes("https://")) {
            $('#errInputAddress').html('住所が無効です。');
            result = false;
        }
    }

    return result;
}
function checkPhone(inputPhone) {
    var result = true;
    inputPhone = (inputPhone == null) ? "" : inputPhone;
    if (!inputPhone.match(/^\d+$/)) {
        $('#errInputPhone').html('半角数字を入力してください');
        result = false;
    } else {
        $('#errInputPhone').html('');
    }
    return result;
}

function checkPhonenoReq(inputPhone) {
    var result = true;
    inputPhone = (inputPhone == null) ? "" : inputPhone;
    if (!inputPhone.match(/^\d+$/)) {
        result = false;
    } else {
        $('#errInputPhone').html('');
    }
    return result;
}

function checkEmail(inputEmail) {
    var result = true;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test(inputEmail)) {
        $('#errInputEmail').html('正しいメールアドレスが入力されていません。');
        result = false;
    } else {
        $('#errInputEmail').html('');
    }
    return result;
}

function preventLink(text) {
    var result = true;

    // if (text.includes("http://") || text.includes("https://")) {
    //     result = false;
    // }
    var n = text.indexOf("http://");
    var i = text.indexOf("https://");
    if (n!== -1||i!== -1) {
        result = false;
    }
    return result;
    // return false;
}
// Custom select
var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /* When an item is clicked, update the original select box,
            and the selected item: */
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /* When the select box is clicked, close any other select boxes,
        and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

var captchaCode;
function createCaptcha() {
  //clear the contents of captcha div first 
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
  var lengthOtp = 6;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    //below code will not allow Repetition of Characters
    var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  //storing captcha so that can validate you can save it somewhere else according to your specific requirements
  captchaCode = captcha.join("");
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}
function validateCaptcha(captchaText) {
  event.preventDefault();
  //debugger
  if (captchaText == captchaCode) {
    //alert("Valid Captcha")
    return true;
  }else{
    // alert("Invalid Captcha. try Again");
    // createCaptcha();
    return false;
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);

/*document.onkeypress = enter;
function enter(){
  if( window.event.keyCode == 13 ){
    return false;
  }
}*/
