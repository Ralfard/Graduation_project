<?php
session_start();
if (!$mysqli) {
    include_once('../dataBase/db_connect.php');
}

if ($_POST['name_reg'] && $_POST['email_reg'] && $_POST['password_reg']) { //Регистационный блок
    $error = array();

    if (count($error)) {
        $_SESSION['message'] =  implode('<br/>', $error);
    } else {
        $name = sanitizeData($_POST['name_reg']);
        $mail = sanitizeData($_POST['email_reg']);
        $pass = sanitizeData($_POST['password_reg']);
        $date = date("Y-m-d");

        if (checkUserMail($mail, $mysqli) === false) { //проверка почты на совпадения
            echo "Пользователь с такой почтой уже зарегистрирован";
            exit;
        }

        $query = "INSERT INTO `users` (`name`, `mail`, `pass`, `date_registration`) VALUES
        (
            '" . mysqli_real_escape_string($mysqli, $name) /*экранируем символы для безопасности*/ . "',
            '" . mysqli_real_escape_string($mysqli, $mail) . "',
            '" . mysqli_real_escape_string($mysqli, $pass) . "',
            '" . mysqli_real_escape_string($mysqli, $date) . /*у последнего значения не должно быть запятой в конце*/ "'
        )";

        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));

        if ($result === true) {
            $_SESSION['user'] = [
                'id' => mysqli_insert_id($mysqli),
                'name' => $name,
                'mail' => $mail,
                'icon' => "https://placehold.co/40x40/34691E/dddddd?text=" . strtoupper($name[0])
            ];

            $sql = "INSERT INTO `users__bookmarks` (`user_id`, `bookmarks`) VALUES
            (
                '" . mysqli_real_escape_string($mysqli, $_SESSION['user']['id']) . "',
                '" . mysqli_real_escape_string($mysqli, '') .  "'
            )";
            $result = mysqli_query($mysqli, $sql) or die("Ошибка " . mysqli_error($mysqli));
        }


        // header("Location: /pages/account/myProfile.php?=" . mysqli_insert_id($mysqli)); // перемещает пользователя на другую страницу после регистрации
    }
} else {
    $error_msg = 'Введен не корректный логин или пароль';
}

function checkUserMail($mail, $mysqli)
{
    $request = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `mail`='$mail'");
    if (mysqli_num_rows($request) > 0) return false;
}

function sanitizeData($data)
{
    $data = strip_tags($data);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}
