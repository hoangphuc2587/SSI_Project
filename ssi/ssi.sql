-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2020 lúc 04:48 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ssi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_contact`
--

CREATE TABLE `m_contact` (
  `id` int(11) NOT NULL,
  `reception_mail` varchar(1028) NOT NULL,
  `auto_mail_content` varchar(4096) NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` varchar(1228) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_contact`
--

INSERT INTO `m_contact` (`id`, `reception_mail`, `auto_mail_content`, `update_date`, `update_user`) VALUES
(1, 'yamanaka@ssi.co.jp', '<p>{inputName} 様<br />当WEBサイトをご利用いただきありがとうございます。<br />下記内容にてお問合せを承りました。<br />****************************************************************<br />お問い合わせ内容<br />****************************************************************<br />{content}<br />****************************************************************</p><p>&nbsp;</p><p>-------------------------------------------</p><p>株式会社ソフトウエア・サイエンス</p><p>〒171-0022 東京都豊島区南池袋2-32-8</p><p>TEL：03-5952-1853(直通) &nbsp; FAX：03-5952-1866</p><p>URL： <a target=\"_blank\" href=\"http://www.ssi.co.jp\">http://www.ssi.co.jp</a></p><p>-------------------------------------------</p>', '2020-02-13 23:59:01', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_login`
--

CREATE TABLE `m_login` (
  `user_id` varchar(128) NOT NULL COMMENT 'ユーザーID',
  `password` varchar(128) NOT NULL COMMENT 'パスワード',
  `mail` varchar(256) NOT NULL COMMENT 'メールアドレス',
  `role` char(1) NOT NULL COMMENT 'ロール',
  `create_date` datetime DEFAULT NULL COMMENT '登録日時',
  `create_user` varchar(128) DEFAULT NULL COMMENT '登録ID',
  `update_date` datetime DEFAULT NULL COMMENT '更新日時',
  `update_user` varchar(128) DEFAULT NULL COMMENT '更新ID',
  `delete_date` datetime DEFAULT NULL COMMENT '削除日時',
  `delete_user` varchar(128) DEFAULT NULL COMMENT '削除ID',
  `delete_flag` char(1) DEFAULT NULL COMMENT '削除フラグ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_login`
--

INSERT INTO `m_login` (`user_id`, `password`, `mail`, `role`, `create_date`, `create_user`, `update_date`, `update_user`, `delete_date`, `delete_user`, `delete_flag`) VALUES
('admin', 'Wyfy3Y1OD0R8kQul+u1Krw==', 'admin@gmain.com', '1', NULL, NULL, '2020-02-18 10:52:59', 'admin', NULL, NULL, '0'),
('admin3', 'hrxOAEUaElfBBXlfOQEMfA==', 'uchi_yama_mi@yahoo.co.jp', '1', '2020-01-16 10:09:28', 'admin', NULL, NULL, '2020-01-21 04:01:56', 'admin', '1'),
('dai28', 'u2Kz6sE167k8gyvRUBAF1Q==', 'daisuke@o-plans.co.jp', '1', '2020-02-21 06:57:01', 'admin', '2020-02-21 06:59:01', 'admin', NULL, NULL, '0'),
('daisuke', 'u2Kz6sE167k8gyvRUBAF1Q==', 'daisuke@o-plans.co.jp', '1', '2020-02-18 10:53:34', 'admin', NULL, NULL, '2020-02-18 10:54:28', 'admin', '1'),
('ishiz2', 'wEq9CyRxtl+QJZ9EIsVciA==', 'ishizuka@o-plans.co.jp', '1', '2020-02-21 06:48:00', 'admin', NULL, NULL, '2020-02-21 06:48:37', 'admin', '1'),
('ishiz3', 'x+xLu+Q94/L6gB4uRcPtjQ==', 'ishiz2011@gmail.com', '1', '2020-02-21 06:48:57', 'admin', NULL, NULL, '2020-02-21 06:50:42', 'admin', '1'),
('ishiz4', 'x+xLu+Q94/L6gB4uRcPtjQ==', 'ishizuka2@o-plans.co.jp', '1', '2020-02-21 06:51:21', 'admin', NULL, NULL, '2020-02-21 06:53:08', 'admin', '1'),
('ishiz5', 'SkTV8pMz3awVd8wAamaGTg==', 'ishizuka3@o-plans.co.jp', '1', '2020-02-21 06:53:25', 'admin', NULL, NULL, NULL, NULL, '0'),
('ishizuka', 'wEq9CyRxtl+QJZ9EIsVciA==', 'ishizuka@o-plans.co.jp', '1', '2020-02-21 06:44:58', 'admin', NULL, NULL, '2020-02-21 06:47:03', 'admin', '1'),
('opltest1', '2zkjKJGlwwc5JpF7Rhl9sw==', 'toshi@o-plans.co.jp', '1', '2020-01-30 09:02:34', 'admin', NULL, NULL, NULL, NULL, '0'),
('opltest2', 'S0SXL27WvvfmEr0MCPwypQ==', 'toshiaki.yoshino1962@gmail.com', '1', '2020-01-30 12:02:58', 'opltest1', '2020-01-30 12:05:12', 'opltest1', '2020-01-30 12:05:38', 'opltest1', '1'),
('user1', 'hrxOAEUaElfBBXlfOQEMfA==', 'uchiyama-mi@vop-hcmc.com', '1', '2020-01-16 10:44:35', 'admin3', '2020-01-17 04:11:38', 'user2', '2020-01-21 04:02:01', 'admin', '1'),
('yamanaka', 'pXRsQhgZV8VDu6sCVy0ApA==', 'yamanaka@ssi.co.jp', '1', '2020-02-13 23:56:33', 'admin', '2020-02-13 23:58:24', 'admin', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_contact_history`
--

CREATE TABLE `t_contact_history` (
  `id` int(11) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `guest_name` varchar(256) NOT NULL,
  `postal_code` varchar(11) NOT NULL,
  `prefectures` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `fax` varchar(128) DEFAULT NULL,
  `phone_contact` varchar(128) DEFAULT NULL,
  `inquiry_item` varchar(128) NOT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `t_contact_history`
--

INSERT INTO `t_contact_history` (`id`, `company_name`, `guest_name`, `postal_code`, `prefectures`, `city`, `address`, `phone`, `email`, `fax`, `phone_contact`, `inquiry_item`, `content`, `create_date`) VALUES
(1, 'tテスト', 'テスト', '4313102', '東京都', '中野区', '中央4丁目1番ｓｄ', '15230', 'uchiyama-mi@vop-hcmc.com', 'sF', '', '業務効率化に関するご相談', 'ｓｄｄｚｇｃ', '2020-01-16 07:39:09'),
(2, 'test', 'test', '4418083', 'HCM', 'Thanh Pho Ho Chi Minh', '54 Nguyen Trai', '0963501399', 'nhathieu101@gmail.com', '', '', 'IT制作やプロジェクトに関するご相談', 'test', '2020-01-16 07:42:09'),
(3, 'テストテスト', 'テストテストテスト', '4313102', '静岡県', '浜松市東区豊西町', 'テストテストテスト', '09090909', 'uchi_yama_mi@yahoo.co.jp', '090909090', '', '業務効率化に関するご相談', 'テストテストテスト', '2020-01-16 09:47:06'),
(4, 'testtesttest', 'testtesttest', '4520052', '愛知県', '清須市西枇杷島町辰新田', 'tesuoi;', '454545', 'uchi_yama_mi@yahoo.co.jp', '', '', 'IT制作やプロジェクトに関するご相談', 'etsij;', '2020-01-16 09:55:10'),
(5, 'テストテストテスト', 'テストテストテスト', '4313102', '静岡県', '浜松市東区豊西町', 'テストテストテスト', '09090909', 'uchi_yama_mi@yahoo.co.jp', '', '', '業務効率化に関するご相談', 'テストテストテスト', '2020-01-16 10:42:14'),
(6, 'テスト', 'テスト', '4313102', '静岡県', '浜松市東区豊西町', 'テストテストテスト', '09090909', 'uchiyama.mi@icloud.com', '', '', 'その他のご相談', 'Test', '2020-01-17 09:35:11'),
(7, 'Test', 'Test', '4313102', '静岡県', '浜松市東区豊西町', 'Test', '09090909', 'uchiyama.mi@icloud.com', '', '', '採用について', 'Testeybvhhckn', '2020-01-17 10:53:49'),
(8, '㈱ああああ', 'あいうえ　かきこ', '1640011', '東京都', '中野区中央', 'KIビル', '09026366440', 'toshiaki.yoshino1962@gmail.com', '03-1111-2222', '03-2222-3333', 'IT制作やプロジェクトに関するご相談', 'あ\r\nい\r\nう\r\nえ\r\nお', '2020-01-24 05:57:45'),
(9, '会社&lt;strong&gt;タグ&lt;/strong&gt;', '会社&lt;strong&gt;名前&lt;/strong&gt;', '1640012', '東京都&lt;strong&gt;名前&lt;/strong&gt;', '中野区本町&lt;strong&gt;名前&lt;/strong&gt;', '&lt;strong&gt;名前&lt;/strong&gt;', '0355551111', 'hiru@o-plans.co.jp', '', '', 'その他のご相談', '&lt;strong&gt;名前&lt;/strong&gt;\r\n&lt;strong&gt;名前&lt;/strong&gt;\r\n&lt;strong&gt;名前&lt;/strong&gt;', '2020-01-30 04:22:55'),
(10, '&lt;span style=&quot;font-size:18px;&quot;&gt;文字&lt;/span&gt;', '&lt;span style=&quot;font-size:18px;&quot;&gt;文字&lt;/span&gt;', '1640012', '東京都', '中野区本町', '&lt;span style=&quot;font-size:18px;&quot;&gt;文字&lt;/span&gt;', '0355551111', 'hiru@o-plans.co.jp', '', '', '資料請求（SGS）', '&lt;span style=&quot;font-size:18px;&quot;&gt;文字&lt;/span&gt;\r\n&lt;span style=&quot;font-size:18px;&quot;&gt;文字&lt;/span&gt;', '2020-01-30 05:00:04'),
(11, 'インチキ商会', '名無しの権兵衛', '１０７００２２', '', '', '金満ビル', '', '', '', '', '0', '', '2020-02-07 01:35:42'),
(12, 'インチキ商会', '胡散臭い造', '1710022', '東京都', '豊島区南池袋', 'ぼったくりビル', '0359521311', 'uso@happyaku.co.jp', '', '', '0', '', '2020-02-13 02:09:02'),
(13, '', '', '', '', '', '111', '', '', '', '', '0', '', '2020-02-14 05:32:33'),
(14, '', '', '', '', '', '111', '', '', '', '', '0', '', '2020-02-14 05:32:34'),
(15, 'aaa', 'aaa', '0000000', 'aaa', 'aaaa', 'aaa', '0', 'daisuke@o-plans.co.jp', '0', '0', 'IT制作やプロジェクトに関するご相談', 'aaa', '2020-02-14 10:30:28'),
(16, 'test', 'test', '12', '東京', '中野', '中央', '01', 'test@test.com', '', '', 'IT制作やプロジェクトに関するご相談', 'test', '2020-02-14 10:50:15'),
(17, 'test', 'test', '12', '東京', '中野', '中央', '0', 'test@test.com', '', '', 'その他', 'test', '2020-02-14 10:52:56'),
(18, 'aaa', 'abc', '1640001', '東京都', '中野区中野', '411', '03', 'daisuke@o-plans.co.jp', '04', '05', '資料請求（SGS）', 'テスト', '2020-02-17 07:28:14'),
(19, 'test', 'test', '', '東京都', '中野区', '中央', '03', 'daisuke@o-plans.co.jp', '04', '05', 'IT制作やプロジェクトに関するご相談', 'てすと', '2020-02-17 07:34:23'),
(20, 'test', 'test', '', '東京都', '中野区', '中央', '03', 'daisuke@o-plans.co.jp', '04', '05', 'IT制作やプロジェクトに関するご相談', 'てすと', '2020-02-17 07:56:08'),
(21, 'lmn', 'opl', '', '東京都', '中野', '中央', '03', 'daisuke@o-plans.co.jp', '050', '080', 'その他のご相談', 'テスト', '2020-02-17 08:19:56'),
(22, '1', '1', ' ', '東京都', '東', '1', '9', 'a@aaa.co.jp', '', '', '0', '	', '2020-02-17 08:30:35'),
(23, '1', '1', '111111', '1', '1', '1', '1', 'a@a.com', '1', '1', '0', '1', '2020-02-17 08:44:20'),
(24, '1', '', '', '', '', '1', '', '', '', '', '0', '', '2020-02-17 08:45:26'),
(25, '', '', '', '', '', '1', '', '', '', '', '0', '', '2020-02-17 08:46:20'),
(26, '', '', '', '', '', '1', '', '', '', '', '0', '', '2020-02-17 08:52:30'),
(27, 'a', 'admin1', '6611111', '東京都', '北区豊島', '77777', '09089468846', 'ishiz2011@gmail.com', '', '', 'IT制作やプロジェクトに関するご相談', 'お問い合わせ内容\r\n', '2020-02-18 11:25:53'),
(28, '株式会社オープランズ', '石塚徹', '1140003', '東京都', '北区豊島', '中央4丁目1番2号, KIビル, 中野区', '0353282666', 'ishizuka@o-plans.co.jp', '', '', '業務効率化に関するご相談', '\r\nお電話でのお問い合わせ\r\nどのように質問したらいいかわからない。ざっくりと相談したい。フォームの入力が手間がかかる。など… 直接お電話にてお問い合わせください。誠意を持って対応させていただきます。\r\n\r\ninfomation\r\n営業時間\r\n10:00～17:00\r\n営業日\r\n土日・祝祭日・連休を除く\r\n\r\n03-5952-1311\r\nお問い合わせフォーム\r\n会社名\r\n必須\r\n株式会社オープランズ\r\nお名前\r\n必須\r\n石塚徹\r\nご住所\r\n必須\r\n郵便番号\r\n\r\n114\r\nline\r\n0003\r\n都道府県\r\n\r\n東京都\r\n市区町村\r\n\r\n北区豊島\r\n番地、ビル、建物名\r\n\r\n電話番号\r\n必須\r\n0353282666\r\nメールアドレス\r\n必須\r\nishizuka@o-plans.co.jp\r\nFAX番号\r\n半角数字のみご入力ください。ハイフンは不要です。\r\nご担当者様携帯番号\r\n半角数字のみご入力ください。ハイフンは不要です。\r\nお問い合わせの種類\r\n必須\r\n\r\nお問い合わせ内容', '2020-02-20 21:16:35'),
(29, '株式会社オープランズ', '石塚徹', '1140003', '東京都', '北区豊島', '中央4丁目1番2号, KIビル, 中野区', '0353282666', 'ishizuka@o-plans.co.jp', '', '', '業務効率化に関するご相談', '\r\nお電話でのお問い合わせ\r\nどのように質問したらいいかわからない。ざっくりと相談したい。フォームの入力が手間がかかる。など… 直接お電話にてお問い合わせください。誠意を持って対応させていただきます。\r\n\r\ninfomation\r\n営業時間\r\n10:00～17:00\r\n営業日\r\n土日・祝祭日・連休を除く\r\n\r\n03-5952-1311\r\nお問い合わせフォーム\r\n会社名\r\n必須\r\n株式会社オープランズ\r\nお名前\r\n必須\r\n石塚徹\r\nご住所\r\n必須\r\n郵便番号\r\n\r\n114\r\nline\r\n0003\r\n都道府県\r\n\r\n東京都\r\n市区町村\r\n\r\n北区豊島\r\n番地、ビル、建物名\r\n\r\n電話番号\r\n必須\r\n0353282666\r\nメールアドレス\r\n必須\r\nishizuka@o-plans.co.jp\r\nFAX番号\r\n半角数字のみご入力ください。ハイフンは不要です。\r\nご担当者様携帯番号\r\n半角数字のみご入力ください。ハイフンは不要です。\r\nお問い合わせの種類\r\n必須\r\n\r\nお問い合わせ内容', '2020-02-20 21:23:54'),
(30, '株式会社オープランズ', '石塚徹', '1140003', '東京都', '北区豊島', '中央4丁目1番2号, KIビル, 中野区', '0353282666', 'ishizuka@o-plans.co.jp', '', '', '業務効率化に関するご相談', '\r\nお電話でのお問い合わせ\r\nどのように質問したらいいかわからない。ざっくりと相談したい。フォームの入力が手間がかかる。など… 直接お電話にてお問い合わせください。誠意を持って対応させていただきます。\r\n\r\ninfomation\r\n営業時間\r\n10:00～17:00\r\n営業日\r\n土日・祝祭日・連休を除く\r\n\r\n03-5952-1311\r\nお問い合わせフォーム\r\n会社名\r\n必須\r\n株式会社オープランズ\r\nお名前\r\n必須\r\n石塚徹\r\nご住所\r\n必須\r\n郵便番号\r\n\r\n114\r\nline\r\n0003\r\n都道府県\r\n\r\n東京都\r\n市区町村\r\n\r\n北区豊島\r\n番地、ビル、建物名\r\n\r\n電話番号\r\n必須\r\n0353282666\r\nメールアドレス\r\n必須\r\nishizuka@o-plans.co.jp\r\nFAX番号\r\n半角数字のみご入力ください。ハイフンは不要です。\r\nご担当者様携帯番号\r\n半角数字のみご入力ください。ハイフンは不要です。\r\nお問い合わせの種類\r\n必須\r\n\r\nお問い合わせ内容', '2020-02-20 21:24:32'),
(31, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', '1111', '09089468846', 'ishizuka@o-plans.co.jp', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 11:07:52'),
(32, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', '1111', '09089468846', 'ishizuka@o-plans.co.jp', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 11:23:42'),
(33, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', '1111', '09089468846', 'ishizuka@o-plans.co.jp', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 11:29:36'),
(34, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', 'あああああ', '09089468846', 'ishiz2011@gmail.com', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 11:31:21'),
(35, 'opl', 'sd', '1640011', '東京都', '中野区中央', '412', '032666', 'daisuke@o-plans.co.jp', '032667', '0800006', 'IT制作やプロジェクトに関するご相談', 'test', '2020-02-21 12:05:43'),
(36, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', '1111', '09089468846', 'ishizuka@o-plans.co.jp', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 14:58:22'),
(37, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', '1111', '09089468846', 'ishizuka@o-plans.co.jp', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 15:38:02'),
(38, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', '1111', '09089468846', 'ishizuka@o-plans.co.jp', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 15:42:15'),
(39, 'o-plans', '須貝', '1640011', '東京都', '中野区中央', '412', '03', 'daisuke@o-plans.co.jp', '03', '080', 'IT制作やプロジェクトに関するご相談', 'test', '2020-02-21 15:56:12'),
(40, '株式会社オープランズ', '石塚徹', '', '東京都', '北区豊島', '1111', '09089468846', 'ishizuka@o-plans.co.jp', '', '', 'その他のご相談', 'お問い合わせ内容\r\n', '2020-02-21 15:59:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `t_news`
--

CREATE TABLE `t_news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` varchar(4096) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `display_flag` int(1) NOT NULL DEFAULT '0',
  `display_date` date DEFAULT NULL,
  `create_user` varchar(128) NOT NULL,
  `create_date` date NOT NULL,
  `update_user` varchar(128) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `delete_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `t_news`
--

INSERT INTO `t_news` (`id`, `title`, `content`, `image`, `display_flag`, `display_date`, `create_user`, `create_date`, `update_user`, `update_date`, `delete_flag`) VALUES
(1, 'kk', '<p>kkk</p>', '15789746040.jpg', 0, '2019-11-26', 'admin', '2020-01-14', 'admin', '2020-01-14', 1),
(2, 'テスト　テスト　テスト　テスト', '<blockquote><ul><li><h2 style=\"font-style:italic;\"><img alt=\"\" style=\"width: 50px; height: 100px;\" src=\"http://vop-hcmc.com/test/ssi/news.php\" />テストテストテスト<span style=\"font-size:9px;\"><span style=\"font-family:comic sans ms,cursive;\">テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span></span></h2></li></ul><h2 style=\"font-style:italic;\"><span style=\"font-size:9px;\"><span style=\"font-family:comic sans ms,cursive;\">テスト</span></span>テストテス<a target=\"_blank\" href=\"http://vop-hcmc.com/test/ssi/\">ト<q>テストテストテストテストテストテストテスト</q></a><q>テストテス<span style=\"font-size:9px;\"><span style=\"font-family:comic sans ms,cursive;\">トテストテストテストテストテストテストテスト</span></span></q>​<q><span style=\"font-size:9px;\"><span style=\"font-family:comic sans ms,cursive;\">テストテストテストテストテストテストテストテスト</span></span></q><code>テストテストテストテストテ</code><q><span style=\"font-size:9px;\"><span style=\"font-family:comic sans ms,cursive;\">スU<img alt=\"Delta\" src=\"http://latex.codecogs.com/gif.latex?%5CDelta\" /></span></span></q></h2><ul><li><h2 style=\"font-style:italic;\">じじじ</h2></li><li>ここｋ</li></ul></blockquote><h2 style=\"font-style:italic;\">こここ</h2><blockquote><ul><li><h2 style=\"font-style:italic;\">&nbsp;</h2></li><li><h2 style=\"font-style:italic;\">&nbsp;</h2></li><li><h2 style=\"font-style:italic;\">&nbsp;</h2></li><li><h2 style=\"font-style:italic;\">&nbsp;</h2></li><li><h2 style=\"font-style:italic;\"><q><span style=\"font-size:9px;\"><span style=\"font-family:comic sans ms,cursive;\">トテストテストテストテス</span></span><span style=\"font-size:9px;\"><span style=\"font-family:comic sans ms,cursive;\">トテストテスト<img title=\"frown\" alt=\"frown\" width=\"23\" height=\"23\" src=\"http://vop-hcmc.com/test/ssi-admin/component/ckeditor/plugins/smiley/images/confused_smile.png\" /></span></span></q></h2></li></ul></blockquote>', '15789748920.jpg,15789990570.jpg,15789990571.png', 1, '2020-01-13', 'admin', '2020-01-14', 'admin', '2020-02-17', 0),
(3, 'テストテストテスト', '<p>テストテストテスト</p><p>&nbsp;</p><p>&nbsp;</p><p><span style=\"color:#A52A2A;\"><span style=\"font-size:28px;\">テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト</span></span></p>', '15791582090.jpg,15791582091.jpg,15791582092.jpg,15791582093.jpg,15791582094.jpg,15791582095.jpg', 1, '2020-01-30', 'admin', '2020-01-16', 'admin', '2020-01-16', 1),
(4, 'テストテストテスト', '<p>テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト</p>', '15791612620.jpg,15791612621.jpg,15791612622.jpg,15791612623.jpg,15791612624.jpg,15791612625.jpg', 1, '2018-08-29', 'admin', '2020-01-16', 'admin', '2020-01-16', 0),
(5, 'テストテストテスト', '<p>トップ表示テストトップ表示テスト<span style=\"color:#FFD700;\">トップ表示テストトップ表示テストトップ表示テストトップ表示テスト</span></p>', '15795806630.', 1, '2020-01-14', 'admin', '2020-01-21', 'admin', '2020-01-21', 0),
(6, 'トップトップトップ表示テスト', '<p>トップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テ<span style=\"font-size:36px;\"><span style=\"font-family:georgia,serif;\">ストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップト<span style=\"background-color:#A52A2A;\">ップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テスト</span></span></span></p>', '', 1, '2020-01-20', 'admin', '2020-01-21', 'admin', '2020-02-20', 0),
(7, 'テストテストテストテスト', '<p>テスト</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><span style=\"color:#FF0000;\">トップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テストトップトップトップ表示テスト</span></p>', '', 0, '2020-01-14', 'admin', '2020-01-21', NULL, NULL, 0),
(8, '6画像添付', '<p>あ<strong>あ</strong><em>あ</em><s>あ</s><span style=\"font-size:20px;\">あ</span><span style=\"color:#FF0000;\">あ</span><span style=\"background-color:#FF0000;\">あ</span>ああ</p><p>&nbsp;</p><p>いいいい</p><p>&nbsp;</p><hr /><p>&hArr;ஹ</p><p>&nbsp;</p><blockquote><p>ABC</p><p>CDF</p><p>EFG</p></blockquote><p>&nbsp;</p><table style=\"width: 500px;\" border=\"5\" cellspacing=\"1\" cellpadding=\"1\"><tbody><tr><td>1</td><td>2</td></tr><tr><td>3</td><td>4</td></tr><tr><td>5</td><td>6</td></tr></tbody></table><ol><li>&nbsp;</li></ol>', '15796745653.jpg,15796745654.jpg,15796745657.jpg,15796745658.jpg,15796747150.jpg,15796747151.jpg', 1, '2020-01-22', 'admin', '2020-01-22', 'admin', '2020-02-14', 0),
(9, '新規投稿', '<p><strong>文字</strong></p>', '', 0, '2020-01-29', 'admin', '2020-01-28', 'admin', '2020-01-28', 1),
(10, '新規２つめ', '<p>もじ</p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p>もじ</p><p><em>もじあ</em></p><p><em>もじあ</em></p><p>&nbsp;</p>', '', 0, '2020-01-28', 'admin', '2020-01-28', 'admin', '2020-01-28', 1),
(11, 'ああああ', '<p>もじ</p><p><em>もじ</em></p><p><em>もじもじもじ</em></p><p><em>もじ</em></p><p><em>もじ</em></p><p><em>もじ</em></p><p><em>もじ</em></p><p><em>もじ</em></p>', '', 0, '2020-01-28', 'admin', '2020-01-28', 'admin', '2020-01-28', 1),
(12, '文字種テスト', '<p><span style=\"font-size:8px;\">size8</span></p><p><span style=\"font-size:8px;\">標準：あああああ</span></p><p><em><span style=\"font-size:8px;\">斜体：あああああ</span></em></p><p><strong><span style=\"font-size:8px;\">太字：あああああ</span></strong></p><p><s><span style=\"font-size:8px;\">消線：あああああ</span></s></p><p><em><strong><span style=\"font-size:8px;\">斜体＋太字：あああああ</span></strong></em></p><p><s><em><strong><span style=\"font-size:8px;\">斜体＋太字＋消線：ああああああ</span></strong></em></s></p><p>&nbsp;</p><p><span style=\"font-size:20px;\">size20</span></p><p><span style=\"font-size:20px;\">標準：あああああ</span></p><p><span style=\"font-size:20px;\"><em>斜体：あああああ</em></span></p><p><span style=\"font-size:20px;\"><strong>太字：あああああ</strong></span></p><p><span style=\"font-size:20px;\"><s>消線：あああああ</s></span></p><p><span style=\"font-size:20px;\"><em><strong>斜体＋太字：あああああ</strong></em></span></p><p><span style=\"font-size:20px;\"><s><em><strong>斜体＋太字＋消線：ああああああ</strong></em></s></span></p><p>&nbsp;</p><p><span style=\"font-size:48px;\">size48</span></p><p><span style=\"font-size:48px;\">標準：あああああ</span></p><p><span style=\"font-size:48px;\"><em>斜体：あああああ</em></span></p><p><span style=\"font-size:48px;\"><strong>太字：あああああ</strong></span></p><p><span style=\"font-size:48px;\"><s>消線：あああああ</s></span></p><p><span style=\"font-size:48px;\"><em><strong>斜体＋太字：あああああ</strong></em></span></p><p><span style=\"font-size:48px;\"><s><em><strong>斜体＋太字＋消線：ああああああ</strong></em></s></span></p><p>&nbsp;</p><p>文字色赤</p><p><span style=\"color:#FF0000;\"><span style=\"font-size: 8px;\">size8</span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:8px;\">標準：あああああ</span></span></p><p><span style=\"color:#FF0000;\"><em><span style=\"font-size:8px;\">斜体：あああああ</span></em></span></p><p><span style=\"color:#FF0000;\"><strong><span style=\"font-size:8px;\">太字：あああああ</span></strong></span></p><p><span style=\"color:#FF0000;\"><s><span style=\"font-size:8px;\">消線：あああああ</span></s></span></p><p><span style=\"color:#FF0000;\"><em><strong><span style=\"font-size:8px;\">斜体＋太字：あああああ</span></strong></em></span></p><p><span style=\"color:#FF0000;\"><s><em><strong><span style=\"font-size:8px;\">斜体＋太字＋消線：ああああああ</span></strong></em></s></span></p><p>&nbsp;</p><p><span style=\"color:#FF0000;\"><span style=\"font-size:20px;\">size20</span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:20px;\">標準：あああああ</span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:20px;\"><em>斜体：あああああ</em></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:20px;\"><strong>太字：あああああ</strong></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:20px;\"><s>消線：あああああ</s></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:20px;\"><em><strong>斜体＋太字：あああああ</strong></em></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:20px;\"><s><em><strong>斜体＋太字＋消線：ああああああ</strong></em></s></span></span></p><p>&nbsp;</p><p><span style=\"color:#FF0000;\"><span style=\"font-size:48px;\">size48</span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:48px;\">標準：あああああ</span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:48px;\"><em>斜体：あああああ</em></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:48px;\"><strong>太字：あああああ</strong></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:48px;\"><s>消線：あああああ</s></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:48px;\"><em><strong>斜体＋太字：あああああ</strong></em></span></span></p><p><span style=\"color:#FF0000;\"><span style=\"font-size:48px;\"><s><em><strong>斜体＋太字＋消線：ああああああ</strong></em></s></span></span></p><p>&nbsp;</p><p><span style=\"font-size:8px;\">size8</span></p><p><span style=\"font-size:8px;\">標準：あああああ</span></p><p><em><span style=\"font-size:8px;\">斜体：あああああ</span></em></p><p><strong><span style=\"font-size:8px;\">太字：あああああ</span></strong></p><p><s><span style=\"font-size:8px;\">消線：あああああ</span></s></p><p><em><strong><span style=\"font-size:8px;\">斜体＋太字：あああああ</span></strong></em></p><p><s><em><strong><span style=\"font-size:8px;\">斜体＋太字＋消線：ああああああ</span></strong></em></s></p><p>&nbsp;</p><p>&nbsp;</p>', '', 1, '2020-01-28', 'admin', '2020-01-28', 'admin', '2020-01-28', 0),
(13, 'タイトル&lt;b&gt;タグ&lt;/b&gt;挿入&#039;&lt;strong&gt;ふと&lt;/strong&gt;&lt;span style=', '<p><strong>コンテンツ</strong></p><p><span style=\"font-size:18px;\">文字</span></p>', '', 1, '2020-01-30', 'admin', '2020-01-30', 'admin', '2020-02-14', 0),
(14, '&quot;testing1!&quot; , &quot;testing2!&quot; &lt;タイトル&gt;', '<p>About paragraph &lt;&gt;</p><p>testing <content><content1>/////</content1></content></p><p>testing@gmail.com</p><p>test [test]</p><p>コンテンツ,コンテンツ*</p>', '', 1, '2020-02-14', 'admin', '2020-02-14', 'admin', '2020-02-14', 1),
(15, '&quot;testing1!&quot; , &quot;testing2!&quot; &lt;タイトル&gt;', '<p>test@gmail.com</p><p>http://www.test.com.net</p><p>news.net.website@test.com</p>', '', 1, '2020-02-14', 'admin', '2020-02-14', 'admin', '2020-02-14', 1),
(16, 'http://test.com.net,、、、news@gmail.com*&#039;new website&#039;', '<p><span style=\"font-size:36px;\"><strong>http://test.com.net</strong></span></p><p><span style=\"font-size:36px;\">news@gmail.com</span></p><p><span style=\"font-size:36px;\">ssi website @ about , <s>test</s></span></p><h3><span style=\"font-size:36px;\"><em><strong>お問い合わせ</strong></em></span></h3><p><span style=\"font-size:36px;\">////*****```````&quot;1&quot;&quot;2&quot;&quot;3&quot;,,,,,,,{@@@@@@@} for test</span></p><p>&nbsp;</p><p>どのように質問したらいいかわからない、ざっくりと相談したい。フォームの入力が手間がかかる。など&hellip; 直接お電話にてお問い合わせください。誠意を持って対応させていただきます、、、、</p><p>&nbsp;</p>', '15822505340.png', 0, '2020-02-14', 'admin', '2020-02-14', 'admin', '2020-02-21', 0),
(17, 'test', '<p>testtesttesttesttesttesttesttesttest</p><p><span style=\"font-size:36px;\">testtesttest</span></p>', '15822588060.jpg,15822588061.jpg', 1, '2020-02-21', 'admin', '2020-02-21', 'admin', '2020-02-21', 0),
(18, 'test2', '<p><s><em><strong>testtesttesttesttesttesttesttesttest</strong></em></s></p><p><s><em><strong><span style=\"font-size:18px;\"><span style=\"color:#FFFF00;\"><span style=\"background-color:#0000FF;\">testtesttesttesttesttesttest</span></span></span></strong></em></s></p>', '15822589540.jpg,15822589541.jpg,15822589545.jpg,15822589546.jpg,15822589547.jpg,15822589548.jpg,15822589549.jpg,158225895410.jpg', 1, '2020-02-01', 'admin', '2020-02-21', 'admin', '2020-02-21', 0),
(19, 'a', '<p>ooooo&gt;</p>', '15822606360.jpg,15822606361.jpg', 1, '2020-02-21', 'admin', '2020-02-21', 'admin', '2020-02-21', 1),
(20, 'delete', '<p>del</p>', '15822607170.jpg,15822607171.jpg,15822607173.jpg,15822607174.jpg', 1, '2020-02-19', 'admin', '2020-02-21', 'admin', '2020-02-21', 0),
(21, 'a', '<p>bbb</p>', '15822612491.jpg', 0, '2020-02-21', 'admin', '2020-02-21', 'admin', '2020-02-21', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `m_contact`
--
ALTER TABLE `m_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_login`
--
ALTER TABLE `m_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `t_contact_history`
--
ALTER TABLE `t_contact_history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `t_news`
--
ALTER TABLE `t_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `m_contact`
--
ALTER TABLE `m_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `t_contact_history`
--
ALTER TABLE `t_contact_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `t_news`
--
ALTER TABLE `t_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
