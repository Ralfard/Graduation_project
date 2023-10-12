<section id="coments" class="article__comments">
    <link rel="stylesheet" href="/components//article__comments/article__comments.css">


    <h3 class="article__content-h3">Коментарии</h3>
    <form id="addComentForm" class="article__coments-form" action="/PHP_logic\add-comment\add-comment.php" method="POST" enctype="multipart/form-data">
        <textarea class="article__content-p article__write-coment " name="textArea" id="" placeholder="Написать коментарий..."></textarea>
        <input class="btn btn_position" type="submit" value="Отправить">
    </form>

    <section class="comentsList">
        <?php
        $sql = "SELECT * FROM `articles__comments` WHERE `article_id`=".$_GET['id']."";
        $requestComments = $mysqli->query($sql);
        for ($i = 0; $i < $requestComments->num_rows; ++$i) {
            $comment = $requestComments->fetch_assoc();
            $comment_author = getAuthor($comment['author_id'], $mysqli);
        ?>
            <div class="comment">
                <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/userProfile.php?id=<?php echo $comment_author['id'] ?>">
                    <div class="comment__top-row">
                        <div class="comment__img-wrapper user-avatar_circle">
                            <img class="img__cover" src="<?= $comment_author['icon'] ?>" alt="">
                        </div>
                        <div class="comment__info-column">
                            <span class="comment__author-name author-name"><?= $comment_author['name'] ?></span>
                            <time class="preview__time" datetime='00:00 30-01-2000'><?= $comment['date_time'] ?></time>
                        </div>
                    </div>
                </a>
                <div class="comment__middle-row">
                    <p class="comment__text article__content-p">
                        <?= $comment['text'] ?>
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
    <script src="/components/article__comments/article__comments.js"></script>
</section>