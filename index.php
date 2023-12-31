<?php
session_start();
include_once('PHP_logic/dataBase/db_connect.php'); //база данных
// include_once("PHP_logic/autorization/autorization.php"); //файл с php скриптами
header('Location: pages/popular.php');
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: {$_SERVER['HTTP_REFERER']}");
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
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |                          |
    |          |                               |                |                                               |                                                                                                                                    main            |           asaid нету
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
        include_once('components/header/header_authorized.php');
    } else {
        include_once('components/header/header_not_authorized.php');
    }
    ?>


    <div id="middleContent" class="middle-content">


        <?php
        //NAV
        include_once("components/nav/nav.php");

        //MAIN 
        // include_once('components/main/main.php');

        //ASAID
        include_once('components/aside/aside.php');

        ?>

    </div>


    <?php
    //FOOTER
    if (isset($_SESSION['user'])) {
        include_once("components/footer/mobile_footer_authorized.php");
    } else {
        include_once("components/footer/mobile_footer_not_authorized.php");
    }
    ?>


    <script src="/js/script.js"></script>
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