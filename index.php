<?php
session_start();
include_once('PHP_logic/dataBase/db_connect.php'); //база данных
// include_once("PHP_logic/autorization/autorization.php"); //файл с php скриптами

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>
<!DOCTYPE html><!-- стоит тут потому что иначе включится режим совместимости -->
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Иконки -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Шрифт -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Стили общая часть начало -->
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/reset.css">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/header/header.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/header/autorizationModalWindow/autorizationModalWindow.css">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/nav/nav.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/main/main.css">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/footer/mobile-footer.css">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/style.css">
    <!-- Стили общая часть конец -->

    <title>ТуТ был Я</title>


</head>

<body id="body">


    <!--                                                                                                            nav
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
        include_once('components/main/main.php');

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


    <script src="js/script.js"></script>
    <div style="display: none;">
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