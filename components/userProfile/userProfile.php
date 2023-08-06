<main class="main">
            <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/myProfile/myProfile.css">
            <div class="profile">
                <section class="profile__description">
                    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profileDescription/profileDescription.css">
                    <div class="profile__wallpaper">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/wallpaper.jpg" alt="">
                        <div class="profile__avatar">
                            <img class="img__cover" src="<?= $responseUser['icon'] ? $responseUser['icon'] : "https://placehold.co/40x40/34691E/dddddd?text=" . strtoupper($responseUser['name'][0]); ?>" alt="">
                        </div>
                    </div> 
                    <div class="profile__info">
                        <h1 class="profile__user-name">
                            <?php echo $responseUser['name'] ?>
                        </h1>
                        <div class="row">
                            <a class="profile__edit-profile-link" href="">
                                <span class="profile__blue-text">
                                    Изменить описание
                                </span>
                            </a> 
                        </div>
                        <div class="profile__btns-wrapper">
                            <button id="" class="profile__btns material-icons-outlined profile__messages-btn">
                                sms <span class="profile__messages-text">Написать</span>
                            </button>
                            <!-- <button class="profile__btns profile__settings-btn material-icons-outlined">settings</button> -->
                        </div>
                        <p class="profile__followers"><?php echo $responseUser['subscribers'] ?> подписчиков</p>
                        <p class="profile__registration-date">На проекте с <?php echo $responseUser['date_registration'] ?></p>
                    </div>
                    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profileDescription//profileDescription.js"></script>
                </section>

                <section class="profile__articles">
                    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profile__articles/profile__articles.css">
                    <?php
                    $sqlArticles = "SELECT * FROM `articles` WHERE `author_id`=$userID";
                    $requestArticles = $mysqli->query($sqlArticles) or die($mysqli->error);
                    if ($requestArticles->num_rows === 0) {
                    ?>
                        <div class="profile__alternative">
                            <p class="profile__alternative-text">
                                Напишите первую статью, чтобы привлечь читателей в ваш блог
                            </p>
                            <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>\pages\account\add_article.php"><button class="profile__alternative-btn">Создать запись</button></a>
                        </div>
                    <?php
                    }

                        for ($i = 0; $i < $requestArticles->num_rows; ++$i) {
                            $Article = $requestArticles->fetch_assoc();
                            $Article['date'] = date_format(date_create($Article['date']), "d.m.Y");

                            $Author = getAuthor($Article['author_id'], $mysqli);
                            $Article['img_name'] = 'uploadImages/' . getImages($Article['id'], $mysqli);
                            ?>
                            <article class="content content_main-page content-wrapper" style="margin: auto;">
                                <section class="">
                                    <div class="preview__top-panel">

                                        <div class="preview__top-panel_left">
                                            <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/userProfile.php?id=<?php echo $Author['id'] ?>">
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


                        ?>
                        <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profile__articles/profile__articles.js"></script>
                </section>



            </div>
        </main>