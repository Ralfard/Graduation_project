<?php
if ($_POST['submit_reg']) { //Регистационный блок
    $error = array();

    if (count($error)) {
        $_SESSION['message'] =  implode('<br/>', $error) ;
    } else {
        $name = $_POST['name_reg'];
        $mail = $_POST['email_reg'];
        $pass = $_POST['password_reg'];

        $query = "INSERT INTO `users` (`name`, `mail`, `pass`) VALUES
        (
            '" . mysqli_real_escape_string($mysqli, $name) /*экранируем символы для безопасности*/ . "',
            '" . mysqli_real_escape_string($mysqli, $mail) . "',
            '" . mysqli_real_escape_string($mysqli, $pass) . /*у последнего значения не должно быть запятой в конце*/ "'
        )";

        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));

        header('Location: index.php'); // перемещает пользователя на другую страницу после регистрации

    }
} else {
    $error_msg = 'Не правильный логин или пароль';
}


if ($_POST['submit_aut']) { //Авторизационный блок
    $error = array();

    if (count($error)) {
        $_SESSION['message'] = implode('<br/>', $error) ;
    } else {

        $mail = $_POST['email_aut'];
        $pass = $_POST['password_aut'];

        $request = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `mail`='$mail' AND `pass`='$pass'");
        if (mysqli_num_rows($request) > 0) {
            $user = mysqli_fetch_assoc($request);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'mail' => $user['mail'],
                'pass' => $user['pass'],
                'icon' => $user['icon']
            ];
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            $_SESSION['message'] = 'Не правильный логин или пароль';
        }
    }
} else {
    $error_msg = 'Не правильный логин или пароль';
}

?>

<div id="modalWindow" class="log-in">
    <div class="log-in__mobile-block">
        <span id="closeModalWindow" class="material-icons">
            close
        </span>
        <div class="registration__mobile">
            <div class="logo-wrapper__mobile-block">
                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/mainLogo.svg" alt="">
            </div>

            <form id="registrationFormMobile" style="display: block;" method="POST" class="registration__form-mobile" action="">
                <h2 class="log-in__title">Регистрация</h2>
                <input class="log-in__input" name="name_reg" type="text" placeholder="Имя">
                <input class="log-in__input" name="email_reg" type="email" placeholder="Почта">
                <input class="log-in__input" name="password_reg" type="password" placeholder="Пароль">
                <input class="log-in__submit" name="submit_reg" type="submit" value="Зарегистрировать">
                <p class="log-in__text">Есть аккаунт? <span class="log-in__change-form">Войти</span></p>
            </form>

            <form id="authorizationFormMobile" style="display: none;" method="POST" class="authorization__form-mobile" action="">
                <h2 class="log-in__title">Вход в аккаунт</h2>
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <p class="log-in__text"><?=$_SESSION['message']?></p>
                <?php
                }
                unset($_SESSION['message']);
                ?>
                
                <input class="log-in__input" name="email_aut" type="email" placeholder="Почта">
                <input class="log-in__input" name="password_aut" type="password" placeholder="Пароль">
                <input class="log-in__submit" name="submit_aut" type="submit" value="Войти">
                <p class="log-in__text">Нет аккаунта? <span class="log-in__change-form">Регистрация</span></p>
            </form>

        </div>

    </div>
</div>


<script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/autorization.js"></script>



<!--<div class="log-in__desctop-block">
        <div class="">

        </div>
        <div class="">
            <form action="" method="post">

            </form>
        </div>
    </div>
 -->