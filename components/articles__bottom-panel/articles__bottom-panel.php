<div class="preview__bottom-panel">

    <div class="preview__bottom-panel_left">
        <button class="preview__bottom-panel-action preview__bottom-panel-action_red">
            <span class="material-icons likesBtn <?php echo isset($_SESSION['user']) ? (check_likes_of_authorizedUser($mysqli, $_SESSION['user'], $Article['id'])) : false ?>" data-id="<?php echo $Article['id'] ?>">
                thumb_up_off_alt
            </span>
            <span class="article__counter preview__panel-text">
                <?php echo $Article['likes'] ?>
            </span>
        </button>

        <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/article.php?id=<?php echo $Article['id'] ?>#coments">
            <button class="preview__bottom-panel-action">
                <span class="material-icons  comentsBtn" data-id="<?php echo $Article['id'] ?>">
                    chat_bubble_outline
                </span>
                <span class="article__counter preview__panel-text">
                    <?php
                    $count_comments_sql = "SELECT * FROM `articles__comments` WHERE `article_id`=" . $Article['id'] . "";
                    $count_comments_res=$mysqli->query($count_comments_sql) or die (mysqli_error($mysqli));
                    echo $count_comments_res->num_rows;
                    ?>
                </span>
            </button>
        </a>

        <button class="preview__bottom-panel-action">
            <span class="material-icons bookmarksBtn <?php echo isset($_SESSION['user']) ? (check_likes_of_bookmarks($mysqli, $_SESSION['user'], $Article['id'])) : false ?>" data-id="<?php echo $Article['id'] ?>">
                turned_in_not
            </span>
        </button>

    </div>

    <div class="preview__bottom-panel_right">
        <span class="preview__panel-text preview__view-counter "><?= $Article['views'] ?></span>
        <span class="preview__panel-text preview__view-counter ">просмотров</span>
    </div>

    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/articles__bottom-panel/articles__bottom-panel.js"></script>
</div>