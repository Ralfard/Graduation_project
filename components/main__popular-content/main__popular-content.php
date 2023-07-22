<main class="main article-feed">
    <div class="main__wrapper">
        <?php

        $sqlArticle = "SELECT * FROM `articles`ORDER BY `id` LIMIT 10";
        $requestArticle = $mysqli->query($sqlArticle);

        for ($i = 0; $i < $requestArticle->num_rows; ++$i) {
            $Article = $requestArticle->fetch_assoc();
            $Article['date'] = date_format(date_create($Article['date']), "d.m.Y");

            $Author = getAuthor($Article['author_id'], $mysqli);
            $Article['img_name'] = 'uploadImages/' . getImages($Article['id'], $mysqli);
        ?>
            <article class="content content_main-page content-wrapper">
                <section class="">
                    <div class="preview__top-panel">

                        <div class="preview__top-panel_left">
                            <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/userProfile.php?id=<?php $Article['id'] ?>">
                                <div class="preview__tag">
                                    <div class="img__wrapper_tag user-avatar_rectangle">
                                        <img class="img__cover" src="<?php echo $Author['icon'] ?>" alt="">
                                    </div>
                                    <span class="preview__panel-text preview__top-panel-text author-name"><?php echo $Author['name'] ?></span>
                                </div>


                            </a>
                            <span class="preview__panel-text preview__top-panel-text preview__tag-name"><?php echo $Article['topic'] ?></span>
                            <time class="preview__panel-text preview__top-panel-text preview__time" datetime='30.01.2000'><?php echo $Article['date'] ?></time>

                        </div>


                        <div class="preview__top-panel_right">
                            <button class="subscribe-btn">
                                <span class="material-icons">
                                    person_add_alt
                                </span>
                                <span class="preview__panel-text preview__top-panel-text subscribe-btn-text">
                                    Подписаться
                                </span>
                            </button>
                        </div>

                    </div>
                    <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages\article.php?id=<?php echo $Article['id'] ?>">
                        <div class="article__content">
                            <h1 class="article__content-h2"><?php echo $Article['title'] ?></h1>
                            <p class="article__content-p"><?php echo $Article['description'] ?></p>
                            <div class="article__content-img">
                                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/<?php echo $Article['img_name'] ?>" alt="">
                            </div>
                        </div>
                    </a>

                    <?php
                    include($_SERVER['DOCUMENT_ROOT'] . '/components\articles__bottom-panel\articles__bottom-panel.php'); //! тут находится include a не include_once
                    ?>
                </section>
            </article>
        <?php
        }
        function getAuthor($id, $DB)
        {
            $sqlAuthor = "SELECT * FROM `users` WHERE `id`= $id ";
            $requestAuthor = $DB->query($sqlAuthor);

            $Author = $requestAuthor->fetch_assoc();
            $Author['icon'] = $Author['icon'] ? $Author['icon'] : "https://placehold.co/40x40/34691E/dddddd?text=" . strtoupper($Author['name'][0]);
            return $Author;
        }
        function getImages($id, $DB)
        {
            $sqlImg = "SELECT * FROM `articleImages` WHERE `article_id`= $id  ";;
            $requestImg = $DB->query($sqlImg);

            $Img = $requestImg->fetch_assoc();

            return $Img['img_name'];
        }

        // echo "<script>alert(".print_r(getImages($Article['id'], $mysqli)).")</script>";
        ?>
    </div>
</main>

</body>

</html>