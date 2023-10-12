<?php
session_start();
if (!$mysqli)
    include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php');


    
if ($_POST['save']) {
    extract($_POST, EXTR_PREFIX_ALL, "fromPOST_");

    $sql = "UPDATE `users` SET `name`= '$fromPOST__userName', `description`= '$fromPOST__description' WHERE id=" . $_SESSION['user']['id'];
    $request = $mysqli->query($sql) or die("Ошибка " . mysqli_error($mysqli));

    if (!mysqli_error($mysqli)) {
        $_SESSION['user']['name'] = $fromPOST__userName;
        $_SESSION['user']['description'] = $fromPOST__description;
    }
    if ($_FILES["userAvatar"]["name"] !== '' ||  $_FILES["userWallpaper"]["name"] !== '') {
        include_once($_SERVER['DOCUMENT_ROOT'] .'/PHP_logic\upload_img.php');
    }



    header('Location: /pages/account/myProfile.php');
}
