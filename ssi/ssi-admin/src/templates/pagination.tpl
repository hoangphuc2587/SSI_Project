            <div class="news-pagination">

                <nav aria-label="Page navigation example" class="pc">
                    <ul class="pagination">
                        {if $total_page>5}
                            {if $current_page == 1}
                                <li class="disabled"><a><</a></li>
                                <li class="page-item active"><a class="page-link" href="?rt={$paginationParams}&page={$current_page}">{$current_page}</a></li>
                            {else}
                                <li class=""><a href="?page={$previouspage}"><</a></li>
                                <li class="page-item "><a class="page-link" href="?rt={$paginationParams}&page=1">1</a></li>
                            {/if}
                            {if ($previouspage-1) >0}
                                {if ($previouspage-1) >1&&($current_page-3) !=1}
                                    <li class="page-item disabled"><a class="pagin">...</a></li>
                                
                                {elseif ($previouspage-1) >1}
                                    <li class="page-item"><a class="page-link " href="?rt={$paginationParams}&page={$previouspage-1}">{$previouspage-1}</a></li>
                                {/if}
                                <li class="page-item"><a class="page-link " href="?rt={$paginationParams}&page={$previouspage}">{$previouspage}</a></li>
                            {/if}
                            {if ($current_page != 1)}
                                <li class="page-item active"><a class="page-link " href="?rt={$paginationParams}&page={$current_page}">{$current_page}</a></li>
                            {/if}
                            {if ($nextpage+1)<= $total_page}
                                <li class="page-item"><a class="page-link" href="?rt={$paginationParams}&page={$nextpage}">{$nextpage}</a></li>
                                {if ($nextpage+1)<$total_page}
                                    <li class="page-item"><a class="page-link" href="?rt={$paginationParams}&page={$nextpage+1}">{$nextpage+1}</a></li>
                                {/if}
                            {/if}
                            {if $current_page == 1 && ($nextpage+2)<= $total_page}
                                <li class="page-item"><a class="page-link" href="?rt={$paginationParams}&page={$nextpage+2}">{$nextpage+2}</a></li>
                            {/if}    
                            {if $current_page == 1&& ($nextpage+3)<= $total_page}
                                <li class="page-item"><a class="page-link" href="?rt={$paginationParams}&page={$nextpage+3}">{$nextpage+3}</a></li>
                             {/if}   
                            {if $current_page != $total_page}
                                {if ($current_page+1)!=($total_page) && $nextpage<($total_page-1) && ($current_page+3)!=($total_page)}
                                    <li class="disabled"><a class="pagin">...</a></li>
                                {/if}
                                <li class="page-item"><a class="page-link" href="?rt={$paginationParams}&page={$total_page}">{$total_page}</a></li>
                                <li class=""><a href="?rt={$paginationParams}&page={$nextpage}">></a></li>
                            {/if}
                  
                        {elseif $current_page>=1&&$total_page>1 &&$total_records>$limit}
                                 
                                {if $current_page != 1 && $total_page>2}
                                    <li class="page-item"><a class="page-link pagination-ajax" href="?rt={$paginationParams}&page={$previouspage}"><</a></li>
                                {/if}
                                {for $i=1 to $total_page} 
                                    <li class="page-item {if $current_page==$i} {$class}  {/if}"><a class="page-link" href="?rt={$paginationParams}&page={$i}">{$i}</a></li>
                                {/for}
                                {if $current_page != $total_page && $total_page>2}
                                    <li class="page-item"><a class="page-link pagination-ajax" href="?rt={$paginationParams}&page={$nextpage}">></a></li>
                                {/if}
                           {/if}
                    </ul>
                </nav>
                
            </div> <!-- pagination -->