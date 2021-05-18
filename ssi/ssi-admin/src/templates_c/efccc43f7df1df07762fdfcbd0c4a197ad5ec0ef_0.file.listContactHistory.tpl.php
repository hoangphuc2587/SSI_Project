<?php
/* Smarty version 3.1.33, created on 2020-07-31 03:01:55
  from '/var/www/ssi-test/ssi-admin/src/templates/listContactHistory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f2389a381d8e2_63358031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efccc43f7df1df07762fdfcbd0c4a197ad5ec0ef' => 
    array (
      0 => '/var/www/ssi-test/ssi-admin/src/templates/listContactHistory.tpl',
      1 => 1596106330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.part.tpl' => 2,
    'file:footer.part.tpl' => 1,
  ),
),false)) {
function content_5f2389a381d8e2_63358031 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'default.conf', 'ContactHistory', 0);
?>

<?php if ($_smarty_tpl->tpl_vars['loginRole']->value == '1') {?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender('file:header.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>

<main class="main-content contact-history">
    <div class="block-contact">
        <div class="head">
            <h2 class="headline">お問い合わせ履歴</h2>
        </div>
        <div class="block-inner">
            <table class="group-table table-striped table-column-width">
                <thead>
                    <tr>
                        <th class="small-column">NO</th>
                        <th>会社名</th> <!-- company -->
                        <th>お名前</th> <!-- name -->
                                                 <th class="long-column">住所</th> <!-- address -->
                        <th>電話番号</th> <!-- phone -->
                        <th class="medium-column">メールアドレス</th> <!-- email -->
                        <th>FAX番号</th> <!-- fax -->
                        <th>ご担当者様携帯番号</th><!-- phone2 -->
                        <th class="medium-column">お問い合わせの種類</th><!-- iquiry -->
                        <th class="long-column">お問い合わせ内容</th><!-- content -->
                        <th>送信日</th><!-- create day -->
                    </tr>
                </thead>
                <tbody>
                    <?php if ((isset($_smarty_tpl->tpl_vars['contact']->value) && !empty($_smarty_tpl->tpl_vars['contact']->value))) {?>
                    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['contact']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] = $__section_i_0_iteration;
?>
                    <tr>
                        <td class="center no"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] : null);?>
</td>
                        <td class="area"><?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCompanyName();?>

                        </td>
                        <td class="guest-name"><?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getGuestName();?>
 
                        </td>
                                                 <td>
                            <?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getPostalCode();?>
 <br>
                            <?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getPrefectures();?>
 <?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCity();?>

                            <?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getAddress();?>

                        </td> 
                        <td class="phone">
                            <?php if (((($_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getPhone() !== null )) && !empty($_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getPhone()))) {?>
                            <?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getPhone();?>

                            <?php }?>
                        </td>
                     
                        <td class="email">
                            <?php if (((($_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getEmail() !== null )) && !empty($_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getEmail()))) {?>
                            <?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getEmail();?>

                            <?php }?>
                        </td>
                           <td class="phone-code"><?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getFax();?>
 
                        </td>
                        </td>
                           <td class="phone-code"><?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getPhoneContact();?>
 
                        </td>
                        </td>
                           <td class="phone-code"><?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getInquiryItem();?>
 
                        </td>
                        </td>
                           <td class="content"><?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getContent();?>
 
                        </td> 
                        <td class="create-date">
                            <?php if (((($_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreateDate() !== null )) && !empty($_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreateDate()))) {?>
                            <?php echo $_smarty_tpl->tpl_vars['contact']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getCreateDate();?>

                            <?php }?>
                        </td>

                    </tr>
                    <?php
}
}
?>
                    <?php }?>
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <?php if ($_smarty_tpl->tpl_vars['total_records']->value != 0) {?>
        <div class="news-pagination contact-pagination">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($_smarty_tpl->tpl_vars['total_page']->value <= 5 && $_smarty_tpl->tpl_vars['current_page']->value >= 1 && $_smarty_tpl->tpl_vars['total_page']->value > 1 && $_smarty_tpl->tpl_vars['total_records']->value != 0) {?>
                        <?php if ($_smarty_tpl->tpl_vars['current_page']->value != 1 && $_smarty_tpl->tpl_vars['total_page']->value > 2) {?>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
"><</a></li>
                        <?php } elseif ($_smarty_tpl->tpl_vars['current_page']->value == 1 && $_smarty_tpl->tpl_vars['total_page']->value > 2) {?>
                            <li class="disabled"><a><</a></li>
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['total_page']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['total_page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?> 
                            <li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['i']->value) {?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
  <?php }?>"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php }
}
?>
                        <?php if ($_smarty_tpl->tpl_vars['current_page']->value != $_smarty_tpl->tpl_vars['total_page']->value && $_smarty_tpl->tpl_vars['total_page']->value > 2) {?>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
">></a></li>
                            <?php } elseif ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['total_page']->value && $_smarty_tpl->tpl_vars['total_page']->value > 2) {?><li class="disabled"><a>></a></li>
                        <?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['total_page']->value > 5) {?>
                        <?php if ($_smarty_tpl->tpl_vars['current_page']->value < 4) {?>
                            <?php if ($_smarty_tpl->tpl_vars['current_page']->value == 1) {?>
                                <li class="disabled"><a><</a></li>
                                <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
"><</a></li>
                            <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - (1) : 1-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['i']->value) {?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
  <?php }?>"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                            <?php }
}
?>

                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['total_page']->value) {?>
                             <li class="disabled"><a>></a></li>
                            <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
">></a></li>
                            <?php }?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_page']->value-2) {?>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item "><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
</a></li>
                            <li class="page-item active"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
">></a></li>
                        <?php } elseif ($_smarty_tpl->tpl_vars['current_page']->value >= $_smarty_tpl->tpl_vars['total_page']->value-3) {?>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <!--  $i=$current_page to $total_page -->
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['total_page']->value+1 - ($_smarty_tpl->tpl_vars['total_page']->value-3) : $_smarty_tpl->tpl_vars['total_page']->value-3-($_smarty_tpl->tpl_vars['total_page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['total_page']->value-3, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['i']->value) {?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
  <?php }?>"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                            <?php }
}
?>
                            <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['total_page']->value) {?>
                                <li class="disabled"><a>></a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
">></a></li>
                            <?php }?>
                        <?php }?>

                        
                    <?php }?>
                </ul>
            </nav>
        </div>
        <?php }?>
    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender('file:footer.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
