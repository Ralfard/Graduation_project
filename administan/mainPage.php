<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php');

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Иконки -->
    <link rel="stylesheet preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="font"><!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->
    <link rel="stylesheet preload" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" as="font"><!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->

    <link rel="stylesheet preload" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" as="font"><!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/reset.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/style.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/administan/css/common_styles.css">

    <title>ТуТ был Я - Панель администратора</title>
</head>

<body id="body" class="admin-panel">
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/administan/components/header/header.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/administan/components/nav/nav.php');
    ?>

    <main id="changeableArea" class="admin-panel__main">

    </main>

    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/administan\js\script.js"></script>
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