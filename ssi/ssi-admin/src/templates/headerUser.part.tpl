<!DOCTYPE html>
<html class="no-js" lang="ja">
<!--<![endif]-->
<head>
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta charset="utf-8">
    <title>{$smarty.config.pageTitle}</title>
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
    <!-- <link rel="apple-touch-icon" href="images/ico_home.jpg">-->
    <!--css-->
    <link rel="stylesheet" href="src/css/lib/bootstrap-theme.min.css">
    <link rel="stylesheet" href="src/css/lib/jquery-ui.min.css">
    <link rel="stylesheet" href="src/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/lib/normalize.css">
    <link rel="stylesheet" href="src/css/lib/module.css">
    <link rel="stylesheet" href="src/css/common.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="src/js/jquery-3.3.1.min.js"></script>
    {$smarty.config.headerSource}
</head>
<body id="Dashboard" class="fixed-navbar">
<div id="Container">
    <Header class="fixed-top">
        <div class="header-left">
            <p class="text-name"><a href="dashboard.html">OBA SHOKAI
                <span>管理システム</span></a>
            </p>
        </div>
        <div class="header-right">
            <div class="ttl-name">{$smarty.session.loginUserId}</div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="ttl-user dropdown-toggle" data-toggle="dropdown" href="#"><span><i class="fas fa-user-alt"></i></span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./?rt=userDetail&loginUserEdit=true">ユーザー情報</a></li>
                            <li><a href="./?rt=login&logout=true">ログアウト</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </Header>
    <div class="block-common">
        <aside class="sidebar">
            <ul>
                <li>
                    <a href="dashboard.html" class="active"><i class="fas fa-tachometer-alt"></i><span>ダッシュボード</span></a>
                </li>
                <li>
                    <a href="category.html"><i class="far fa-list-alt"></i><span>機種</span></a>
                </li>
                <li>
                    <a href="inventory.html"><i class="fas fa-graduation-cap"></i><span>レッスン管理</span></a>
                </li>
                <li>
                    <a href="user.html"><i class="fas fa-users"></i><span>ユーザー管理</span></a>
                </li>
                <li>
                    <a href="contact.html"><i class="fas fa-envelope"></i><span>お問い合わせ</span></a>
                </li>
            </ul>
            <footer>
                <p class="copyright">Copyright &copy 2018 AFC Co., Ltd.</p>
            </footer>
        </aside>