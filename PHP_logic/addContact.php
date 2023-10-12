<?php
session_start();
if (!$mysqli)
    include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php');

if ($_SESSION['user']['id']) {
    if ($_POST['id']) {
        $myID = $_SESSION['user']['id'];
        $interlocutorID = $_POST['id'];
        echo addContact($myID, $interlocutorID, $mysqli);
    } else {
        echo "Возникла не предвиденная ошибка: переменная interlocutorID не существует";
    }
} else {
    echo 12;
}
 

function addContact($myID, $contactID, $DB)
{

    $sql = "SELECT `contacts` FROM `users` WHERE `id`=$myID";
    $request = $DB->query($sql);
    $response = $request->fetch_assoc();
    if ($response['contacts'] !== NULL) {
        $contactsArr = unserialize($response['contacts']);
        $searchID = in_array($contactID, $contactsArr);
        if ($searchID === false) {
            array_push($contactsArr, $contactID);
            $contactsArr = serialize($contactsArr);
            $sql = "UPDATE `users` SET `contacts`= '$contactsArr' WHERE `id`=$myID";
            $request = $DB->query($sql) or die(mysqli_error($DB));
        }
    } else {
        $contactsArr = array($contactID);
        $contactsArr = serialize($contactsArr);
        $sql = "UPDATE `users` SET `contacts`= '$contactsArr' WHERE `id`=$myID";
        $request = $DB->query($sql) or die(mysqli_error($DB));
        // $sql = "UPDATE `users` SET `contacts`= '$contactsArr' WHERE `id`=$contactID";
        // $request = $DB->query($sql) or die(mysqli_error($DB));
    }

    $sql = "SELECT `contacts` FROM `users` WHERE `id`=$contactID";
    $request = $DB->query($sql);
    $response = $request->fetch_assoc();
    if ($response['contacts'] !== NULL) {
        $contactsArr = unserialize($response['contacts']);
        $searchID = in_array($myID, $contactsArr);
        if ($searchID === false) {
            array_push($contactsArr, $myID);
            $contactsArr = serialize($contactsArr);
            $sql = "UPDATE `users` SET `contacts`= '$contactsArr' WHERE `id`=$contactID";
            $request = $DB->query($sql) or die(mysqli_error($DB));
        }
    } else {
        $contactsArr = array($myID);
        $contactsArr = serialize($contactsArr);
        $sql = "UPDATE `users` SET `contacts`= '$contactsArr' WHERE `id`=$contactID";
        $request = $DB->query($sql) or die(mysqli_error($DB));
    }
    //открываем окно чата
}
