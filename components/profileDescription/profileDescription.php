<?php
$userID = $_SESSION['user']['id'];
$sqlUser = "SELECT date_registration, subscribers  FROM `users` WHERE `id`=$userID";
$requestUser = $mysqli->query($sqlUser);
$responseUser = $requestUser->fetch_assoc();
$subscribers=$responseUser['subscribers'];

$date_registration=date_format(date_create($responseUser['date_registration']), "d.m.Y");
?>
<section class="profile__description">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profileDescription/profileDescription.css">
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
        
        <p class="profile__followers"><?php echo $subscribers ?> подписчиков</p>
        <p class="profile__registration-date">На проекте с <?php echo $date_registration ?></p>
    </div>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profileDescription//profileDescription.js"></script>
</section>
<?php

?>