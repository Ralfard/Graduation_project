<?php
session_start();
// define("sunwa-efimov-.r.a", true);
include($_SERVER['DOCUMENT_ROOT'] . "/administan\php\db_connect.php");

if ($_POST['submit_enter']) { //Если форма была отправлена (кнопка с именем submit_enter нажата)
    $login = $_POST['input_login'];
    $pass = $_POST['input_pass'];

    if ($login && $pass) { // Если есть логин и пароль
        // $pass = md5($pass); // шифруем пароль что бы сопоставить его с зашифрованым паролем в БД
        // $pass = strrev($pass); //Переварачиваем строку задом на перед
        // $pass = strtolower("wjkic" . $pass . "xhiex"); //Уменьшаем регистр и добавляем случайные символы

        $sql = "SELECT * FROM `admins` WHERE login='$login' AND password='$pass'";
        $result = mysqli_query($mysqli, $sql) or die("Ошибка " . mysqli_error($mysqli));

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['adm'] = [
                "id" => $row['id'],
                'name' => $row['name'],
                'mail' => $row['mail']
            ];


            $sql = "SELECT * FROM `admins__rights` WHERE `id`=" . $row['id'] . "";
            $request = $mysqli->query($sql) or die("Ошибка " . mysqli_error($mysqli));
            $response = $request->fetch_assoc() or die("Ошибка " . mysqli_error($mysqli));
            $_SESSION['adm'] = [
                'managing_administrators' => $response['managing_administrators'],
                'artiles_moderation' => $response['artiles_moderation'],
                'managing_users' => $response['managing_users']
            ];

            header("Location: mainPage.php");
        } else $msgError = "Не правильный логин или пароль!";
    } else {
        $msgError = "Заполнены не все поля!";
    }
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>


    <!-- Иконки -->
    <link rel="stylesheet" href="/plugins/node_modules/material-icons/iconfont/material-icons.css">
    <link rel="stylesheet preload" href="/plugins/node_modules/roboto-fontface/css/roboto/roboto-fontface.css" as="font">
    <link rel="stylesheet preload" href="/plugins/node_modules/roboto-fontface/css/roboto-slab/roboto-slab-fontface.css" as="font">
    <link rel="stylesheet preload" href="/plugins/node_modules/roboto-fontface/css/roboto-condensed/roboto-condensed-fontface.css" as="font">
    <!-- Используют предзагрузку что бы шрифты и иконки не показывались пользователю -->

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles\reset.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/administan\css\common_styles.css">


</head>

<body id="body">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/administan/css/header.css">

    <header class="header">
        <div class="container">
            <div class="row justify__content__between align__items__center">
                <pre> </pre>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify__content__center">
            <form class="form" method="post" action="">
                <h1 class="form__title">Авторизация</h1>
                <div class="form__block">
                    <label class="form__label" for="">Логин</label>
                    <input name="input_login" type="text" class="form__input">
                </div>
                <div class="form__block">
                    <label class="form__label" for="">Пароль</label>
                    <input name="input_pass" type="password" class="form__input">
                </div>
                <div class="grid">

                    <input name="submit_enter" type="submit" class="btn" value="Войти">
                </div>

                <?php
                if ($msgError) {
                    echo '<p style="color:red; padding: 12px 0; text-align: center;">' . $msgError . '</p>';
                }
                ?>
            </form>
        </div>
    </div>

</body>

</html>