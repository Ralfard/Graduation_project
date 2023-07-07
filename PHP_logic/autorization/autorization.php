<?php
session_start();
if(!$mysqli){
    include_once('../dataBase/db_connect.php');
}

if ($_POST['email_aut'] && $_POST['password_aut']) { //Авторизационный блок
    $error = array();


    if (count($error)) {
        $_SESSION['message'] = implode('<br/>', $error);
    } else {

        $mail = sanitizeData($_POST['email_aut']);
        $pass = sanitizeData($_POST['password_aut']);

        $request = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `mail`='$mail' AND `pass`='$pass'");
        if (mysqli_num_rows($request) > 0) {
            $user = mysqli_fetch_assoc($request);

            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'mail' => $user['mail'],
                'pass' => $user['pass'],
                'icon' => $user['icon'] ? $user['icon'] : "https://placehold.co/40x40/34691E/dddddd?text=" . strtoupper($user['name'][0])
            ];
            echo true;
        } else {
            echo 'Не правильный логин или пароль';
        }
    }
}else{
    echo 'Заполнены не все поля';
}

function sanitizeData($data) {
    $data=strip_tags($data);
    $data=htmlentities($data);
    $data=stripslashes($data);
    return $data;
}
