<?php
session_start();
if ($_SESSION['auth_admin'] == 'yes_auth') {
    define("sunwa-efimov-.r.a", true); //запрещает переход по ссылкам через путь в адресной строке
    if (isset($_GET['logout'])) {
        unset($_SESSION['auth_admin']);
        header('Location: index.php');
    }
}
include("../../include/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><!-- шрифты -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- иконки-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../styles/reset.css">
    <link rel="stylesheet" href="../../styles/grid.css">
    <link rel="stylesheet" href="../styles/common_styles.css">
    <link rel="stylesheet" href="../styles/admins.css">
</head>

<body>
    <?php
    include_once("../include/header.php");
    ?>

    <main class="">
        <div class="row">
            <?php
            include_once("../include/nav.php")
            ?>
            <div class="content">
                <div class="row content_row">
                    <h3 class="content__title">Новости</h3>
                    <a href="add_news.php"><button class="btn">Добавить</button></a>
                </div>
                <hr>
                <div class="row card__rows">
                    <?php
                    $sql = "SELECT * FROM news";
                    $request = $mysqli->query($sql);

                    for ($i = 0; $i != $request->num_rows; ++$i) {
                        $response = $request->fetch_assoc();
                    ?>
                        <div class="card">
                            <img class="card__img" src="../../upload_image/<?= $response['image'] ?>" alt="">
                            <p class="card__date"><?= $response['date'] ?></p>
                            <p class="card__title"><?= $response['title'] ?></p>
                            <ul>
                                <li class="card__item"><a href="edit_news.php?id=<?= $response['id'] ?>" class="card__link">Изменить</a></li>
                                <li class="card__item"><a href="delete_news.php?id=<?= $response['id'] ?>" class="card__link">Удалить</a></li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>


</body>

</html>