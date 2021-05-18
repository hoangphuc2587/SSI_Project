{config_load file='default.conf' section='UserList'}
{if $loginRole == '1'}
    {include file='header.part.tpl'}
{else}
    {include file='header.part.tpl'}
{/if}

<main class="main-content">
    <div class="block-contact">
        <div class="head">
            <h2 class="headline">ユーザー管理</h2>
            <a href="./?rt=userDetail" class="button02" id="btnAddUser">新規登録</a>
        </div>
        <div class="block-inner">
            <table class="group-table table-striped" id="tblUserList">
                <thead>
                <tr>
                    <th>ユーザーID</th>
                    <th>ユーザーメール</th>
                    <!-- <th>ロール</th> -->
                    <th>削除</th>
                </tr>
                </thead>
                <tbody>
                 {section name=i loop=$listUser}
                  <tr>
                    <td class="userId">{$listUser[i]->getUserId()}</td>
                    <td>{$listUser[i]->getMail()}</td>
                    <!-- <td>{$listUser[i]->getRole()}</td> -->
                    <td class="center"><button class="btn-icon" name="btnDeleteUser"><i class='fas fa-trash-alt fa-2x'></i></button></td>
                  </tr>
                {/section}
                </tbody>
            </table>
        </div>
    </div>
</main>

{include file='footer.part.tpl'}