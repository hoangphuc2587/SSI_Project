{config_load file='default.conf' section='ContactHistory'}
{if $loginRole == '1'}
    {include file='header.part.tpl'}
{else}
    {include file='header.part.tpl'}
{/if}

<main class="main-content contact-history">
    <div class="block-contact">
        <div class="head">
            <h2 class="headline">お問い合わせ履歴</h2>
        </div>
        <div class="block-inner">
            <table class="group-table table-striped table-column-width">
                <thead>
                    <tr>
                        <th class="small-column">NO</th>
                        <th>会社名</th> <!-- company -->
                        <th>お名前</th> <!-- name -->
                        {* <th>郵便番号</th> <!-- code -->
                        <th>都道府県</th> <!-- prefectures -->
                        <th>市区町村</th> <!-- city -->
                        <th>番地、ビル、建物名</th> <!-- address --> *}
                         <th class="long-column">住所</th> <!-- address -->
                        <th>電話番号</th> <!-- phone -->
                        <th class="medium-column">メールアドレス</th> <!-- email -->
                        <th>FAX番号</th> <!-- fax -->
                        <th>ご担当者様携帯番号</th><!-- phone2 -->
                        <th class="medium-column">お問い合わせの種類</th><!-- iquiry -->
                        <th class="long-column">お問い合わせ内容</th><!-- content -->
                        <th>送信日</th><!-- create day -->
                    </tr>
                </thead>
                <tbody>
                    {if (isset($contact) && !empty($contact))}
                    {section name=i loop=$contact}
                    <tr>
                        <td class="center no">{$smarty.section.i.rownum}</td>
                        <td class="area">{$contact[i]->getCompanyName()}
                        </td>
                        <td class="guest-name">{$contact[i]->getGuestName()} 
                        </td>
                         {* <td>
                            {$contact[i]->getPostalCode()}
                        </td> 
                        <td class="phone-code">
                            {$contact[i]->getPrefectures()}
                        </td>
                        <td class="guest-name">
                            {$contact[i]->getCity()}
                        </td>
                        <td class="furigana-name">
                            {$contact[i]->getAddress()}
                        </td> *}
                        <td>
                            {$contact[i]->getPostalCode()} <br>
                            {$contact[i]->getPrefectures()} {$contact[i]->getCity()}
                            {$contact[i]->getAddress()}
                        </td> 
                        <td class="phone">
                            {if (isset($contact[i]->getPhone()) && !empty($contact[i]->getPhone()))}
                            {$contact[i]->getPhone()}
                            {/if}
                        </td>
                     
                        <td class="email">
                            {if (isset($contact[i]->getEmail()) && !empty($contact[i]->getEmail()))}
                            {$contact[i]->getEmail()}
                            {/if}
                        </td>
                           <td class="phone-code">{$contact[i]->getFax()} 
                        </td>
                        </td>
                           <td class="phone-code">{$contact[i]->getPhoneContact()} 
                        </td>
                        </td>
                           <td class="phone-code">{$contact[i]->getInquiryItem()} 
                        </td>
                        </td>
                           <td class="content">{$contact[i]->getContent()} 
                        </td> 
                        <td class="create-date">
                            {if (isset($contact[i]->getCreateDate()) && !empty($contact[i]->getCreateDate()))}
                            {$contact[i]->getCreateDate()}
                            {/if}
                        </td>

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
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$previouspage}"><</a></li>
                        {elseif $current_page == 1 && $total_page>2}
                            <li class="disabled"><a><</a></li>
                        {/if}
                        {for $i=1 to $total_page} 
                            <li class="page-item {if $current_page==$i} {$class}  {/if}"><a class="page-link" href="?rt=contactHistory&page={$i}">{$i}</a></li>
                        {/for}
                        {if $current_page != $total_page && $total_page>2}
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$nextpage}">></a></li>
                            {elseif $current_page == $total_page && $total_page>2}<li class="disabled"><a>></a></li>
                        {/if}
                    {elseif $total_page > 5}
                        {if $current_page<4 }
                            {if $current_page == 1}
                                <li class="disabled"><a><</a></li>
                                {else}
                                <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$previouspage}"><</a></li>
                            {/if}
                            {for $i=1 to 4}
                                <li class="page-item {if $current_page==$i} {$class}  {/if}"><a class="page-link" href="?rt=contactHistory&page={$i}">{$i}</a></li>
                            {/for}

                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$total_page}">{$total_page}</a></li>
                            {if $current_page == $total_page}
                             <li class="disabled"><a>></a></li>
                            {else}
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$nextpage}">></a></li>
                            {/if}
                        {elseif $current_page<$total_page-2}
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$previouspage}"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item "><a class="page-link" href="?rt=contactHistory&page={$current_page-1}">{$current_page-1}</a></li>
                            <li class="page-item active"><a class="page-link" href="?rt=contactHistory&page={$current_page}">{$current_page}</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$current_page+1}">{$current_page+1}</a></li>
                            <li class="disabled"><a>...</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$total_page}">{$total_page}</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$nextpage}">></a></li>
                        {elseif $current_page>=$total_page-3}
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$previouspage}"><</a></li>
                            <li class="page-item"><a class="page-link" href="?rt=contactHistory&page=1">1</a></li>
                            <li class="disabled"><a>...</a></li>
                            <!--  $i=$current_page to $total_page -->
                            {for $i=$total_page-3 to $total_page}
                                <li class="page-item {if $current_page==$i} {$class}  {/if}"><a class="page-link" href="?rt=contactHistory&page={$i}">{$i}</a></li>
                            {/for}
                            {if $current_page==$total_page}
                                <li class="disabled"><a>></a></li>
                            {else}
                                <li class="page-item"><a class="page-link" href="?rt=contactHistory&page={$nextpage}">></a></li>
                            {/if}
                        {/if}

                        
                    {/if}
                </ul>
            </nav>
        </div>
        {/if}
    </div>
</main>

{include file='footer.part.tpl'}