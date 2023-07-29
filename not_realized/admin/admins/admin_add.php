<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define("sunwa-efimov-.r.a", true);
    if (isset($_GET['logout'])) { //Если в адресной строке задан logout 
        unset($_SESSION['auth_admin']); //удаляем сессию
        header('Location: index.php'); // и преводим пользователя к полю авторизации
    }
}
include("../../include/db_connect.php");

if ($_POST["submit_enter"]) {
    $error = array();
    if (count($error)) { //                    объединяем массив ошибок в одну строку
        $_SESSION["message"] = "<p id='form-error>" . implode('<br>', $error) . "</p>";
    } else {
        $login=$_POST['login'];
        $pass=$_POST['pass'];
        $name=$_POST['name'];

        $pass = md5($pass); // шифруем пароль что бы сопоставить его с зашифрованым паролем в БД
        $pass = strrev($pass); //Переварачиваем строку задом на перед
        $pass = strtolower("wjkic" . $pass . "xhiex"); //Уменьшаем регистр и добавляем случайные символы

        $query="INSERT INTO admins (login, password, name) VALUES
        (
            '".mysqli_real_escape_string($mysqli, $login)."',
            '".mysqli_real_escape_string($mysqli, $pass)."',
            '".mysqli_real_escape_string($mysqli, $name)."'
        )";
        $result= mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));
    }
}
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
    $error;
    ?>
    <section class="main">
        <div class="container">
            <div class="row main__row">
                <h2 class="main__title">Добавление администратора</h2>
                <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/admin/admins"><button class="btn">Назад</button></a>
            </div>
            <hr>
            <div class="row">
                <form class="form" method="post" action="">
                    <div class="form__block">
                        <label class="form__label" for="">Логин</label>
                        <input name="login" type="text" class="form__input">
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Пароль</label>
                        <input name="pass" type="password" class="form__input">
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Имя</label>
                        <input name="name" type="text" class="form__input">
                    </div>
                    <div class="form__block">
                        <input name="submit_enter" type="submit" class="btn" value="Добавить">
                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>