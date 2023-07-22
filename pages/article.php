<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php'); //*база данных
include_once($_SERVER['DOCUMENT_ROOT'].'/PHP_logic/functions.php');  //*мои функции


if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
$articleID = $_GET['id'];
?>
<!DOCTYPE html><!-- стоит тут потому что иначе включится режим совместимости -->
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div id="links" class="display_none">
        <!-- Иконки -->
        <link rel="stylesheet preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="font"><!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->
        <link rel="stylesheet preload" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" as="font"><!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->
        <!-- Шрифт -->
        <link rel="stylesheet preload" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" as="font"><!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->

        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/reset.css">

        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/header/header.css">
        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/header/autorizationModalWindow/autorizationModalWindow.css">

        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/nav/nav.css">
        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/main/main.css">

        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/footer/mobile-footer.css">

        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/style.css">
    </div>

    <title>ТуТ был Я</title>


</head>

<body id="body">


    <!--                                                                                                      nav
    |                    header                              |                                               |=         header     |
    |_________________________________|                                               |_ _____________|
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |       main            |           asaid нету
    |  nav   |     main                   |   asaide    |                                               |                          |
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |_______________|
    |          |                               |                |                                               | footer-mobile      |
-->

 

    <?php
    //HEADER
    if (isset($_SESSION['user'])) {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/header_authorized.php');
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/header_not_authorized.php');
    }
    ?>


    <div id="middleContent" class="middle-content">

 
        <?php
        //NAV
        include_once($_SERVER['DOCUMENT_ROOT'] . "/components/nav/nav.php");

        //MAIN 
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components\main__article\main__article.php');

        //ASAID
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/aside/aside.php');

        ?>

    </div>


    <?php
    //FOOTER
    if (isset($_SESSION['user'])) {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/components/footer/mobile_footer_authorized.php");
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/components/footer/mobile_footer_not_authorized.php");
    }
    ?>


    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/script.js"></script>
    <div class="display_none">
        <!-- Favicon  -->
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    </div>
</body>

</html>