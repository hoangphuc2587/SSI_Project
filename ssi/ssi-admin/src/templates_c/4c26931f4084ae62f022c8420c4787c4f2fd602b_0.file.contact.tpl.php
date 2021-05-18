<?php
/* Smarty version 3.1.33, created on 2020-07-31 03:01:39
  from '/var/www/ssi-test/ssi-admin/src/templates/contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f23899320bc70_49803433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c26931f4084ae62f022c8420c4787c4f2fd602b' => 
    array (
      0 => '/var/www/ssi-test/ssi-admin/src/templates/contact.tpl',
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
function content_5f23899320bc70_49803433 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'default.conf', 'Contact', 0);
?>

<?php if ($_smarty_tpl->tpl_vars['loginRole']->value == '1') {?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
		<main class="main-content">
            <div class="block-contact">
                <div class="head">
                    <h2 class="headline">お問い合わせ情報管理</h2>
                </div>
                <div class="block-inner">
                    <dl class="group-form">
                        <dt>
                            <label>メールアドレス</label>
                        </dt>
                        <dd><input type="text" name="mail" id="mail" value="<?php echo $_smarty_tpl->tpl_vars['receptionMail']->value;?>
">
                            <p class="txt-note">※お問合せフォームの受付アドレスに使用</p>
                        </dd>
                        <dt>
                            <label>自動返信メール表示用内容</label>
                        </dt>
                        <dd>
                        	<textarea id="contentMail" name="content">
                                <?php echo $_smarty_tpl->tpl_vars['contentMail']->value;?>

                            </textarea>
                        </dd>
                        <input type="hidden" id="id" name="id" value=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
>
                        <input type="hidden" id="loginUser" name="loginUser" value=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
 />
                    </dl>
                        <p class="align-center">
                            <button class="btn button02" type="submit" name="submit" id="btnSave" value="submit">登録</button>
                        </p>
                </div>
            </div>

        </main>
        <?php echo '<script'; ?>
>
        	if(CKEDITOR) {
                CKEDITOR.replace('contentMail', {
                    allowedContent: true,
            toolbar: [
              ["Link", "Unlink",],  // リンク、リンク解除
              ["Bold", "Italic", "Strike", "-","RemoveFormat"],  // 太字、イタリック、打ち消し線、書式を解除
              ["FontSize"],            // フォントサイズ
              ["TextColor","BGColor"],            // テキストカラー、バックグランドカラー
              ["Source"],                                    // ソースコード表示切り替え
            ],
                });
                CKEDITOR.config.extraAllowedContent = 'audio[*]';
                CKEDITOR.config.height = 350;
                CKEDITOR.config.width = 350;
            }
        <?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender('file:footer.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
