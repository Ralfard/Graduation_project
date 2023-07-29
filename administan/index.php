<?php
session_start();
define("sunwa-efimov-.r.a", true);
include("../include/db_connect.php");

if ($_POST['submit_enter']) { //Если форма была отправлена (кнопка с именем submit_enter нажата)
    $login = $_POST['input_login'];
    $pass = $_POST['input_pass'];

    if ($login && $pass) { // Если есть логин и пароль
        $pass = md5($pass); // шифруем пароль что бы сопоставить его с зашифрованым паролем в БД
        $pass = strrev($pass); //Переварачиваем строку задом на перед
        $pass = strtolower("wjkic" . $pass . "xhiex"); //Уменьшаем регистр и добавляем случайные символы

        $query = "SELECT * FROM admins WHERE login='$login' AND password='$pass'";
        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['auth_admin'] = 'yes_auth';
            $_SESSION['auth_admin_login'] = $row['login'];

            header("Location: admins");
        } 
        else $msgError = "Не правильный логин или пароль! логин и пароль: asd или admin";
    } 
    else {
        $msgError = "Заполнены не все поля!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><!-- шрифты -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- иконки-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/grid.css">
    <link rel="stylesheet" href="styles/common_styles.css">
    <link rel="stylesheet" href="styles/sign_in.css">

</head>

<body>
    <?php
    include_once("include/header.php");
    ?>

    <div class="containder">
        <div class="row justify__content__center">
            <form class="form" method="post" action="">
                <div class="form__block">
                    <label class="form__label" for="">Логин</label>
                    <input name="input_login" type="text" class="form__input">
                </div>
                <div class="form__block">
                    <label class="form__label" for="">Пароль</label>
                    <input name="input_pass" type="password" class="form__input">
                </div>
                <div class="form__block">
                    <input name="submit_enter" type="submit" class="btn" value="Войти">
                </div>
                <?php
                if ($msgError) {
                    echo '<p style="color:red;">' . $msgError . '</p>';
                }
                ?>
            </form>
        </div>
    </div>

</body>

</html>