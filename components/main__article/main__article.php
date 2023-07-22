<main class="main article-feed">
    <?php

    $sqlArticle = "SELECT * FROM `articles` WHERE `id`=$articleID";
    $requestArticle = $mysqli->query($sqlArticle);
   

    if (($requestArticle->num_rows) > 0) {
        $Article = $requestArticle->fetch_assoc();
        $Article['date'] = date_format(date_create($Article['date']), "d.m.Y");
        $Author = getAuthor($Article['author_id'], $mysqli);
 
        // $Article['content'] = setSrc($Article['content'], $Article['img_name']);
        increment_views($mysqli, $Article['id']);// * ++просмотры
    ?>
        <article id="article" class="content content_main-page content-wrapper">
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
                <div class="article__content">
                    <p class="article__content-p"><?php echo $Article['content'] ?></p>
                </div>

                <?php
                include_once($_SERVER['DOCUMENT_ROOT'] . '/components\articles__bottom-panel\articles__bottom-panel.php');
                ?>

            </section>
            <script>
                let images = document.getElementById('article').querySelectorAll("[data-img]");
                <?php
                for ($i = 0; $i < (count(getImages($Article['id'], $mysqli))); ++$i) {
                    $imgIndex = getImages($Article['id'], $mysqli);
                ?>
                    images[<?= $i ?>].src = "<?php echo ('/images/uploadImages/' . $imgIndex[$i]['img_name']) ?>";
                    console.log(images[<?= $i ?>].src);
                <?php
                }
                ?>
            </script>
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
        $sqlImg = "SELECT * FROM `articleImages` WHERE `article_id`= $id  ";
        $requestImg = $DB->query($sqlImg);
        $arr = [];
        for ($i = 0; $i < ($requestImg->num_rows); ++$i) {
            $Img = $requestImg->fetch_assoc();
            array_push($arr, $Img);
        }

        return $arr;
    }
 
    ?>
 
</main>

</body>

</html>