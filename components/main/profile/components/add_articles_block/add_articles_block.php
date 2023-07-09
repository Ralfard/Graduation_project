<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/main/profile/components/add_articles_block/add_articles_block.css">
<section class="profile__add-article">
    <a class="link" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/add_article.php">
        <div class="add-article__wrapper">
            <div class="user-avatar_circle">
                <img class="img__cover" src="<?= $_SESSION['user']['icon'] ?>" alt="">
            </div>
            <h3 class="add-article-btn">Новая запись</h3>
        </div>
    </a>
</section>
