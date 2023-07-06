<?php
session_start();
if(!$mysqli){
    include_once('../../components/dataBase/db_connect.php');
}
if ($_POST['email_aut'] && $_POST['password_aut']) { //Авторизационный блок
    $error = array();

    // echo "<script>console.log(".$_POST['email_aut'].")</script>";

    if (count($error)) {
        $_SESSION['message'] = implode('<br/>', $error);
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
                'icon' => $user['icon'] ? $user['icon'] : "https://placehold.co/40x40/34691E/dddddd?text=" . strtoupper($user['name'][0])
            ];
            echo true;
        } else {
            $_SESSION['message'] = 'Не правильный логин или пароль';
            echo $_SESSION['message'];
        }
    }
}
