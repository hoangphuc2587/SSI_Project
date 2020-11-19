<?php
include 'controller/ctl_news.php';

$newsController = new NewsController();
$newsModel = new NewsModel();
$limit = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$total_records = $newsModel->countNews();
if ($total_records > 0) {
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    }
    $record_skip = ($current_page * $limit) - $limit;
    $record_skip_page = 1;
    $nextpage = $current_page + 1;
    $previouspage = $current_page - 1;
    $listNews = $newsController->getListNews($record_skip, $limit);
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
    <title>新着情報｜ソフトウエア・サイエンスの活動やお知らせを日々更新していきます。</title>
    <!--seo-->
    <meta name="Keywords" content="SSI Software Science Inc.,株式会社ソフトウエア・サイエンス,システム開発,ITコンサル,PmSQETS,SGS" />
    <meta name="description" content="ソフトウエア・サイエンス（SSI）は、日本ならではの技術とものづくりで世界で活躍する企業のICTを支援し安全・安心・豊かな社会の創造に貢献します。ITコンサルティングから設計、開発、ソフトウェアの選定・導入、運用、保守まで、システム開発はお任せください。" />
    <meta name="robots" content="index,follow" />
    <!--OGP-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.ssi.co.jp/" />
    <meta property="og:title" content="新着情報｜ソフトウエア・サイエンスの活動やお知らせを日々更新していきます。" />

    <meta property="og:site_name" content="SSI" />
    <meta property="og:description" content="ソフトウエア・サイエンス（SSI）は、日本ならではの技術とものづくりで世界で活躍する企業のICTを支援し安全・安心・豊かな社会の創造に貢献します。ITコンサルティングから設計、開発、ソフトウェアの選定・導入、運用、保守まで、システム開発はお任せください。" />

    <!--setting-->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <meta name="format-detection" content="telephone=no">
    <!--css-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/nav.css" />

</head>

<body>
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
                    <?php
                    if ($total_records) {
                        foreach ($listNews as &$news) { ?>
                            <li class="news-list-item one-img">
                            <span class="anchor" id=<?= $news->getId(); ?>></span>
                                <a href="#<?= $news->getId(); ?>">
                                    <div class="news-list-head">
                                        <p class="btn-wrapper">
                                            <span class="btn"><span><?php echo str_replace('-', '.', $news->getDisplayDate()); ?></span></span>
                                        </p>
                                        <p class="news-list-ttl"><?php echo $news->getTitle(); ?> </p>
                                    </div>
                                    <div class="news-list-content">
                                        <div class="txt">
                                            <?php echo $news->getContent(); ?>
                                        </div>
                                        <ul class="news-list-img">
                                            <?php if ($news->getImage() != null || $news->getImage() != "") {
                                                $listImage = explode(",", $news->getImage());
                                                foreach ($listImage as &$image) {
                                            ?>
                                                    <li> <img src="images/news/<?php echo $image; ?>" alt="news"></li>
                                            <?php }
                                            } ?>

                                        </ul>
                                    </div>
                                </a>
                            </li>
                    <?php }
                    } ?>
                </ul>

                <!-- pagination -->
                <?php include 'pagination.php'; ?>
               
            </div>
        </div>

        <!-- common product -->
        <?php include 'partials/common_product.php'; ?>
        <!-- common contact -->
        <?php include 'partials/common_contact.php'; ?>
    </div>
    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>
</body>

</html>