<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- иконки-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href=" <?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/reset.css">
    <link rel="stylesheet" href=" <?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/grid.css">
    <link rel="stylesheet" href=" <?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/common_styles.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('../include/header_not_authorized.php');

    ?>
    <main class="main">
        <?php
        include_once("../include/nav.php");

        ?>


        <article class="content content_main-page">
            <section class="article__preview">
                <div class="preview__top-panel">

                    <div class="preview__top-panel_left">
                        <a href="">
                            <div class="preview__tag">
                                <div class="img__wrapper_tag">
                                    <img class="img__cover" src="../images/2 2.png" alt="">
                                </div>
                                <span class="preview__panel-text preview__top-panel-text preview__tag-name">Бизнес</span>
                            </div>
                        </a>
                        <a href=""><span class="preview__panel-text preview__top-panel-text author-name">Сидор Пятрович</span></a>
                        <time class="preview__panel-text preview__top-panel-text preview__time" datetime='2000-01-30 00:00'>Завтра</time>
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
                    <h3 class="article__content-title">Канал в телеграме с нуля до 95k, или как послать к чертям все правила </h3>
                    <p class="article__content-text">Как нарушить все правила ведения телеграм-канала и стать вторым по численности каналом в своей нише без платного продвижения и единой рекламы с ERR 86.8%. На своём примере хочу сказать, что если намотать на ус все правила ведения телеграм-канала и забить на них, то у вас все равно есть большая вероятность успеха.</p>
                </div>


                <div class="preview__bottom-panel">

                    <div class="preview__bottom-panel_left">

                        <button class="preview__bottom-panel-action">
                            <span class="material-icons">
                                chat_bubble_outline
                            </span>
                            <span class="article__counter preview__panel-text">
                                500
                            </span>
                        </button>

                        <button class="preview__bottom-panel-action">
                            <span class="material-icons">
                                turned_in_not
                            </span>
                        </button>

                    </div>


                    <div class="preview__bottom-panel_right">
                        <span class="preview__panel-text preview__view-counter ">
                            просмотров
                        </span>
                    </div>

                </div>
            </section>

            <section class="article__main-content">

            </section>

            <section class="article__bottom-panel">

            </section>
            <section class="article__comments">

            </section>
        </article>

    </main>


    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/main_js.js"></script>


</body>

</html>



<!-- 
<div class="preview__bottom-panel">
                    <div class="preview__bottom-panel_left">
                        <button class="preview__bottom-panel-action preview__bottom-panel-action_red">
                            <span class="material-icons">
                                thumb_up_off_alt
                            </span>
                            <span class="article__counter preview__panel-text">
                                500
                            </span>
                        </button>

                        <button class="preview__bottom-panel-action">
                            <span class="material-icons">
                                chat_bubble_outline
                            </span>
                            <span class="article__counter preview__panel-text">
                                500
                            </span>
                        </button>

                        <button class="preview__bottom-panel-action">
                            <span class="material-icons">
                                autorenew
                            </span>
                            <span class="article__counter preview__panel-text">
                                500
                            </span>
                        </button>
                    </div>

                    <div class="preview__bottom-panel_right">
                        <button class="preview__bottom-panel-action preview__bottom-panel-action_orenge">
                            <span class="material-icons">
                                thumb_down_off_alt
                            </span>
                        </button>
                    </div>

                </div>
             -->