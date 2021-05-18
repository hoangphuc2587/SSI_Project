<?php
include 'controller/ctl_news.php';

$newsController = new NewsController();
$newsModel = new NewsModel();
$limit = 4;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$total_records = $newsModel->countNews();
// if ($total_records > 0) {
$listNews = $newsController->getListNewsHome();
// }

?>
<!DOCTYPE html>
<!--[if IE 6]><?php
// include 'controller/ctl_news.php';

// $newsController = new NewsController();
// $newsModel = new NewsModel();
// $limit = 4;
// $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// $total_records = $newsModel->countNews();
// // if ($total_records > 0) {
// $listNews = $newsController->getListNewsHome();
// // }

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
    <title>株式会社ソフトウエア・サイエンス（SSI）</title>
    <!--seo-->
    <meta name="Keywords" content="SSI,Software Science Inc.,システム開発,ITコンサル,PmSQETs,SGS" />
    <meta name="description" content="ソフトウエア・サイエンス（SSI）は、日本ならではの技術とものづくりで世界で活躍する企業のICTを支援し、安全・安心・豊かな社会の創造に貢献します。ITコンサルティングから設計、開発、ソフトウェアの選定・導入、運用、保守まで、システム開発はお任せください。" />
    <meta name="robots" content="index,follow" />
    <!--OGP-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.ssi.co.jp/" />
    <meta property="og:title" content="株式会社ソフトウエア・サイエンス（SSI）" />
    <meta property="og:site_name" content="SSI" />
    <meta property="og:description" content="ソフトウエア・サイエンス（SSI）は、日本ならではの技術とものづくりで世界で活躍する企業のICTを支援し、安全・安心・豊かな社会の創造に貢献します。ITコンサルティングから設計、開発、ソフトウェアの選定・導入、運用、保守まで、システム開発はお任せください。" />
    <!--setting-->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <meta name="format-detection" content="telephone=no">
    <!--css-->
    <link rel="stylesheet" href="slick/slick.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/top.css" />
    <?php include 'partials/analytics.php'; ?>
</head>

<body>
<!-- Header -->
<?php include 'partials/header.php'; ?>

<article class="mainvisual">
    <div class="mainvisual-slide pc">
        <!-- <div class="mainvisual-slide-item">
          <img src="images/index/mv01.jpg" alt="mv 01">
        </div> -->
        <div class="mainvisual-slide-item">
            <img src="images/index/mv02.jpg" alt="mv 02">
        </div>
        <div class="mainvisual-slide-item">
            <a href ="product_sgs.php"><img src="images/index/mv03.jpg" alt="mv 03"></a>
        </div>
    </div>
    <div class="mainvisual-slide sp">
        <!-- <div class="mainvisual-slide-item">
          <img src="images/index/mv01_sp.jpg" alt="mv 01">
        </div> -->
        <div class="mainvisual-slide-item">
            <img src="images/index/mv02_sp.jpg" alt="mv 02">
        </div>
        <div class="mainvisual-slide-item">
            <a href ="product_sgs.php"><img class="imgwidth" src="images/index/mv03_sp.jpg" alt="mv 03"></a>
        </div>
    </div>
</article>

<div class="index">
    <div class="polygon01"><img src="images/index/polygon01.png" alt="polygon 01"></div>
    <div class="polygon02"><img src="images/index/polygon02.png" alt="polygon 02"></div>
    <div class="polygon03"><img src="images/index/polygon03.png" alt="polygon 03"></div>
    <div class="polygon04"><img src="images/index/polygon04.png" alt="polygon 04"></div>
    <!-- tab -->
    <div class="tab js-tab pc">
        <div class="container">
            <div class="tab-wrapper">
                <ul class="tab_list js-tab_list">
                    <li class="btn-tab blue is-current">SSIのサービス</li>
                    <li class="btn-tab green01">領域別ソリューション</li>
                    <li class="btn-tab green02">SSIの製品</li>
                </ul>
                <div class="tab_contents js-tab_contents tab_contents-topservice">
                    <div class="tab_contents_item is-open">
                        <div class='row'>
                            <div class='column'>
                                <div class='item'>
                                    <a href="service.php#consulting" title="ITコンサルティング">ITコンサルティング</a>
                                </div>
                                <div class='item'>
                                    <a href="service.php#develop" title="開発・導入">開発・導入</a>
                                </div>
                                <div class='item'>
                                    <a href="service.php#mainte" title="運用・保守">運用・保守</a>
                                </div>
                            </div>
                            <div class='column'>
                                <div class='item'>
                                    <a href="sol_it.php" title="製造 / IT">製造 / IT</a>
                                </div>
                                <div class='item'>
                                    <a href="solution_ryutsu.php" title="流通 / 金融">流通 / 金融</a>
                                </div>
                                <div class='item'>
                                    <a href="sol_kyoiku.php" title="教育">教育</a>
                                </div>
                            </div>
                            <div class='column'>
                                <div class='item'>
                                    <a href="product_pms.php" title="PmSQETs">PmSQETs</a>
                                </div>
                                <div class='item'>
                                    <a href="product_sgs.php" title="SGS">SGS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_contents_item">
                        <div class='row'>
                            <div class='column'>
                                <div class='item'>
                                    <a href="sol_it.php" title="製造 / IT">製造 / IT</a>
                                </div>
                            </div>
                            <div class='column'>
                                <div class='item'>
                                    <a href="solution_ryutsu.php" title="流通 / 金融">流通 / 金融</a>
                                </div>
                            </div>
                            <div class='column'>
                                <div class='item'>
                                    <a href="sol_kyoiku.php" title="教育">教育</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_contents_item">
                        <div class='row'>
                            <div class='column'>
                                <div class='item'>
                                    <a href="product_pms.php" title="PmSQETs">PmSQETs</a>
                                </div>
                            </div>
                            <div class='column'>
                                <div class='item'>
                                    <a href="product_sgs.php" title="SGS">SGS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- accordion -->
    <div class="accordion sp bg-green03">
        <div class="section s_04">
            <div class="accordion_one">
                <div class="accordion_header stay"><span>SSIのサービス</span>
                    <div class="i_box"><i class="one_i"></i></div>
                </div>
                <div class="accordion_inner stay">
                    <div class="box_one">
                        <div class="box_one_txt">
                            <a href="service.php#consulting" title="ITコンサルティング">ITコンサルティング</a>
                            <a href="service.php#develop" title="開発・導入">開発・導入</a>
                            <a href="service.php#mainte" title="運用・保守">運用・保守</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion_one">
                <div class="accordion_header"><span>領域別ソリューション</span>
                    <div class="i_box"><i class="one_i"></i></div>
                </div>
                <div class="accordion_inner">
                    <div class="box_one">
                        <div class="box_one_txt">
                            <a href="sol_it.php" title="製造 / IT">製造 / IT</a>
                            <a href="solution_ryutsu.php" title="流通 / 金融">流通 / 金融</a>
                            <a href="sol_kyoiku.php" title="教育">教育</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion_one">
                <div class="accordion_header"><span>SSIの製品</span>
                    <div class="i_box"><i class="one_i"></i></div>
                </div>
                <div class="accordion_inner">
                    <div class="box_one">
                        <div class="box_one_txt">
                            <a href="product_pms.php" title="PmSQETs">PmSQETs</a>
                            <a href="product_sgs.php" title="SGS">SGS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ssi -->
    <div class="ssi bg-green03">
        <div class="polygon01"><img src="images/index/polygon01.png" alt="polygon 01"></div>
        <div class="container">
            <h2 class="ttl-underline"><span>領域別ソリューション</span></h2>
            <div class="ssi-info">
                <p class="ssi-txt">
                    製造・流通・教育の3つの領域をメインにITを通して、お客様をサポートしております。
                </p>
                <ul class="ssi-list pc">
                    <li class="ssi-list-item">
                        <a href="sol_it.php">
                            <div class="ssi-ttl"><img src="images/index/ssi_ttl01.png" alt="製造 / IT"></div>
                            <div class="ssi-des">
                                <div class="ssi-ttl-hover"><img src="images/index/ssi_ttl_hover01.png" alt="製造 / IT"></div>
                                <p class="big">電子・デバイス / 計測・測定器 / 非金属<br>
                                    食品加工 / 医療・医薬品
                                </p>
                                <p class="small">
                                    ＃RPA ＃業務フロー中心設計<br>
                                    ＃勤怠 ＃DX ＃DataLake<br>
                                    ＃モダナイゼーション ＃コスト削減
                                </p>
                            </div>
                        </a>
                    </li>

                    <li class="ssi-list-item">
                        <a href="solution_ryutsu.php">
                            <div class="ssi-ttl"><img src="images/index/ssi_ttl02.png" alt="流通 / 金融"></div>
                            <div class="ssi-des">
                                <div class="ssi-ttl-hover"><img src="images/index/ssi_ttl_hover02.png" alt="流通 / 金融"></div>
                                <p class="big">顧客管理 / ペイメントサービス</p>
                                <p class="small">
                                    ＃POSレジ ＃ポイントカード<br>
                                    ＃勤怠 ＃決済システム ＃QR<br>
                                    ＃OLTP処理 ＃アンチマネーロンダリング
                                </p>
                            </div>
                        </a>
                    </li>

                    <li class="ssi-list-item">
                        <a href="sol_kyoiku.php">
                            <div class="ssi-ttl"><img src="images/index/ssi_ttl03.png" alt="教育"></div>
                            <div class="ssi-des">
                                <div class="ssi-ttl-hover"><img src="images/index/ssi_ttl_hover03.png" alt="教育"></div>
                                <p class="big">授業へのタブレット導入 / 基礎・<br>
                                    探究学習 / エビデンス教育<br>
                                    学校へのICT支援 / デジタル採点 / 自動採点</p>
                                <p class="small">
                                    #デジタル採点#BPO<br>
                                    #SGS#教務支援#AI-OCR技術<br>
                                    #エビデンスベースト
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="ssi-list-sp sp">
                    <li class="ssi-list-item-sp">
                        <a class="thumbnail" href="sol_it.php">
                            <img class="sp" src="images/index/ssi01.png" alt="製造 / IT">
                            <div class="item-des">
                                <p class="big">電子・デバイス / 計測・測定器 / 非金属<br>
                                    食品加工 / 医療・医薬品
                                </p>
                                <p class="small">
                                    ＃RPA ＃業務フロー中心設計<br>
                                    ＃勤怠 ＃DX ＃DataLake<br>
                                    ＃モダナイゼーション ＃コスト削減
                                </p>
                            </div>
                            <div class="gradient-border-list-item">
                                <div class="ssi-ttl-sp">
                                    <img class="ttl pc" src="images/index/ssi_ttl01.png" alt="製造 / IT">
                                    <img class="ttl sp" src="images/index/top_it_sp.png" alt="製造 / IT">
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="ssi-list-item-sp">
                        <a class="thumbnail small" href="solution_ryutsu.php">
                            <img class="sp" src="images/index/ssi02.png" alt="流通 / 金融">
                            <div class="item-des">
                                <p class="big">顧客管理 / ペイメントサービス</p>
                                <p class="small">
                                    ＃POSレジ ＃ポイントカード<br>
                                    ＃勤怠 ＃決済システム ＃QR<br>
                                    ＃OLTP処理 ＃アンチマネーロンダリング
                                </p>
                            </div>
                            <div class="gradient-border-list-item small">
                                <div class="ssi-ttl-sp">
                                    <img class="ttl pc" src="images/index/ssi_ttl02.png" alt="流通 / 金融">
                                    <img class="sp" src="images/index/20200116_SSI_TOP-SP_03.png" alt="流通 / 金融" >
                                </div></div>
                        </a>
                    </li>
                    <li class="ssi-list-item-sp">
                        <a class="thumbnail small add" href="sol_kyoiku.php">
                            <img class="sp" src="images/index/ssi03.png" alt="教育">
                            <div class="item-des">
                                <p class="big">
                                    授業へのタブレット導入 / 基礎・探究学習 / エビデンス教育<br/>
                                    学校へのICT支援 / デジタル採点 / 自動採点
                                </p>
                                <p class="small">
                                    #デジタル採点#BPO<br>
                                    #SGS#教務支援#AI-OCR技術<br>
                                    #エビデンスベースト
                                </p>
                            </div>
                            <div class="gradient-border-list-item small add">
                                <div class="ssi-ttl-sp">
                                    <img class="ttl pc" src="images/index/ssi_ttl03.png" alt="教育">
                                    <img class="ttl sp" src="images/index/20200116_SSI_TOP-SP_06.png" alt="教育">
                                </div></div>
                        </a>
                        </a>
                    </li>
                </ul>
                <div class="btn-wrapper absolute">
                    <div class="border_wp">
                        <a href="about.php" class="btn_sgpm">SSIとは？<span class="btn_cl"></span> </a>
                        <span class="btn-border-psg"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- service -->
    <section class="service bg-light">
        <div class="container">
            <h2 class="ttl-underline"><span>SSIのサービス</span></h2>
            <ul class="service-list">
                <li class="service-list-item">
                    <a class="thumbnail" href="service.php#consulting">
                        <img class="pc" src="images/index/article01.png" alt="コンサルティング">
                        <img class="sp" src="images/index/article01_sp.png" alt="コンサルティング">
                        <p class="service-txt">コンサルティング</p>
                        <div class="gradient-border"></div>
                    </a>
                </li>
                <li class="service-list-item">
                    <a class="thumbnail" href="service.php#develop">
                        <img class="pc" src="images/index/article02.png" alt="開発・導入">
                        <img class="sp" src="images/index/article02_sp.png" alt="開発・導入">
                        <p class="service-txt">開発・導入</p>
                        <div class="gradient-border"></div>
                    </a>
                </li>
                <li class="service-list-item">
                    <a class="thumbnail" href="service.php#mainte">
                        <img class="pc" src="images/index/article03.png" alt="運用・保守">
                        <img class="sp" src="images/index/article03_sp.png" alt="運用・保守">
                        <p class="service-txt">運用・保守</p>
                        <div class="gradient-border"></div>
                    </a>
                </li>
            </ul>

        </div>
    </section>

    <!-- common product -->
    <?php include 'partials/common_product.php'; ?>

    <!-- topics -->
    <section class="topics bg-light">
        <div class="container">
            <h2 class="ttl-underline topic"><span>topics</span></h2>
            <ul class="topics-list">
                <?php
                if ($total_records) :
                    foreach ($listNews as &$news) : ?>
                        <li class="topics-list-item">
                            <a href='news.php#<?= $news->getId(); ?>'>
                                <p class="datetime"><?= str_replace('-', '.', $news->getDisplayDate()); ?></p>
                                <p class="txt"><?= $news->getTitle(); ?></p>
                            </a>
                        </li>
                    <?php
                    endforeach;
                else :
                    echo '<p style="text-align:center; margin:50px 0">新着情報はありません。</p>';
                endif; ?>
            </ul>
        </div>
    </section>

    <!-- map -->
    <div class="map bg-light">
        <div class="container map-inner">
            <div class="img map-item">
                <img class="pc" src="images/index/map.png" alt="map">
                <!--          <img class="sp" src="images/index/map_sp.png" alt="map">-->
                <img class="sp" src="images/index/top_map_sp.png" alt="map">
            </div>
            <div class="txt map-item">
                <p class="ttl">国内外のパートナー様</p>
                <div class="info">
                    <p>お客様の多様なニーズにこたえるため、弊社国内３拠点（東京・大阪・沖縄）を通して、国内外のビジネスパートナー様のご協力をいただき、ビジネスを展開しております。</p>
                    <p>2019年度からは、一般社団法人ニアショア協会<span>（https://www.near-shore-it.jp/）</span>のご協力のもと国内のIT企業様と沖縄の沖縄ITイノベーション戦略センター（ISCO）のご協力のもと、アジアのIT企業様との連携連携を深めております。
                    </p>
                    <p>国外のビジネスパートナー様との協業も増え、中国・インド・シンガポール・ベトナム・ミャンマーなどグローバルに展開をしております。</p>
                    <p>今後とも共創、協業を考えパートナー企業の拡大を進めてまいります。</p>
                </div>
            </div>
        </div>
    </div>

    <!-- common contact -->
    <?php include 'partials/common_contact.php'; ?>
</div>

<!-- Footer -->
<?php include 'partials/footer.php'; ?>

<!-- js -->
<script src="slick/slick.js"></script>
<script src="js/top.js"></script>
</body>

</html>