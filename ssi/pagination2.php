</br>
<div class="block-pagination">
    <?php
    if (isset($total_page)) {
        if ($total_page > 1) {
            if ($current_page > 1) {
    ?>
                <a class="page-item previous previous2" href="<?php echo "news.php?page=$previouspage"; ?>">
                    前へ
                </a>
            <?php }
            if ($current_page < $total_page) {
            ?>
                <a class="page-item next next2" href="<?php echo "news.php?page=$nextpage"; ?>">
                    次へ
                </a>
            <?php }
        }
    } else {
        if (isset($newsPre)) {
            ?>
            <a class="page-item previous previous2" href="<?php echo "newsdetail.php?id=$newsPre"; ?>">
                前へ
            </a>
        <?php }
        if (isset($newsNext)) {
        ?>
            <a class="page-item next next2" href="<?php echo "newsdetail.php?id=$newsNext"; ?>">
                次へ
            </a>
    <?php
        }
    } ?>

</div>

<?php
if (!isset($total_page)) {
?>
    </br>
    <div class="block-pagination">
        <a class="page-item previous previous2" href="<?php echo "news.php?page=$pagecurrent"; ?>">
            一覧へ
        </a>
    </div>
<?php }

?>