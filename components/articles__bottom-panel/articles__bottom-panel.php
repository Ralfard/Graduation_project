<div class="preview__bottom-panel">

    <div class="preview__bottom-panel_left">
        <button class="preview__bottom-panel-action preview__bottom-panel-action_red">
            <span class="material-icons likesBtn <?php echo check_likes_of_authorizedUser($mysqli, $_SESSION['user'], $Article['id']) ?>" data-id="<?php echo $Article['id'] ?>">
                thumb_up_off_alt
            </span>
            <span class="article__counter preview__panel-text">
                <?php echo $Article['likes'] ?>
            </span>
        </button>
        <button class="preview__bottom-panel-action">
            <span class="material-icons  comentsBtn" data-id="<?php echo $Article['id'] ?>">
                chat_bubble_outline
            </span>
            <span class="article__counter preview__panel-text">
                0
            </span>
        </button>

        <button class="preview__bottom-panel-action">
            <span class="material-icons bookmarksBtn" data-id="<?php echo $Article['id'] ?>">
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