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
                            <select name="inquiry" id="inquiry">
                                <option value="0"{if ($id == 0)} selected="selected"{/if}>選択してください。</option>
                                <option value="1"{if ($id == 1)} selected="selected"{/if}>IT制作やプロジェクトに関するご相談</option>
                                <option value="2"{if ($id == 2)} selected="selected"{/if}>業務効率化に関するご相談</option>
                                <option value="3"{if ($id == 3)} selected="selected"{/if}>その他のご相談</option>
                                <option value="4"{if ($id == 4)} selected="selected"{/if}>資料請求（PmSQETs）</option>
                                <option value="5"{if ($id == 5)} selected="selected"{/if}>資料請求（SGS）</option>
                                <option value="6"{if ($id == 6)} selected="selected"{/if}>パートナーについて</option>
                                <option value="7"{if ($id == 7)} selected="selected"{/if}>採用について</option>
                                <option value="8"{if ($id == 8)} selected="selected"{/if}>その他</option>
                            </select>
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
