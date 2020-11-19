<?php
include 'controller/ctl_news.php';
date_default_timezone_set('UTC');

$news = new TNews();
if (isset($_GET['preview'])) {
    $news->setTitle(htmlspecialchars($_POST['title']));
    $news->setContent($_POST['content']);
    $news->setImage($_POST['image']);
    $news->setDisplayDate($_POST['displayDate']);
}
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7 eq-ie6" lang="ja"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8 eq-ie7" lang="ja"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9 eq-ie8" lang="ja"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ja">
<!--<![endif]-->

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta charset="utf-8">
    <title>○○○○○○○○○○○○○○○○○○○○</title>
    <!--seo-->
    <meta name="Keywords" content="○○○○○○○○○○○○○○○○○○○○" />
    <meta name="description" content="○○○○○○○○○○○○○○○○○○○○" />
    <meta name="robots" content="index,follow" />
    <!--OGP-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="○○○○○○○○○○○○○○○○○○○○" />
    <meta property="og:title" content="○○○○○○○○○○○○○○○○○○○○" />
    <meta property="og:image" content="○○○○○○○○○○○○○○○○○○○○" />
    <meta property="og:site_name" content="○○○○○○○○○○○○○○○○○○○○" />
    <meta property="og:description" content="○○○○○○○○○○○○○○○○○○○○" />

    <!--setting-->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <meta name="format-detection" content="telephone=no">
    <!--css-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/nav.css" />
	<?php include 'partials/analytics.php'; ?>
</head>

<body>
    <?php
    $thisPageName = 'news';
    ?>
    <?php include 'partials/header.php'; ?>
    <div class="news bg-green03">
        <!-- sub visual -->
        <div class="sub-visual">
            <h2 class="sub-visual-txt">新着情報</h2>
        </div>

        <!-- news list -->
        <div class="news-list-wrapper">
            <div class="polygon01"><img src="images/news/polygon01.png" alt="polygon 01"></div>
            <div class="polygon02"><img src="images/news/polygon02.png" alt="polygon 02"></div>
            <div class="polygon03"><img src="images/news/polygon03.png" alt="polygon 03"></div>
            <div class="polygon04"><img src="images/news/polygon04.png" alt="polygon 04"></div>
            <div class="container">
                <ul class="news-list">

                    <li class="news-list-item one-img">
                        <a href="#">
                            <div class="news-list-head">
                                <p class="btn-wrapper">
                                    <span class="btn"><span><?php echo str_replace('/', '.', $news->getDisplayDate()); ?></span></span>
                                </p>
                                <p class="news-list-ttl"><?php echo $news->getTitle(); ?> </p>
                            </div>
                            <div class="news-list-content">
                                <div class="txt">
                                    <?php echo $news->getContent();
                                    ?>
                                </div>
                                <ul class="news-list-img">

                                    <?php if ($news->getImage() != null || $news->getImage() != "") {

                                        $listImage = explode(", ", $news->getImage());

                                        foreach ($listImage as &$image) {
                                    ?>
                                            <li> <img src="<?php echo $image; ?>" alt="news"></li>
                                    <?php
                                        }
                                    } ?>


                                </ul>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- common product -->
        <?php include 'partials/common_product.php'; ?>
        <!-- common contact -->
        <?php include 'partials/common_contact.php'; ?>
    </div>
    <!-- / #Contents -->
    <?php include 'partials/footer.php'; ?>
</body>

</html>