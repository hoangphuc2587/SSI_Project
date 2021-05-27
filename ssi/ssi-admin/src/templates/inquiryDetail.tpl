{config_load file='default.conf' section='InquiryDetail'}
{if $loginRole == '1'}
    {include file='header.part.tpl'}
{else}
    {include file='header.part.tpl'}
{/if}
        <main class="main-content">
            <div class="block-contact">
                <div class="head">
                    <h2 class="headline">ユーザー登録・編集</h2>
                </div>
                <div class="block-inner">
                    <dl class="group-form">
                        <dt>
                            <label>お問い合わせの種類</label>
                        </dt>
                        <dd>
                            <input type="text" name="inquiry" id="inquiry" value="{$inquiryType}">
                        </dd>                       
                        <dt>
                            <label>メールアドレス</label>
                        </dt>
                        <dd><input type="text" name="mail" id="mail" value="{$receptionMail}">
                            <p class="txt-note">※お問合せフォームの受付アドレスに使用</p>
                        </dd>
                        <input type="hidden" id="id" name="id" value={$id}>
                        <input type="hidden" id="loginUser" name="loginUser" value={$userId} />
                    </dl>                        
                        <ul class="list-button">
                            <li>
                                <a href="./?rt=inquiryList"><button class="button02 btnBack" id="btnBack">一覧へ</button></a>
                            </li>
                            <li>
                                <button class="button02" type="submit" name="submit" id="btnUpdateInquiry">更新</button>
                            </li>
                        </ul>
                </div>
            </div>
        </main>
{include file='footer.part.tpl'}
