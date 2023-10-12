<section class="profile__add-article">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/add_articles_block/add_articles_block.css">
    <a class="link" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>\pages\account\add_article.php">
        <div class="add-article__wrapper">
            <div class="user-avatar_circle">
                <img class="img__cover" src="<?= $_SESSION['user']['icon'] ?>" alt="">
            </div>
            <h3 class="add-article-btn">Новая запись</h3>
        </div>
    </a>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/add_articles_block/add_articles_block.js"></script>
</section>
 