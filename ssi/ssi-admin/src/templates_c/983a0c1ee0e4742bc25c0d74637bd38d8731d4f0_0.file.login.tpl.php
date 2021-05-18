<?php
/* Smarty version 3.1.33, created on 2020-07-30 11:04:51
  from '/var/www/ssi-test/ssi-admin/src/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f22a9535dcce7_72148525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '983a0c1ee0e4742bc25c0d74637bd38d8731d4f0' => 
    array (
      0 => '/var/www/ssi-test/ssi-admin/src/templates/login.tpl',
      1 => 1596106331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f22a9535dcce7_72148525 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'default.conf', 'Login', 0);
?>

<!DOCTYPE html>
<html class="no-js" lang="ja">
<!--<![endif]-->
<head>
    <meta name="viewport"
    content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'pageTitle');?>
</title>
   <!--seo-->
    <meta name="Keywords" content=""/>
    <meta name="description" content=""/>
    <!--OGP-->
    <meta property="og:title" content="○○○○○○○○○○" name="og:title">
    <meta property="og:type" content="website" name="og:type">
    <meta property="og:description" content="○○○○○○○○○○○○○○○○○○○○" name="og:description"/>
    <meta property="og:url" content="http://www.○○○○.com/" name="og:url">
    <meta property="og:image" content="http://www.○○○○.com/images/ogp.jpg" name="og:image"/>
    <meta property="og:site_name" content="店舗名○○○○" name="og:site_name">
    <meta property="og:email" content="info@○○○○.com" name="og:email">
    <meta property="og:phone_number" content="00-0000-0000" name="og:phone_number">
    <!--setting-->
    <!-- <link rel="shortcut icon" href="images/favicon.ico"/> -->
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" href="images/ico_home.jpg">
    <!--css-->
    <link rel="stylesheet" href="src/css/lib/bootstrap-theme.min.css">
    <link rel="stylesheet" href="src/css/lib/jquery-ui.min.css">
    <link rel="stylesheet" href="src/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/lib/normalize.css">
    <link rel="stylesheet" href="src/css/lib/module.css">
    <link rel="stylesheet" href="src/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="src/js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="src/js/login.js"><?php echo '</script'; ?>
>
</head>

<body id="LoginForm">
    <div class="inner">
        <!-- <h1 class="form-heading">情報管理システム</h1> -->
        <div class="login-form">
            <div class="main-div">
                <div class="title">
                    <h2>情報管理システム</h2>
                </div>
                    <form id="frmlogin" name="frmlogin" class="gradient-border">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                            <input type="email" class="form-control" id="inputUserId" name="inputUserId" placeholder="ユーザーIDを入力してください">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-lock"></i></i></span>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword"  placeholder="パスワードを入力してください">
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btnLogin" class="button btn">ログイン</button>
                        </div>
                        <div class="forgot">
                           <!--                          <p class="pb-10"><a href="./?rt=idForget">IDを忘れた方</a></p>
                        <p><a href="./?rt=idForget/forgetPassword">パスワードを忘れた方</a></p> -->
                        </div>

                        <div class="error">
                            <span id="errMessage"></span>
                        </div>

                    </form>
             
            </div>
        </div>
    </div>
</div>
</body>
</html><?php }
}
