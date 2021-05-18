{config_load file='default.conf' section='Dashboard'}
{if $loginRole == '1'}
    {include file='header.part.tpl'}
{else}
    {include file='header.part.tpl'}
{/if}
<main class="main-content">
    <div class="block-dashboard">
        <ul>
            <li>
                <div class="group">
                    <img  src="src/image/common/ic-setting.png">
                </div>
                <div class="title"><a href="./?rt=loginUserList">ユーザー管理</a></div>
            </li>

            <li>
                <div class="group">
                    <img  src="src/image/common/ic-contactModify.png">
                </div>
                <div class="title"><a href="./?rt=contactModify">お問い合わせ</a></div>
            </li>

            {*<li>*}
                {*<div class="group">*}
                    {*<img   src="src/image/common/ic-contactHistory.png">*}
                {*</div>*}
                {*<div class="title"><a href="./?rt=contactHistory">お問い合わせ履歴</a></div>*}
            {*</li>*}

            <li>
                <div class="group">
                    <img  src="src/image/common/ic-news.png">
                </div>
                <div class="title"><a href="./?rt=news">ニュースリスト</a></div>
            </li>
        </ul>
    </div>
    <a href="./dl.php">管理画面操作マニュアルダウンロード</a>
</main>
{include file='footer.part.tpl'}