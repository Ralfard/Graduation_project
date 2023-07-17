<div class="preview__bottom-panel">

    <div class="preview__bottom-panel_left">
        <button class="preview__bottom-panel-action preview__bottom-panel-action_red" data-id="">
            <span class="material-icons likesBtn">
                thumb_up_off_alt
            </span>
            <span class="article__counter preview__panel-text">
                <?php echo $Article['likes'] ?>
            </span>
        </button>
        <button class="preview__bottom-panel-action" data-id="">
            <span class="material-icons  comentsBtn">
                chat_bubble_outline
            </span>
            <span class="article__counter preview__panel-text">
                0
            </span>
        </button>

        <button class="preview__bottom-panel-action"  data-id="">
            <span class="material-icons bookmarksBtn">
                turned_in_not
            </span>
        </button>

    </div>

    <div class="preview__bottom-panel_right">
        <span class="preview__panel-text preview__view-counter ">
            <?= $Article['views'] ?> просмотров
        </span>
    </div>

    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/articles__bottom-panel/articles__bottom-panel.js"></script>
</div>