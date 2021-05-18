<?php
/* Smarty version 3.1.33, created on 2020-07-27 09:11:43
  from 'D:\DUNG\PROJECT\SSI_PROJECT\20200723\ssi_hompage\ssi-admin\src\templates\listNews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1e9a4f740447_51242813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63caa2ea257efbfe3718a41b15e4092b88bdaa79' => 
    array (
      0 => 'D:\\DUNG\\PROJECT\\SSI_PROJECT\\20200723\\ssi_hompage\\ssi-admin\\src\\templates\\listNews.tpl',
      1 => 1595484339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.part.tpl' => 2,
    'file:footer.part.tpl' => 1,
  ),
),false)) {
function content_5f1e9a4f740447_51242813 (Smarty_Internal_Template $_smarty_tpl) {
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
            <h2 class="headline">ニュースリスト</h2>
            <a href="./?rt=news/addNews" class="button02">ニュースを追加</a>
        </div>
        <div class="block-inner">
            <table class="group-table table-striped" id="tblNews">
                <thead>
                    <tr>
                        <th class="small-column">NO</th>
                        <th class="medium-column">タイトル</th>
                        <th class="newsImg-column">画像</th>
                        <!-- th class="long-column">内容</th -->
                        <th>表示</th>
                        <th>登録日付</th>
                        <th class="action">アクション</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ((isset($_smarty_tpl->tpl_vars['listNews']->value) && !empty($_smarty_tpl->tpl_vars['listNews']->value))) {?>
                    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listNews']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] = $__section_i_0_iteration;
?>
                    <tr >
                        <td class="center"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] : null);?>
</td>
                        <td  style="max-width: 200px"><?php echo $_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getTitle();?>
</td>
                        <td class="center">
                            <?php if ($_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getImage() != null) {?>
                            
                                <?php $_smarty_tpl->_assignInScope('listImage', explode(",",$_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getImage()));?>
                                <?php $_smarty_tpl->_assignInScope('arr', $_smarty_tpl->tpl_vars['listImage']->value[0]);?>
                                    <img class="image-news" src="<?php echo $_smarty_tpl->tpl_vars['imgPath']->value;
echo $_smarty_tpl->tpl_vars['arr']->value;?>
">
                            
                            <?php } else { ?>
                             <img class="image-news" src="src/image/no-image.png">
                            <?php }?>
                        </td>
                        <!-- td style="max-width: 600px"><?php echo $_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getContent();?>
</td -->
                        <td class="center">
                            <div class="on-off-btn mr20">
                                <div class="toggle-group">
                                    <input name="toggleDisplay" id="toggleDisplay<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] : null);?>
" type="checkbox" 
                                           tabindex="1">
                                    <label for="toggleDisplay<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] : null);?>
">&nbsp;</label>
                                    <div class="onoffswitch pull-right" aria-hidden="true">
                                        <div class="onoffswitch-label">
                                            <div class="onoffswitch-inner"></div>
                                            <div class="onoffswitch-switch"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="center" style="max-width: 200px"><?php echo $_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getDisplayDate();?>
</td>
                        <td class="align-center action">
                            <a href="./?rt=news/edit&id=<?php echo $_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getId();?>
"  class="btnEditCategory"><i class="fas fa-edit fa-2x"></i></a>
                            <a href="./?rt=news/delete&id=<?php echo $_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getId();?>
" class="btnDeleteNews"><i class="fas fa-trash-alt fa-2x"></i></a> 
                        </td>
                        <input type="hidden" id=id<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] : null);?>
 class="newId" value=<?php echo $_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getId();?>
 />
                        <input type="hidden" id=displayFlag<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['rownum'] : null);?>
 value=<?php echo $_smarty_tpl->tpl_vars['listNews']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]->getDisplayFlag();?>
 />
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
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
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
  <?php }?>"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php }
}
?>
                        <?php if ($_smarty_tpl->tpl_vars['current_page']->value != $_smarty_tpl->tpl_vars['total_page']->value && $_smarty_tpl->tpl_vars['total_page']->value > 2) {?>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
">></a></li>
                            <?php } elseif ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['total_page']->value && $_smarty_tpl->tpl_vars['total_page']->value > 2) {?><li class="disabled"><a>></a></li>
                        <?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['total_page']->value > 5) {?>
                        <?php if ($_smarty_tpl->tpl_vars['current_page']->value < 4) {?>
                            <?php if ($_smarty_tpl->tpl_vars['current_page']->value == 1) {?>
                                <li class="disabled"><a><</a></li>
                                <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
"><</a></li>
                            <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - (1) : 1-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['i']->value) {?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
  <?php }?>"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                            <?php }
}
?>

                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['total_page']->value) {?>
                             <li class="disabled"><a>></a></li>
                            <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
">></a></li>
                            <?php }?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_page']->value-2) {?>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item "><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
</a></li>
                            <li class="page-item active"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
">></a></li>
                        <?php } elseif ($_smarty_tpl->tpl_vars['current_page']->value >= $_smarty_tpl->tpl_vars['total_page']->value-3) {?>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['previouspage']->value;?>
"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <!--  $i=$current_page to $total_page -->
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['total_page']->value+1 - ($_smarty_tpl->tpl_vars['total_page']->value-3) : $_smarty_tpl->tpl_vars['total_page']->value-3-($_smarty_tpl->tpl_vars['total_page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['total_page']->value-3, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['i']->value) {?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
  <?php }?>"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                            <?php }
}
?>
                            <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['total_page']->value) {?>
                                <li class="disabled"><a>></a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="?rt=news&page=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
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
<?php echo '<script'; ?>
 type="text/javascript">
     //Event when delete
    $("button[name='btnDeleteNews']").click(function(e) {

        var confirm = window.confirm('この新着を削除してよろしいですか？')
        if (confirm) {
            var del_id = $(this).attr("data-id");
            var row = $(this).closest('tr');
            var parent = $(this).parent().parent();
            var postData = {
                id:del_id
            };
            //Call ajax for update Delete Flag to DB
            $.ajax({
                type:'POST',
                contentType: 'application/json',
                url: './?rt=news/delete',
                dataType: "json",
                data:JSON.stringify(postData),
                success:function(response) { 
                    row.remove();
                },
                 error: function(response) {
                    alert("サーバエラー");
                }
            });    
        }else{
            e.preventDefault();
        }
        
        e.stopPropagation();
    });
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender('file:footer.part.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
