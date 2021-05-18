{config_load file='default.conf' section='ListNews'}
{if $loginRole == '1'}
    {include file='header.part.tpl'}
{else}
    {include file='header.part.tpl'}
{/if}

<main class="main-content contact-history">
    <div class="block-contact">
        <div class="head">
            <h2 class="headline">ニュースリスト</h2>
            <a href="./?rt=news/addNews" class="button02">ニュースを追加</a>
        </div>
        <div class="block-inner">
            <table class="group-table table-striped" id="tblNews">
                <thead>
                    <tr>
                        <th class="small-column">NO</th>
                        <th class="medium-column">タイトル</th>
                        <th class="newsImg-column">画像</th>
                        <!-- th class="long-column">内容</th -->
                        <th>表示</th>
                        <th>登録日付</th>
                        <th class="action">アクション</th>
                    </tr>
                </thead>
                <tbody>
                    {if (isset($listNews) && !empty($listNews))}
                    {section name=i loop=$listNews}
                    <tr >
                        <td class="center">{$smarty.section.i.rownum}</td>
                        <td  style="max-width: 200px">{$listNews[i]->getTitle()}</td>
                        <td class="center">
                            {if $listNews[i]->getImage() !=null}
                            
                                {assign var="listImage" value=","|explode:$listNews[i]->getImage()}
                                {$arr = $listImage[0]}
                                    <img class="image-news" src="{$imgPath}{$arr}">
                            
                            {else}
                             <img class="image-news" src="src/image/no-image.png">
                            {/if}
                        </td>
                        <!-- td style="max-width: 600px">{$listNews[i]->getContent()}</td -->
                        <td class="center">
                            <div class="on-off-btn mr20">
                                <div class="toggle-group">
                                    <input name="toggleDisplay" id="toggleDisplay{$smarty.section.i.rownum}" type="checkbox" 
                                           tabindex="1">
                                    <label for="toggleDisplay{$smarty.section.i.rownum}">&nbsp;</label>
                                    <div class="onoffswitch pull-right" aria-hidden="true">
                                        <div class="onoffswitch-label">
                                            <div class="onoffswitch-inner"></div>
                                            <div class="onoffswitch-switch"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="center" style="max-width: 200px">{$listNews[i]->getDisplayDate()}</td>
                        <td class="align-center action">
                            <a href="./?rt=news/edit&id={$listNews[i]->getId()}"  class="btnEditCategory"><i class="fas fa-edit fa-2x"></i></a>
                            <a href="./?rt=news/delete&id={$listNews[i]->getId()}" class="btnDeleteNews"><i class="fas fa-trash-alt fa-2x"></i></a> 
                        </td>
                        <input type="hidden" id=id{$smarty.section.i.rownum} class="newId" value={$listNews[i]->getId()} />
                        <input type="hidden" id=displayFlag{$smarty.section.i.rownum} value={$listNews[i]->getDisplayFlag()} />
                    </tr>
                    {/section}
                    {/if}
                </tbody>
            </table>
        </div>
        <!-- pagination -->
        {if $total_records != 0}
        <div class="news-pagination contact-pagination">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {if $total_page <= 5 && $current_page >= 1 && $total_page > 1 && $total_records != 0}
                        {if $current_page != 1 && $total_page>2}
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$previouspage}"><</a></li>
                        {elseif $current_page == 1 && $total_page>2}
                            <li class="disabled"><a><</a></li>
                        {/if}
                        {for $i=1 to $total_page} 
                            <li class="page-item {if $current_page==$i} {$class}  {/if}"><a class="page-link" href="?rt=news&page={$i}">{$i}</a></li>
                        {/for}
                        {if $current_page != $total_page && $total_page>2}
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$nextpage}">></a></li>
                            {elseif $current_page == $total_page && $total_page>2}<li class="disabled"><a>></a></li>
                        {/if}
                    {elseif $total_page > 5}
                        {if $current_page<4 }
                            {if $current_page == 1}
                                <li class="disabled"><a><</a></li>
                                {else}
                                <li class="page-item"><a class="page-link" href="?rt=news&page={$previouspage}"><</a></li>
                            {/if}
                            {for $i=1 to 4}
                                <li class="page-item {if $current_page==$i} {$class}  {/if}"><a class="page-link" href="?rt=news&page={$i}">{$i}</a></li>
                            {/for}

                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$total_page}">{$total_page}</a></li>
                            {if $current_page == $total_page}
                             <li class="disabled"><a>></a></li>
                            {else}
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$nextpage}">></a></li>
                            {/if}
                        {elseif $current_page<$total_page-2}
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$previouspage}"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item "><a class="page-link" href="?rt=news&page={$current_page-1}">{$current_page-1}</a></li>
                            <li class="page-item active"><a class="page-link" href="?rt=news&page={$current_page}">{$current_page}</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$current_page+1}">{$current_page+1}</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$total_page}">{$total_page}</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$nextpage}">></a></li>
                        {elseif $current_page>=$total_page-3}
                            <li class="page-item"><a class="page-link" href="?rt=news&page={$previouspage}"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=news&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <!--  $i=$current_page to $total_page -->
                            {for $i=$total_page-3 to $total_page}
                                <li class="page-item {if $current_page==$i} {$class}  {/if}"><a class="page-link" href="?rt=news&page={$i}">{$i}</a></li>
                            {/for}
                            {if $current_page==$total_page}
                                <li class="disabled"><a>></a></li>
                            {else}
                                <li class="page-item"><a class="page-link" href="?rt=news&page={$nextpage}">></a></li>
                            {/if}
                        {/if}

                        
                    {/if}
                </ul>
            </nav>
        </div>
        {/if}
    </div>
</main>
<script type="text/javascript">
     //Event when delete
    $("button[name='btnDeleteNews']").click(function(e) {

        var confirm = window.confirm('この新着を削除してよろしいですか？')
        if (confirm) {
            var del_id = $(this).attr("data-id");
            var row = $(this).closest('tr');
            var parent = $(this).parent().parent();
            var postData = {
                id:del_id
            };
            //Call ajax for update Delete Flag to DB
            $.ajax({
                type:'POST',
                contentType: 'application/json',
                url: './?rt=news/delete',
                dataType: "json",
                data:JSON.stringify(postData),
                success:function(response) { 
                    row.remove();
                },
                 error: function(response) {
                    alert("サーバエラー");
                }
            });    
        }else{
            e.preventDefault();
        }
        
        e.stopPropagation();
    });
</script>
{include file='footer.part.tpl'}