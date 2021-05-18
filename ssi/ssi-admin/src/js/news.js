var i = 1;
jQuery(document).ready(function ($) {
    $('.sidebar').removeClass('active');
    $('#menuNews').addClass('active');
    $('button[name="submit"]').click(function () {
        var title = $('input[name="title"]').val();
        var content = CKEDITOR.instances['contentText'].getData();
        var imgPositionNew = new Array;
        var imgPositionNew2 = new Array;

        var id = $('input[name="id"]').val();

        if (id != "" && id != undefined) {
            $('#vpb-display-preview div.old-image').each(function (index) {
                var name = $(this).attr("name").replace(/%20/g, " ");

                imgPositionNew.push(name);
            });
            $('#vpb-display-preview div').each(function (index) {
                var name = $(this).attr("name").replace(/%20/g, " ");

                imgPositionNew2.push(name);
            });
            $('#imgPositionNewEdit').html('');
            $('#imgPositionNewEdit').append('<input type="hidden" name="imgPositionNewEdit" value="' + imgPositionNew2 + '">');
        } else {
            $('#vpb-display-preview div').each(function (index) {
                var name = $(this).attr("name").replace(/%20/g, " ");

                imgPositionNew.push(name);
            });
        }

        $('#imgPositionNew').html('');
        $('#imgPositionNew').append('<input type="hidden" name="imgPositionNew" value="' + imgPositionNew + '">');
        if (title === "") {
            alert('タイトルを入力してください1。');
            $('input[name="title"]').focus();
            return false;
        }

        if (title.length >128) {
            alert('タイトルは128文字以内にしてください。');
            $('input[name="title"]').focus();
            return false;
        }
        if (content === "") {
            alert('コンテンツを挿入してください。');
            CKEDITOR.instances['contentText'].focus();
            return false;
        }
        if (content.length >4096) {
            alert('コンテンツが長すぎます。タグ含めて4096文字以内にしてください。');
            $('input[name="title"]').focus();
            return false;
        }
    });
    //Load Display Status switch button on first time
    $('#tblNews>tbody>tr').each(function () {
        var rowIndex = $(this).index('#tblNews>tbody>tr');
        //get value of display_flag
        var hdnIDDisplayFlag = '#displayFlag' + (rowIndex + 1);
        var displayFlag = $(hdnIDDisplayFlag).val();
        //set status for switch button
        var toggleDisplay = '#toggleDisplay' + (rowIndex + 1);
        if (displayFlag == '1') {
            // $(toggleDisplay).bootstrapToggle('on');
            $(toggleDisplay).prop("checked", true);
        }
        else {
            $(toggleDisplay).prop("checked", false);
        }
    });

    //Event when Display Status switch button change
    $("input[name='toggleDisplay']").change(function (e) {
        var changedStatus = $(this).prop('checked');
        //get ID of contact 
        var rowIndex = $(this).closest('tr').index();
        var hdnId = $('#id' + (rowIndex + 1)).val();
        var changedDisplayFlag = "0";
        if (changedStatus == true) {
            changedDisplayFlag = "1";
        }
        var postData = {
            id: hdnId,
            displayFlag: changedDisplayFlag,
        };
        e.preventDefault();
        //e.stopPropagation();
        //Call ajax for update Display Flag to DB
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: './?rt=news/updateDisplay',
            dataType: "json",
            data: JSON.stringify(postData),
            success: function (response) {
                // alert(response.result);
            },
            error: function () {
                //alert("サーバエラー");
            }
        });
    });

    // preview
    var domainstring = location.protocol + "//" + location.host;
    // local host
     var domainName = "/";
    // server test
    //var domainName = "/test/ssi";
    $("#preview").click(function () {
        var title = $('#title').val();
        var displayDate = $('#displayDate').val();
        var imgPositionNew = new Array;
        var listImg = "";
        $('#vpb-display-preview div img').each(function (index) {
            var src = $(this).attr("src");
            imgPositionNew.push(src);
            listImg = listImg + src+", ";
        });
        var contentText = CKEDITOR.instances['contentText'].getData();
        listImg = listImg.substring(0, listImg.length - 2);
        var data = {
            title: title,
            content: contentText,
            // image: imgPositionNew,
            image: listImg,
            displayDate:displayDate
        };

        url_redirect({ url: "" + domainstring + domainName + "/preview.php?preview=true", method: "POST", data: data });

    });

    // date picker
    $('#displayDate').datepicker({
        format: 'yyyy/mm/dd'
    });
    $("#clickToUpload").click(function () {
        $("#showImage").append("<input style='display:none;' name='file[]' type='file' id='input" + i + "' multiple onchange='vpb_image_preview(this," + i + ")'  accept='image/png, image/jpeg'/>");
        $("#input" + i + "").click();
        i++;
    });
    $(".remove").click(function (e) {
        var id = $(this).attr('id');
        $("#vpb_wrapper_" + id).remove();
        // var num = $('#image-list .vpb_wrapper').length;
        // if(num == 0) {
        //     $('#alertRotateImg .js-upload-img-text').text('');
        // }
    });
});
function url_redirect(options) {
    var $form = $("<form target='_blank'/>");

    $form.attr("action", options.url);
    $form.attr("method", options.method);

    for (var data in options.data)
        // var value=options.data[data]
        // $form.append('<input type="hidden" name="' + data + '" value="' + (options.data[data]) + '">');
        $form.append('<input type="hidden" name="' + data + '" value="' + (options.data[data]).replace(/"/g, '&quot;') + '">');

    $("body").append($form);
    $form.submit();
}

$(function () {
    // delete news
    $(".btnDeleteNews").click(function (e) {
        var form = $(e).parent();
        var flag = confirm("このニュースを削除してよろしいですか？")
        if (!flag) {
            e.preventDefault();
        }
    });

});
var count = 0;
function vpb_image_preview(vpb_selector_, i) {

    var length = document.getElementsByClassName('vpb_wrapper').length;
    console.log(length);
    if (length < 6) {
        $.each(vpb_selector_.files, function (num, file) {
            console.log(length + num);
            var length2 = length + num;
            if (length2 < 6) {
                if (file.name.length > 0 && file.size < 5242880)  //5242880  2097152
                {
                    if (!file.type.match('image.*')) {
                        alert('画像を選択してください。');
                        return true;
                    } // Do not add files which are not images
                    else if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                        alert('jpeg、jpgまたはpng形式の画像を選択してください。');
                        return true;
                    }
                    else {
                        var imgPositionNew = new Array;
                        $('#vpb-display-preview div').each(function (index) {
                            var name = $(this).attr("name");
                            imgPositionNew.push(name);
                        });
                        //check if image has choose, not upload
                        var stringI = imgPositionNew.toString();
                        var result = stringI.match(file.name);

                        if (result == null) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#vpb-display-preview').append(
                                    '<div class="vpb_wrapper" id="selector_' + count + '"  name=\'' + file.name + '\'> \
                                    <img class="vpb_image_style" class="img-thumbnail"  src="' + e.target.result + '" \
                                    title="'+ escape(file.name) + '" style="width: 150px;" /><br /> \
                                    <a onclick="vpb_remove_selected(\''+ count + '\')" id="img' + escape(file.name) + '" style="cursor:pointer;padding-top:5px;" title="Remove ' + escape(file.name) + '" \
                                    >削除</a> \
                                    </div>');
                                count++;
                            }

                            reader.readAsDataURL(file);


                        } else {
                            $('#input' + i + '').val("");
                            alert('写真が選択されました！');//A photo has been selected!
                        }
                    }
                } else {
                    alert("※画像のアップロードは5MB以内です。");
                    return false;
                }
            } else {
                alert('Maximum 6 images');
            }
        });
    } else {
        alert('Maximum 6 images');
    }

}
function vpb_remove_selected(id) {
    $('#v-add-' + id).remove();
    $('#selector_' + id).remove();
}
