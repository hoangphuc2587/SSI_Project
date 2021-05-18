{config_load file='default.conf' section='UserDetail'}
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
                        <!-- Set hidden tag -->
                        <input type="hidden" id="hdnEditMode" value={$editMode}>
                        <!-- <input type="hidden" id="hdnRole" value={$userInfo->getRole()}> -->
                        <dt>
                            <label>ユーザーID</label>
                        </dt>
                        <dd><input type="text" name="userId" value={$userInfo->getUserId()}>
                            <input type="hidden" name="oldUserId" value={$userInfo->getUserId()} >
                            <p class="txt-note">※半角英数字で4文字以上8文字以内</p>
                        </dd>
                        <!-- {if $loginRole == '1' && $loginUserEdit == null}
                            <dt>
                                <label>ロール</label>
                            </dt>
                            <dd>
                                <select name="role">
                                    <option value="1">アドミン</option>
                                    <option value="2">ユーザー</option>
                                </select>
                            </dd>
                        {/if} -->
                        <dt>
                            <label>ユーザーのメールアドレス</label>
                        </dt>
                        <dd><input type="text" name="mail" value={$userInfo->getMail()}>
                            <input type="hidden" name="oldMail" value={$userInfo->getMail()} >
                        </dd>
                        {if $userInfo->getUserId()!=""}
                        <a id="changePassword">パスワード変更の場合はこちら</a>
                        {/if}
                        <div id="ipPass" {if $userInfo->getUserId()!=""} style="display: none;"{/if}>
                            <dt>
                                <label>新しいパスワード</label>
                            </dt>
                            <dd>
                                <input type="password" name="password">
                                <p class="txt-note">※半角英数字で4文字以上8文字以内</p>
                            </dd>
                            <dt>
                                <label>新しいパスワードを再入力</label>
                            </dt>
                            <dd>
                                <input type="password" name="retypePassword">
                            </dd>
                            <p class="check-group"><input type="checkbox" class="bg-check" id="ckbSendMail" name="ckbSendMail"><label for="01">登録メールアドレスにIDとPASSWORDが記載された確認メールを送信しますか？</label> </p>
                        </div>

                    </dl>
                        <!-- <p class="check-group"><input type="checkbox" class="bg-check" id="ckbSendMail" name="ckbSendMail"><label for="01">登録メールアドレスにIDとPASSWORDが記載された確認メールを送信しますか？</label> </p> -->
                        <p id="errMessage" class="txt-note"></p>
                        <ul class="list-button">
                            <li>
                                <a href="./?rt=loginUserList"><button class="button02 btnBack" id="btnBack">一覧へ</button></a>
                            </li>
                            {if $userInfo->getUserId() == ''}
                                <li>
                                    <button class="button02" id="btnInsertUser">登録</button>
                                </li>
                            {/if}
                            {if $userInfo->getUserId() != ''}
                                <li>
                                    <button class="button02" id="btnUpdateUser">更新</button>
                                </li>
                            {/if}
                        </ul>
                </div>
            </div>
        </main>
{include file='footer.part.tpl'}
