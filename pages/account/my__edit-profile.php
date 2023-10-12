<?php
session_start();
include_once('../../PHP_logic/dataBase/db_connect.php'); //база данных
require_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/functions.php');  //*мои функции


if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: /index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div id="links" class="display_none">
        <!-- Иконки -->
        <link rel="stylesheet" href="/plugins/node_modules/material-icons/iconfont/material-icons.css">
        <link rel="stylesheet preload" href="/plugins/node_modules/roboto-fontface/css/roboto/roboto-fontface.css" as="font">
        <link rel="stylesheet preload" href="/plugins/node_modules/roboto-fontface/css/roboto-slab/roboto-slab-fontface.css" as="font">
        <link rel="stylesheet preload" href="/plugins/node_modules/roboto-fontface/css/roboto-condensed/roboto-condensed-fontface.css" as="font">
        <!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->

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
    |          |                                                |                                               |                          |
    |          |                                                |                                               |                          |
    |          |                                                |                                               |                          |
    |          |                                                |                                               |       main            |           asaid нету
    |  nav   |     main                                    |                                               |                          |
    |          |                                                |                                               |                          |
    |          |                                                |                                               |                          |
    |          |                                                |                                               |                          |
    |          |                                                |                                               |_______________|
    |          |                                                |                                               | footer-mobile      |
-->



    <?php
    //HEADER
    if (isset($_SESSION['user'])) {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/header_authorized.php');
    } else {
        header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/index.php');
    }
    ?>

    <div id="middleContent" class="middle-content">
        <?php
        //NAV
        include_once($_SERVER['DOCUMENT_ROOT'] . "/components/nav/nav.php");

       
        //MAIN 
        include_once($_SERVER['DOCUMENT_ROOT'].'/components\myProfile__edit\myProfile__edit.php');

        //ASAID
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/aside/aside.php');

        ?>

    </div>


    <?php
    //FOOTER
    if (isset($_SESSION['user'])) {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/footer/mobile_footer_authorized.php');
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/footer/mobile_footer_not_authorized.php');
    }
    ?>


    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/script.js"></script>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profile__edit/profile__edit.js"></script>
    <div class="display_none">
        <!-- Favicon  -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/favicons/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/favicons/favicon-32x32.png">
        <link rel="manifest" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    </div>

</body>

</html>