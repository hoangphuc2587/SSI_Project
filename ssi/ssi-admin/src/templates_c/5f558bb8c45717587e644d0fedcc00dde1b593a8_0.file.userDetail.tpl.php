<?php
/* Smarty version 3.1.33, created on 2020-07-30 11:08:24
  from '/var/www/ssi-test/ssi-admin/src/templates/userDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f22aa282a5e30_61885373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f558bb8c45717587e644d0fedcc00dde1b593a8' => 
    array (
      0 => '/var/www/ssi-test/ssi-admin/src/templates/userDetail.tpl',
      1 => 1596106331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.part.tpl' => 2,
    'file:footer.part.tpl' => 1,
  ),
),false)) {
function content_5f22aa282a5e30_61885373 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'default.conf', 'UserDetail', 0);
?>

<?php if ($_smarty_tpl->tpl_vars['loginRole']->value == '1') {?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
        <main class="main-content">
            <div class="block-contact">
                <div class="head">
                    <h2 class="headline">ユーザー登録・編集</h2>
                </div>
                <div class="block-inner">
                    <dl class="group-form">
                        <!-- Set hidden tag -->
                        <input type="hidden" id="hdnEditMode" value=<?php echo $_smarty_tpl->tpl_vars['editMode']->value;?>
>
                        <!-- <input type="hidden" id="hdnRole" value=<?php echo $_smarty_tpl->tpl_vars['userInfo']->value->getRole();?>
> -->
                        <dt>
                            <label>ユーザーID</label>
                        </dt>
                        <dd><input type="text" name="userId" value=<?php echo $_smarty_tpl->tpl_vars['userInfo']->value->getUserId();?>
>
                            <input type="hidden" name="oldUserId" value=<?php echo $_smarty_tpl->tpl_vars['userInfo']->value->getUserId();?>
 >
                            <p class="txt-note">※半角英数字で4文字以上8文字以内</p>
                        </dd>
                        <!-- <?php if ($_smarty_tpl->tpl_vars['loginRole']->value == '1' && $_smarty_tpl->tpl_vars['loginUserEdit']->value == null) {?>
                            <dt>
                                <label>ロール</label>
                            </dt>
                            <dd>
                                <select name="role">
                                    <option value="1">アドミン</option>
                                    <option value="2">ユーザー</option>
                                </select>
                            </dd>
                        <?php }?> -->
                        <dt>
                            <label>ユーザーのメールアドレス</label>
                        </dt>
                        <dd><input type="text" name="mail" value=<?php echo $_smarty_tpl->tpl_vars['userInfo']->value->getMail();?>
>
                            <input type="hidden" name="oldMail" value=<?php echo $_smarty_tpl->tpl_vars['userInfo']->value->getMail();?>
 >
                        </dd>
                        <?php if ($_smarty_tpl->tpl_vars['userInfo']->value->getUserId() != '') {?>
                        <a id="changePassword">パスワード変更の場合はこちら</a>
                        <?php }?>
                        <div id="ipPass" <?php if ($_smarty_tpl->tpl_vars['userInfo']->value->getUserId() != '') {?> style="display: none;"<?php }?>>
                            <dt>
                                <label>新しいパスワード</label>
                            </dt>
                            <dd>
                                <input type="password" name="password">
                                <p class="txt-note">※半角英数字で4文字以上8文字以内</p>
                            </dd>
                            <dt>
                                <label>新しいパスワードを再入力</label>
                            </dt>
                            <dd>
                                <input type="password" name="retypePassword">
                            </dd>
                            <p class="check-group"><input type="checkbox" class="bg-check" id="ckbSendMail" name="ckbSendMail"><label for="01">登録メールアドレスにIDとPASSWORDが記載された確認メールを送信しますか？</label> </p>
                        </div>

                    </dl>
                        <!-- <p class="check-group"><input type="checkbox" class="bg-check" id="ckbSendMail" name="ckbSendMail"><label for="01">登録メールアドレスにIDとPASSWORDが記載された確認メールを送信しますか？</label> </p> -->
                        <p id="errMessage" class="txt-note"></p>
                        <ul class="list-button">
                            <li>
                                <a href="./?rt=loginUserList"><button class="button02 btnBack" id="btnBack">一覧へ</button></a>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['userInfo']->value->getUserId() == '') {?>
                                <li>
                                    <button class="button02" id="btnInsertUser">登録</button>
                                </li>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['userInfo']->value->getUserId() != '') {?>
                                <li>
                                    <button class="button02" id="btnUpdateUser">更新</button>
                                </li>
                            <?php }?>
                        </ul>
                </div>
            </div>
        </main>
<?php $_smarty_tpl->_subTemplateRender('file:footer.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
