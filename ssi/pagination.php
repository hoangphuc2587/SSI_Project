<div class="block-pagination">
    <ul class="pagination">
        <?php $class = "active";
        if (isset($total_page)) {
            if ($total_page <= 5 && $current_page >= 1 && $total_page > 1) {
                if ($current_page != 1 && $total_page > 2) { ?>
                    <li class="page-item previous">
                        <a class="page-link" href="<?php echo "news.php?page=$previouspage"; ?>">
                            <span aria-hidden="true">Previous</span></a>
                    </li>
                <?php
                }
                if ($current_page == 1 && $total_page > 2) { ?>
                    <li class="disabled previous page-item">
                        <a> Previous</a>
                    </li> <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li class="page-item <?php if ($current_page == $i) {
                                                echo $class;
                                            } ?>">
                        <a class="page-link" href="<?php echo "news.php?page=$i"; ?>"> <?php echo $i; ?></a>
                    </li>
                <?php
                        }
                        if ($current_page != $total_page && $total_page > 2) { ?>
                    <li class="page-item next">
                        <a class="page-link" href="<?php echo "news.php?page=$nextpage"; ?>">Next</a>
                    </li>
                <?php
                        }
                        if ($current_page == $total_page && $total_page > 2) { ?>
                    <li class="disabled  page-item next"><a>Next</a></li>
                    <?php
                        }
                    }
                    if ($total_page > 5) {
                        if ($current_page < 4) {
                            if ($current_page == 1) { ?>
                        <li class="disabled page-item previous ">
                            <a class="page-link">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>
                    <?php
                            } else { ?>
                        <li class="page-item previous">
                            <a class="page-link" href="<?php echo "news.php?page=$previouspage"; ?>">
                                Previous</a>
                        </li> <?php
                            }
                            for ($i = 1; $i <= 5; $i++) { ?>
                        <li class="page-item <?php if ($current_page == $i) {
                                                    echo $class;
                                                } ?>">
                            <a class="page-link" href="<?php echo "news.php?page=$i"; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php
                            } ?>

                    <li class="disabled"><a class="pagin">...</a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo "news.php?page=$total_page"; ?>"><?php echo $total_page; ?></a></li>
                    <?php
                            if ($current_page == $total_page) { ?>
                        <li class="disabled page-item next"><a class="page-link">Next</a></li>
                    <?php
                            } else { ?>
                        <li class="page-item next">
                            <a class="page-link" href="<?php echo "news.php?page=$nextpage"; ?>">Next</a>
                        </li>
                    <?php }
                        } elseif ($current_page < $total_page - 2) { ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo "news.php?page=$previouspage"; ?>">
                        Previous </a> </li> <li class="page-item"><a class="page-link" href="<?php echo "news.php?page=1"; ?>">1</a></li>
                    <li class="disabled"><a class="pagin">...</a></li>
                    <li class="page-item "><a class="page-link" href="<?php echo "news.php?page=" . ($current_page - 1); ?>"><?php echo $current_page - 1; ?></a></li>
                    <li class="page-item active"><a class="page-link" href="<?php echo "news.php?page=" . ($current_page); ?>"><?php echo $current_page; ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo "news.php?page=" . ($current_page + 1); ?>"><?php echo $current_page + 1; ?></a></li>
                    <li class="disabled"><a class="pagin">...</a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo "news.php?page=$total_page"; ?>"><?php echo $total_page; ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo "news.php?page=$nextpage"; ?>">Next</a></li>
                <?php
                        } elseif ($current_page >= $total_page - 3) { ?>
                    <li class="page-item previous"><a class="page-link" href="<?php echo "news.php?page=$previouspage"; ?>">
                    Previous</a> </li> <li class="page-item"><a class="page-link" href="<?php echo "news.php?page=1"; ?>">1</a></li>
                    <li class="disabled"><a class="pagin">...</a></li>
                    <?php for ($i = $total_page - 3; $i <= $total_page; $i++) {  ?>
                        <li class="page-item <?php if ($current_page == $i) {
                                                    echo $class;
                                                } ?>"><a class="page-link" href="<?php echo "news.php?page=$i"; ?>"><?php echo $i; ?></a></li>
                    <?php }
                            if ($current_page == $total_page) { ?>
                        <li class="disabled page-item next"><a class="page-link">Next</a></li>
                    <?php } else { ?>
                        <li class="page-item next"><a class="page-link" href="<?php echo "news.php?page=$nextpage"; ?>">Next</a></li>
        <?php }
                        }
                    }
                } ?>
    </ul>
</div>