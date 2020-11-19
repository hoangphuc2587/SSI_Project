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
    <title>お問い合わせ｜株式会社ソフトウエア・サイエンス（SSI）</title>
    <!--seo-->
    <meta name="Keywords" content="SSI,Software Science Inc.,システム開発,ITコンサル,PmSQETs,SGS" />
    <meta name="description" content="ITコンサルティングから設計、開発、ソフトウェアの選定・導入、運用、保守まで、システム開発はソフトウエア・サイエンス（SSI）にお任せください。ご質問・ご相談など、お気軽にお問い合わせください。" />
    <meta name="robots" content="index,follow" />
    <!--OGP-->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.ssi.co.jp/" />
    <meta property="og:title" content="お問い合わせ｜株式会社ソフトウエア・サイエンス（SSI）" />

    <meta property="og:site_name" content="SSI" />
    <meta property="og:description" content="ITコンサルティングから設計、開発、ソフトウェアの選定・導入、運用、保守まで、システム開発はソフトウエア・サイエンス（SSI）にお任せください。ご質問・ご相談など、お気軽にお問い合わせください。" />

    <!--setting-->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <meta name="format-detection" content="telephone=no">
    <!--css-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <link rel="stylesheet" href="css/captcha.css" />
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>

<body onload="createCaptcha()">
    <!-- Header -->
    <?php include 'partials/header.php'; ?>

    <main class="contact">

        <!-- Subvisual -->
        <div class="sub-visual">
            <h2 class="sub-visual-txt">お問い合わせ</h2>
        </div>

        <!-- Contact -->
        <div class="contact-wrapper">
            <div class="polygon01">
                <img src="images/contact/polygon01.png" alt="polygon 01">
            </div>
            <div class="polygon02">
                <img src="images/contact/polygon02.png" alt="polygon 02">
            </div>

            <!-- Infomation -->
            <div class="contact-phone" id="headline">
                <div class="contact-inner">
                    <h3 class="ttl-underline"><span>お電話でのお問い合わせ</span></h3>
                    <p class="contact-txt pc">どのように質問したらいいかわからない。ざっくりと相談したい。フォームの入力が手間がかかる。など…
                        直接お電話にてお問い合わせください。誠意を持って対応させていただきます。</p>
                    <p class="contact-txt sp">どのように質問したらいいかわからない。ざっくりと相談したい。フォームの入力が手間がかかる。など…<br/>
                        直接お電話にてお問い合わせください。誠意を持って対応させていただきます。</p>
                    <div class="infomation">
                        <div class="img">
                            <img src="images/contact/infomation.png" alt="infomation">
                        </div>
                        <div class="txt">
                            <p>
                                <span>営業時間</span><span>10:00～17:00</span>
                            </p>
                            <p>
                                <span>営業日</span><span>土日・祝祭日・連休を除く</span>
                            </p>
                            <p class="phone">
                                <span><img src="images/contact/icn_phone.png" alt=""></span>
                                <span class="pc">03-5952-1311</span>
                                <a href="tel:03-5952-1311" class="sp">03-5952-1311</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact form  -->
            <div class="contact-form" id="contact_form">
                <div class="contact-inner">
                    <h3 class="ttl-underline">
                        <span>お問い合わせフォーム</span>
                    </h3>
                    <form action="./ctl_sendMail.php" method="post" enctype="multipart/form-data" class="h-adr" id="a2">
                        <div class="block-form">
                            <table>
                                <tr>
                                    <th>会社名<span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input class="input" type="text" name="company-name">
                                        <span class="errMessage" id="errInputCompanyName"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>お名前<span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input class="input" type="text" name="name">
                                        <span class="errMessage" id="errInputName"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ご住所<span class="required">必須</span> </th>
                                    <td>
                                        <p class="text14 pb-5">郵便番号</p>
                                        <ul class="list-form pb-10">
                                            <li class="list-tbl">
                                                <input placeholder="半角数字のみ" type="tel" name="code" class="input p-postal-code" size="3" maxlength="3" onwheel="this.blur()" />

                                                <span class="line-input">
                                                    <img src="images/contact/line_input.png" alt="line">
                                                </span>
                                                <span class="p-country-name" style="display:none;">Japan</span>
                                                <input type="tel" name="code02" class="input p-postal-code" size="4" maxlength="4" />
                                            </li>
                                        </ul>
                                        <span class="errMessage" id="errInputZipCode"></span>
                                        <ul class="list-form">
                                            <li class="w01">
                                                <p class="text14 pb-5">都道府県</p>
                                                <input placeholder="自動入力" class="input p-region" type="text" name="state" />
                                            </li>
                                            <li class="w02">
                                                <p class="text14 pb-5">市区町村</p>
                                                <input placeholder="自動入力" class="input p-locality p-street-address p-extended-address" type="text" name="city" />
                                            </li>
                                        </ul>
                                        <div>
                                            <p class="text14 pb-5">番地、ビル、建物名</p>
                                            <input class="input" type="text" name="address" required="" />
                                            <span class="errMessage" id="errInputAddress"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>電話番号<span class="required">必須</span> <!-- phone -->
                                    </th>
                                    <td><input placeholder="半角数字のみご入力ください。ハイフンは不要です。" class="input" type="tel" name="phone"><span class="errMessage" id="errInputPhone"></span></td>
                                </tr>
                                <tr>
                                    <th>メールアドレス<span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input placeholder="半角数字のみご入力ください。" class="input" type="email" name="email">
                                        <span class="errMessage" id="errInputEmail"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>FAX番号</th>
                                    <td><input placeholder="半角数字のみご入力ください。ハイフンは不要です。" class="input" type="tel" name="fax">
                                    <span class="errMessage" id="errInputFax"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ご担当者様携帯番号</th>
                                    <td><input placeholder="半角数字のみご入力ください。ハイフンは不要です。" class="input" type="tel" name="phoneRequest">
                                    <span class="errMessage" id="errInputphoneRequest"></span></td>
                                </tr>

                                <tr>
                                    <th>お問い合わせの種類<span class="required">必須</span>
                                    </th>
                                    <td>
                                        <div class="inquiry-type">
                                            <select name="inquiry" id="inquiry" class="errMessage">
                                                <!-- <option value="お問い合わせ内容を選択してください" selected="selected">選択してください。</option> -->
                                                <option value="0" selected="selected">選択してください。</option>
                                                <option value="IT制作やプロジェクトに関するご相談">IT制作やプロジェクトに関するご相談</option>
                                                <option value="業務効率化に関するご相談">業務効率化に関するご相談</option>
                                                <option value="その他のご相談">その他のご相談</option>
                                                <option value="資料請求（PmSQETs）">資料請求（PmSQETs）</option>
                                                <option value="資料請求（SGS）">資料請求（SGS）</option>
                                                <option value="パートナーについて">パートナーについて</option>
                                                <option value="採用について">採用について</option>
                                                <option value="その他">その他</option>
                                            </select>
                                            <span class="errMessage" id="errSelectOption"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>お問い合わせ内容<span class="required">必須</span> <!-- content -->
                                    </th>
                                    <td><textarea placeholder="ご自由にご記入ください。" type="text" name="content"></textarea><span class="errMessage" id="errInputContent"></span>
                                    </td>
                                </tr>
                            </table>
                            <div class="block-button">
                                <p class="text16">
                                    <a href="policy.php" class="underline">個人情報保護方針</a>をお読みいただき、チェックを入れてください。
                                </p>
                                <p class="txt-check">
                                        <input type="checkbox" id="ckbAgree" name="ckbAgree" />
                                        <!--<span></span>-->
                                    <label for="ckbAgree">
                                        個人情報保護方針に同意する。
                                    </label>
                                </p>
                                <!-- <p class="btn-wrapper" id="submit">
                                <input class="btn" value="内容を確認する">
                                <span class="btn-border"></span>
                            </p> -->
<!--                                edit sba start-->
<!--                                <p class="btn-wrapper disabled" id="submit">-->
<!--                                    <a class="btn"><span>内容を確認する</span></a>-->
<!--                                    <span class="btn-border"></span>-->
<!--                                </p>-->
                                    <div class="btn-wrapper absolute disabled" id="submit">
                                        <div class="border_wp">
                                            <a class="btn_sgpm">内容を確認する<span class="btn_cl"></span> </a>
                                            <span class="btn-border-psg"></span>
                                        </div>
                                    </div>
<!--                                <p class="btn-wrapper disabled sp" id="submit1">-->
<!--                                    <a class="btn"><span>内容を確認する</span></a>-->
<!--                                    <span class="btn-border"></span>-->
<!--                                </p>-->
<!--                                edit sba end-->
                                <button id="confirm" type="submit" name="submit" style="display: none;"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Confirm form -->
            <div class="contact-form mb-common" id="confirm_contact" style="display: none;">
                <div class="contact-inner">
                    <form id="confirm_form">
                        <div class="block-form">
                            <table>
                                <tbody>
                                    <tr>
                                        <th> 会社名</th>
                                        <td>
                                            <p id="company-name"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> お名前</th>
                                        <td>
                                            <p id="name"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ご住所 </th><!-- address -->
                                        <td>
                                            <span id="code"></span>
                                            <p><span id="state"></span><span id="city"></span><span id="address"></span></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th> 電話番号</th>
                                        <td>
                                            <p id="phone"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> メールアドレス</th>
                                        <td>
                                            <p id="email"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> FAX番号</th>
                                        <td>
                                            <p id="fax"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> ご担当者様携帯番号</th>
                                        <td>
                                            <p id="phoneRequest"></p>
                                        </td>
                                    </tr>
                                    <th> お問い合わせの種類</th>
                                    <td>
                                        <p id="inquiryItem"></p>
                                    </td>
                                    </tr>
                                    <tr>
                                        <th> お問い合わせ内容</th>
                                        <td>
                                            <p id="content"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <div class="captcha">
                                                <div class="captchaImage" id="captcha"></div>
                                                <i class="fa fa-refresh refresh-captcha" id="refreshCaptcha" style="color:#0062db"></i>
                                            </div>
                                            
                                            

                                            <p><input class="captchaTextBox" type="text" placeholder="Captcha" id="captchaTextBox"/>
                                            <span class="ic-check">
                                                <i class="fa fa-times" style="color:#ff0000"></i>
                                            </span></p>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <div class="list-btn">
                                <p class="btn-wrapper">
                                    <a class="btn" id="back"><span>戻る</span></a>
                                    <span class="btn-border"></span>
                                </p>
                                <p class="btn-wrapper disabled" id="wrapperSendMail">
                                    <a type="button" id="sendMail" name="sendMail" class="btn btn continue-shop button"><span>送信する</span></a>
                                    <span class="btn-border"></span>
                                </p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>
    <script src="js/yubinbango.js" charset="UTF-8"></script>
    <script src="js/contact.js" charset="UTF-8"></script>
	<!--<script>attachBlockEnter('a2');</script>-->
</body>
</html>