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

    <link rel="stylesheet" href="../styles/common_styles.css">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/profile.css">
</head>

<body style="background-color: #F2F0F2;">
    <main class="main">
        <div class="profile">
            <section class="profile__description">
                <div class="profile__wallpaper">
                    <img class="img__cover" src="../images/wallpaper.jpg" alt="">
                    <div class="profile__avatar">
                        <img class="img__cover" src="../images/2 2.png" alt="">
                    </div>
                </div>
                <div class="profile__info">
                    <h1 class="profile__user-name">
                        Роман Ефимов
                    </h1>
                    <p class="profile__user-description">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus eligendi quidem, quibusdam
                        repudiandae, dolor fugiat cum vero at nesciunt sequi dolorem rerum non? Ducimus sunt dolores
                        laborum. Cumque, libero magnam?
                    </p>
                    <div class="profile__btns-wrapper">
                        <button class="profile__btns profile__messages-btn material-icons-outlined">
                            person_add_alt
                            <span class="profile__messages-text">Подписаться</span>
                        </button>
                        <button class="profile__btns profile__settings-btn material-icons-outlined">sms</button>
                    </div>
                    <p class="profile__followers">500 подписчиков</p>
                    <p class="profile__registration-date">На проекте с 15.03.2023</p>
                </div>
            </section>
            <div class="profile__desctop-left-block">
                <section class="profile__articles">
                    <div class="profile__alternative">
                        <p class="profile__alternative-text">
                            Этот пользователь еще не написал ни одной статьи.
                        </p>
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
    <script src="../js/profile.js"></script>
</body>

</html>