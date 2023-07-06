<?php
session_start();
include_once('components/dataBase/db_connect.php');//база данных
include_once("PHP_logic/autorization/autorization.php");//файл с php скриптами

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

    <title>Document</title>

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
</body>

</html>