<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/administan\php\db_connect.php');
if ($_POST['data']) {
    $data = json_decode($_POST['data'], true);
    $sql = "UPDATE `admins__rights` SET `" . $data['typeRights'] . "`='" . $data['toggle'] . "' WHERE `id`='" . $data['id'] . "'";
    $request = $mysqli->query($sql) or die("Ошибка " . mysqli_error($mysqli));
} else {
    echo error_log('data не существует');
} 
