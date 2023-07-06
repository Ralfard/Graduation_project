<?php
session_start();
if (!$mysqli) {
    include_once('../../components/dataBase/db_connect.php');
}

if ($_POST['submit_reg']) { //Регистационный блок
    $error = array();

    if (count($error)) {
        $_SESSION['message'] =  implode('<br/>', $error);
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
