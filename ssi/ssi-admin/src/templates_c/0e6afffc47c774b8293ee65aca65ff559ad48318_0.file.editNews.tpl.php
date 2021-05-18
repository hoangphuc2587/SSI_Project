<?php
/* Smarty version 3.1.33, created on 2020-07-31 02:56:53
  from '/var/www/ssi-test/ssi-admin/src/templates/editNews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f238875be9c36_79132846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e6afffc47c774b8293ee65aca65ff559ad48318' => 
    array (
      0 => '/var/www/ssi-test/ssi-admin/src/templates/editNews.tpl',
      1 => 1596106329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.part.tpl' => 2,
    'file:footer.part.tpl' => 1,
  ),
),false)) {
function content_5f238875be9c36_79132846 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'default.conf', 'ListNews', 0);
?>

<?php if ($_smarty_tpl->tpl_vars['loginRole']->value == '1') {?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>

<main class="main-content contact-history">
    <div class="block-contact">
        <div class="head">
            <h2 class="headline">ニュース詳細</h2>
        </div>
        <div class="block-inner">
            <form action="./?rt=news/updateNews"  method="post" id="ckeditor" enctype="multipart/form-data">
                <ul class="page-news">
                    <li>
                        <label>タイトル</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['news']->value->getTitle();?>
">
                    </li>
                    
                    <li>
                        <p>コンテンツ</p>
                        <textarea id="contentText" name="content">
                          <?php echo $_smarty_tpl->tpl_vars['news']->value->getContent();?>

                        </textarea>
                    </li>
                    <div class="block-upload" >
                        <div class="upload-inner" id="upload">
                            <div style="display: flex;">
                                <div class="load-images vpb_browse_file"  id="clickToUpload">
                                    <a ><i class="fas fa-cloud-upload-alt"></i>
                                    <span>Upload image</span></a>
                                </div>
                                <span class="note">※Maximum 6 images</span>
                            </div>
                            <div class="clearboth" style="width:auto; margin-top:50px; align:center;" id="vpb-display-preview">
                                <?php if ($_smarty_tpl->tpl_vars['news']->value->getImage() != null) {?>
                                    <?php $_smarty_tpl->_assignInScope('listImage', explode(",",$_smarty_tpl->tpl_vars['news']->value->getImage()));?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listImage']->value, 'imgname', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['imgname']->value) {
?>
                                    <div class="vpb_wrapper old-image" id="vpb_wrapper_img<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['imgname']->value;?>
">
                                        <img class="vpb_image_style img-thumbnail" id="imgimg<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" src="<?php echo $_smarty_tpl->tpl_vars['imgPath']->value;
echo $_smarty_tpl->tpl_vars['imgname']->value;?>
" style="width: 150px;" />
                                        <a class="remove" style="cursor:pointer;padding-top:5px;" title="Click here to remove " id="img<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">削除</a>
                                    </div> 
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>
                            </div>
                            <div id="showImage"></div>
                            <div id="imgPositionNew"></div>
                            <div id="imgPositionNewEdit"></div>
                        </div>
                    </div>
                    <li>
                        <label>登録日付</label>
                        <input id="displayDate" class="inputbox form-control" type="" name="displayDate" value='<?php echo $_smarty_tpl->tpl_vars['news']->value->getDisplayDate();?>
'>
                    </li> 

                    <li>
                    <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['news']->value->getId();?>
">
                    </li>
                </ul>

                <div class="group-button">
                    <p class="pb-10"><a href="./?rt=news" class="btn button02 btn-common btnBack">一覧へ</a></p>
                    <ul class="list-button">
                        <li>
                            <a class="button02 pointer" id="preview">プレビュー</a>
                        </li>
                        <li>
                            <button type="submit" class="button02" name="submit" id="updateNews">更新</button> 
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</main>
<?php echo '<script'; ?>
 type="text/javascript">
    if(CKEDITOR) {
        CKEDITOR.replace('content', {
            fullPage: true,
                extraPlugins: 'docprops',
                allowedContent: true,
            toolbar: [
              ["Link", "Unlink",],  // リンク、リンク解除
              ["Bold", "Italic", "Strike", "-","RemoveFormat"],  // 太字、イタリック、打ち消し線、書式を解除
              ["FontSize"],            // フォントサイズ
              ["TextColor","BGColor"],            // テキストカラー、バックグランドカラー
              ["Source"],                                    // ソースコード表示切り替え
            ],
        'extraPlugins': 'doksoft_backup,doksoft_stat,zoom',
        'filebrowserImageBrowseUrl': 'component/ckeditor/plugins/imgbrowse/imgbrowse.html',
        'filebrowserImageUploadUrl': 'component/ckeditor/plugins/iaupload.php'
        });
        CKEDITOR.config.extraAllowedContent = 'audio[*]';
    };
    function showPreview(objFileInput) {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $("#targetLayer").html('<img src="'+e.target.result+'"  class="upload-preview" />');
                $(".remove-img-icon").removeClass("no-display");
                $(".remove-img-icon").addClass("remove-img-icon-position");
                // $("#targetLayer").css('opacity','0.7');
                // $(".icon-choose-image").css('opacity','0.5');
            }
            fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(".remove-img-icon").on('click', function(){
         var r = confirm("画像を削除してもよろしいですか？");
            if (r == true) {
                jQuery('#imgNews').removeAttr('src');
                $('input[name="rmImg"]').val('1');
                $("#showImage" ).html();
                $("#showImage" ).html('<input type="file" class="inputFile input-file-edit" name="image" id="image" accept="image/*"onChange="showPreview(this);"><div id="targetLayer"></div>');
                $(".remove-img-icon").addClass("no-display");
            } 
        });
    
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:footer.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
