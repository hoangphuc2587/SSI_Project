{config_load file='default.conf' section='Contact'}
{if $loginRole == '1'}
    {include file='header.part.tpl'}
{else}
    {include file='header.part.tpl'}
{/if}
		<main class="main-content">
            <div class="block-contact">
                <div class="head">
                    <h2 class="headline">お問い合わせ情報管理</h2>
                </div>
                <div class="block-inner">
                    <dl class="group-form">
                        <dt>
                            <label>メールアドレス</label>
                        </dt>
                        <dd><input type="text" name="mail" id="mail" value="{$receptionMail}">
                            <p class="txt-note">※お問合せフォームの受付アドレスに使用</p>
                        </dd>
                        <dt>
                            <label>自動返信メール表示用内容</label>
                        </dt>
                        <dd>
                        	<textarea id="contentMail" name="content">
                                {$contentMail}
                            </textarea>
                        </dd>						
						<dt>
                            <label>自動返信メール表示用内容 (Admin)</label>
                        </dt>
                        <dd>
                        	<textarea id="contentMailAdmin" name="contentAdmin">
                                {$contentMailAdmin}
                            </textarea>
                        </dd>
                        <input type="hidden" id="id" name="id" value={$id}>
                        <input type="hidden" id="loginUser" name="loginUser" value={$userId} />
                    </dl>
                        <p class="align-center">
                            <button class="btn button02" type="submit" name="submit" id="btnSave" value="submit">登録</button>
                        </p>
                </div>
            </div>

        </main>
        <script>
        	if(CKEDITOR) {
                CKEDITOR.replace('contentMail', {
                    allowedContent: true,
            toolbar: [
              ["Link", "Unlink",],  // リンク、リンク解除
              ["Bold", "Italic", "Strike", "-","RemoveFormat"],  // 太字、イタリック、打ち消し線、書式を解除
              ["FontSize"],            // フォントサイズ
              ["TextColor","BGColor"],            // テキストカラー、バックグランドカラー
              ["Source"],                                    // ソースコード表示切り替え
            ],
                });
                CKEDITOR.config.extraAllowedContent = 'audio[*]{*}';
                CKEDITOR.config.height = 350;
                CKEDITOR.config.width = 350;
            }
			
			if(CKEDITOR) {
                CKEDITOR.replace('contentAdmin', {
                    allowedContent: true,
            toolbar: [
              ["Link", "Unlink",],  // リンク、リンク解除
              ["Bold", "Italic", "Strike", "-","RemoveFormat"],  // 太字、イタリック、打ち消し線、書式を解除
              ["FontSize"],            // フォントサイズ
              ["TextColor","BGColor"],            // テキストカラー、バックグランドカラー
              ["Source"],                                    // ソースコード表示切り替え
            ],
                });
                CKEDITOR.config.extraAllowedContent = 'audio[*]{*}';
                CKEDITOR.config.height = 350;
                CKEDITOR.config.width = 350;
            }
        </script>

{include file='footer.part.tpl'}