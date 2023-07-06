<?php
if ($_POST['submit_aut']) { //Авторизационный блок
    $error = array();

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
            header("Location: index.php");
            
        } else {
            $_SESSION['message'] = 'Не правильный логин или пароль';
        }
    }
} else {
    $error_msg = 'Не правильный логин или пароль';
}