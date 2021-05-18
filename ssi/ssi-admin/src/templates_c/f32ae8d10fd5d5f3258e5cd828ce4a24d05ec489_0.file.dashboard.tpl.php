<?php
/* Smarty version 3.1.33, created on 2020-07-27 11:09:58
  from 'D:\DUNG\PROJECT\SSI_PROJECT\20200723\ssi_hompage\ssi-admin\src\templates\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1e99e609e3b2_62191533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f32ae8d10fd5d5f3258e5cd828ce4a24d05ec489' => 
    array (
      0 => 'D:\\DUNG\\PROJECT\\SSI_PROJECT\\20200723\\ssi_hompage\\ssi-admin\\src\\templates\\dashboard.tpl',
      1 => 1595484341,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.part.tpl' => 2,
    'file:footer.part.tpl' => 1,
  ),
),false)) {
function content_5f1e99e609e3b2_62191533 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'default.conf', 'Dashboard', 0);
?>

<?php if ($_smarty_tpl->tpl_vars['loginRole']->value == '1') {?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
<main class="main-content">
    <div class="block-dashboard">
        <ul>
            <li>
                <div class="group">
                    <img  src="src/image/common/ic-setting.png">
                </div>
                <div class="title"><a href="./?rt=loginUserList">ユーザー管理</a></div>
            </li>

            <li>
                <div class="group">
                    <img  src="src/image/common/ic-contactModify.png">
                </div>
                <div class="title"><a href="./?rt=contactModify">お問い合わせ</a></div>
            </li>

            <li>
                <div class="group">
                    <img   src="src/image/common/ic-contactHistory.png">
                </div>
                <div class="title"><a href="./?rt=contactHistory">お問い合わせ履歴</a></div>
            </li>

            <li>
                <div class="group">
                    <img  src="src/image/common/ic-news.png">
                </div>
                <div class="title"><a href="./?rt=news">ニュースリスト</a></div>
            </li>
        </ul>
    </div>
    <a href="./dl.php">管理画面操作マニュアルダウンロード</a>
</main>
<?php $_smarty_tpl->_subTemplateRender('file:footer.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
