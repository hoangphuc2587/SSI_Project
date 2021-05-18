<?php
/* Smarty version 3.1.33, created on 2020-07-27 11:13:51
  from 'D:\DUNG\PROJECT\SSI_PROJECT\20200723\ssi_hompage\ssi-admin\src\templates\loginUserList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1e9acfe0b2e3_45065268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09a7511ca9e66d15640de04adcb18418083045ed' => 
    array (
      0 => 'D:\\DUNG\\PROJECT\\SSI_PROJECT\\20200723\\ssi_hompage\\ssi-admin\\src\\templates\\loginUserList.tpl',
      1 => 1595841194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.part.tpl' => 2,
    'file:footer.part.tpl' => 1,
  ),
),false)) {
function content_5f1e9acfe0b2e3_45065268 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'default.conf', 'UserList', 0);
?>

<?php if ($_smarty_tpl->tpl_vars['loginRole']->value == '1') {?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>

<main class="main-content">
    <div class="block-contact">
        <div class="head">
            <h2 class="headline">ユーザー管理</h2>
            <a href="./?rt=userDetail" class="button02" id="btnAddUser">新規登録</a>
        </div>
        <div class="block-inner">
            <table class="group-table table-striped" id="tblUserList">
                <thead>
                <tr>
                    <th>ユーザーID</th>
                    <th>ユーザーメール</th>
                    <!-- <th>ロール</th> -->
                    <th>削除</th>
                </tr>
                </thead>
                <tbody>
                 <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listUser']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                  <tr>
                    <td class="userId"><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getUserId();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getMail();?>
</td>
                    <!-- <td><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getRole();?>
</td> -->
                    <td class="center"><button class="btn-icon" name="btnDeleteUser"><i class='fas fa-trash-alt fa-2x'></i></button></td>
                  </tr>
                <?php
}
}
?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender('file:footer.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
