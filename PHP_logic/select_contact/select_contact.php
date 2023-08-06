<?php
require_once($_SERVER['DOCUMENT_ROOT']."/PHP_logic\dataBase\db_connect.php");
if ($_POST['id']) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `users` WHERE `id`=$id";
    $request = mysqli_query($mysqli, $sql);
    
    echo $request;
}
