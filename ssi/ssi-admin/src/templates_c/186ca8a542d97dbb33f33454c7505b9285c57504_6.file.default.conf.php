<?php /* Smarty version 3.1.33, created on 2020-07-24 08:16:52
         compiled from 'D:\DUNG\PROJECT\SSI_PROJECT\20200723\ssi_hompage\ssi-admin\src\configs\default.conf' */ ?>
<?php
/* Smarty version 3.1.33, created on 2020-07-24 08:16:52
  from 'D:\DUNG\PROJECT\SSI_PROJECT\20200723\ssi_hompage\ssi-admin\src\configs\default.conf' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1a7cd4394ce1_62586803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '186ca8a542d97dbb33f33454c7505b9285c57504' => 
    array (
      0 => 'D:\\DUNG\\PROJECT\\SSI_PROJECT\\20200723\\ssi_hompage\\ssi-admin\\src\\configs\\default.conf',
      1 => 1595484258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1a7cd4394ce1_62586803 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigVars($_smarty_tpl, array (
  'sections' => 
  array (
    'Index' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'ホームページ',
        'pageDescription' => 'home page',
        'pageKeywords' => 'demo website',
      ),
    ),
    'Login' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'ログイン',
      ),
    ),
    'Dashboard' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'ダッシュボード',
        'headerSource' => '<script src="src/js/dashboard.js"></script>',
      ),
    ),
    'UserList' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'ユーザー一覧',
        'headerSource' => '<script src="src/js/loginUserList.js"></script>',
      ),
    ),
    'UserDetail' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'ユーザー情報',
        'headerSource' => '<script src="src/js/userDetail.js"></script>',
      ),
    ),
    'Contact' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'Contact',
        'headerSource' => '<script src="component/ckeditor/ckeditor.js"></script> <script src="src/js/contact.js"></script>',
      ),
    ),
    'ContactHistory' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'お問い合わせ履歴',
        'headerSource' => '<script src="src/js/contactHistory.js"></script><link rel="stylesheet" href="src/css/contact.css">',
      ),
    ),
    'Lesson' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'レッスンリスト',
        'headerSource' => '<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"><script src="src/js/lesson.js"><script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script></script><link rel="stylesheet" href="src/css/lesson.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" type="text/javascript"></script>',
      ),
    ),
    'ListNews' => 
    array (
      'vars' => 
      array (
        'pageTitle' => 'ニュース',
        'headerSource' => '<script type="text/javascript" src="src/js/vendor/bootstrap-datepicker.js"></script><link rel="stylesheet" href="src/css/lib/bootstrap-datepicker.css"><script src="component/ckeditor/ckeditor.js"></script><script src="src/js/news.js"></script><link rel="stylesheet" href="src/css/news.css"><link rel="stylesheet" href="src/css/news.css">',
      ),
    ),
  ),
  'vars' => 
  array (
    'pageTitle' => 'Main Title',
  ),
));
}
}
