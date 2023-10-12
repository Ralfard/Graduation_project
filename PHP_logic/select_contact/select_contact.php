<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic\dataBase\db_connect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic/functions.php");
$myID = $_SESSION['id'];
if ($_POST['id']) {
    $interlocutorID = $_POST['id'];

    $request = $mysqli->query($sql);
    

    echo $request;
}
