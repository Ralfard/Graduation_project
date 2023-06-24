<?php
session_start();
include_once('include/db_connect.php');
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if(isset($_SESSION['user']['icon'])){
    echo $_SESSION['user']['icon'];
}
else{
    echo 2;
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
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/grid.css">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/header.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/autorization.css">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/nav.css">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/mobile-footer.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/common_styles.css">
    <!-- Стили общая часть конец -->

    <title>Document</title>

</head>

<body id="body">
    <?php
    if (isset($_SESSION['user'])) {
        include_once('include/header_authorized.php');
    } else {
        include_once('include/header_not_authorized.php');
    }
    ?>
    <main class="main">
        <?php
        include_once("include/nav.php");
        include_once("include/popular.php");
        ?>
    </main>

    <?php
    if (isset($_SESSION['user'])) {
        include_once("include/mobile_footer_authorized.php");
    } else {
        include_once("include/mobile_footer_not_authorized.php");
    }
    ?>


    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/main_js.js"></script>
</body>

</html>