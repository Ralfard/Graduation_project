<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/main/profile/components/profileDescription/profileDescription.css">
<section class="profile__description">
    <div class="profile__wallpaper">
        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/wallpaper.jpg" alt="">
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
<script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/main/profile/components/profileDescription//profileDescription.js"></script>
