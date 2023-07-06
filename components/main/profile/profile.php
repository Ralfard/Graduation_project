


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- иконки-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/reset.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/common_styles.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/autorization.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/header.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/nav.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/mobile-footer.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/profile.css">
</head>

<body style="background-color: #F2F0F2;">
    <?php
    if (isset($_SESSION['user'])) {
        include_once('../include/header_authorized.php');
    } else {
        include_once('../include/header_not_authorized.php');
    }
    ?>
    <main class="main">
        <?php
        include_once("../include/nav.php");
        ?>
        <div class="profile">
            <section class="profile__description">
                <div class="profile__wallpaper">
                    <img class="img__cover" src="../images/wallpaper.jpg" alt="">
                    <div class="profile__avatar">
                        <img class="img__cover" src="<?= $_SESSION['user']['icon'] ?>" alt="">
                    </div>
                </div>
                <div class="profile__info">
                    <h1 class="profile__user-name">
                        <?= $_SESSION['user']['name'] ?>
                    </h1>
                    <div class="row">
                        <a class="profile__edit-profile-link" href="">
                            <span class="profile__blue-text">
                                Изменить описание
                            </span>
                        </a>
                    </div>
                    <div class="profile__btns-wrapper">
                        <button class="profile__btns material-icons-outlined profile__messages-btn">sms <span class="profile__messages-text">Написать</span></button>
                        <button class="profile__btns profile__settings-btn material-icons-outlined">settings</button>
                    </div>
                    <p class="profile__followers">500 подписчиков</p>
                    <p class="profile__registration-date">На проекте с 15.03.2023</p>
                </div>
            </section>

            <div class="profile__desctop-left-block">


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


                <section class="profile__articles">
                    <div class="profile__alternative">
                        <p class="profile__alternative-text">
                            Напишите первую статью, чтобы привлечь читателей в ваш блог
                        </p>
                        <button class="profile__alternative-btn">Создать запись</button>

                    </div>
                </section>

            </div>


            <div class="profile__desctop-right-block">

                <section class="profile__subscribers">
                    <div class="text-block">
                        <h3 class="profile__h3">Подписчики</h3><span class="profile__gray-text">500</span>
                    </div>
                    <div class="profile__subscribers-gallery">
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <div class="user-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                    </div>
                    <span class="profile__blue-text">Показать всех</span>
                </section>

                <section class="profile__subscriptions">
                    <div class="text-block">
                        <h3 class="profile__h3">Подписки</h3><span class="profile__gray-text">500</span>
                    </div>
                    <div class="profile__subscriptions-item">
                        <div class="topic-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <span class="">Технологии</span>
                    </div>
                    <div class="profile__subscriptions-item">
                        <div class="topic-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <span class="">Технологии</span>
                    </div>
                    <div class="profile__subscriptions-item">
                        <div class="topic-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <span class="">Технологии</span>
                    </div>
                    <div class="profile__subscriptions-item">
                        <div class="topic-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <span class="">Технологии</span>
                    </div>
                    <div class="profile__subscriptions-item">
                        <div class="topic-avatar_rectangle">
                            <img class="img__cover" src="../images/2 2.png" alt="">
                        </div>
                        <span class="">Технологии</span>
                    </div>
                    <span class="profile__blue-text">Показать все</span>
                </section>
            </div>

        </div>
    </main>


    <?php
    if (isset($_SESSION['user'])) {
        include_once("../include/mobile_footer_authorized.php");
    } else {
        include_once("../include/mobile_footer_not_authorized.php");
    }
    ?>



    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/profile.js"></script>
</body>

</html>