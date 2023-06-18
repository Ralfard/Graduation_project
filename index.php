<?php
    session_start();
    include_once('include/db_connect.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- иконки-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/reset.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/grid.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/common_styles.css">

    <title>Document</title>

</head>

<body id="body">
    <?php
    include_once('include/header_not_authorized.php');

    ?>
    <main class="main">
        <?php
        include_once("include/nav.php");
        include_once("include/popular.php");
        ?>
    </main>

<?php
    // include_once("include/mobile_footer_authorized.php");
    include_once("include/mobile_footer_not_authorized.php");
?>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/main_js.js"></script>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/autorization.js"></script>


</body>

</html>