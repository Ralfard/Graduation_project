<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic\dataBase\db_connect.php");


if ($_POST['message']) {
    $message = $_POST['message'];
    $message = json_decode($message);

    $myID = $_SESSION['user']['id'];
    $interlocutorID = sanitizeData($message->interlocutorID);
    $text = sanitizeData($message->text);
    $dateTime = date_format(date_create(), "H:i d.m.Y");

    $sql = "INSERT INTO `messages`(`user1`, `user2`, `text`, `date_time`) VALUES 
    (
        '" . mysqli_real_escape_string($mysqli, $myID) /*экранируем символы для безопасности*/ . "',
        '" . mysqli_real_escape_string($mysqli, $interlocutorID) . "',
        '" . mysqli_real_escape_string($mysqli, $text) . "',
        '" . mysqli_real_escape_string($mysqli, $dateTime) . /*у последнего значения не должно быть запятой в конце*/ "'
    )";
    $request = $mysqli->query($sql) or die("Ошибка " . mysqli_error($mysqli));
    require_once($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic/showMesseges.php");
    showMesseges($myID, $interlocutorID, $mysqli);
}



function sanitizeData($data)
{
    $data = strip_tags($data);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}
