{config_load file='default.conf' section='InquiryList'}
{if $loginRole == '1'}
    {include file='header.part.tpl'}
{else}
    {include file='header.part.tpl'}
{/if}

<main class="main-content">
    <div class="block-contact">
        <div class="head">
            <h2 class="headline">お問い合わせの種類</h2>
            <a href="./?rt=inquiryDetail" class="button02" id="btnAddUser">新規登録</a>
        </div>
        <div class="block-inner">
            <table class="group-table table-striped" id="tblUserList">
                <thead>
                <tr>                   
                    <th>お問い合わせの種類</th>
                    <th>メールアドレス</th>                    
                </tr>
                </thead>
                <tbody>
                 {section name=i loop=$listInquiry}
                  <tr>
                    <td class="inquiryId" data-id="{$listInquiry[i]->getId()}">{$listInquiry[i]->getInquiryType()}</td>
                    <td>{$listInquiry[i]->getReceptionMail()}</td>
                  </tr>
                {/section}
                </tbody>
            </table>
        </div>
        <ul class="list-button" style="padding-top:50px">
            <li>
                <a href="./?rt=contactModify"><button class="button02 btnBack" id="btnBack">一覧へ</button></a>
            </li>            
        </ul>
    </div>
</main>

{include file='footer.part.tpl'}