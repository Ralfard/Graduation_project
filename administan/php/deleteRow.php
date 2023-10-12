<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/administan\php\db_connect.php');

if ($_POST['data']) {
    $data = json_decode($_POST['data'], true);
    $sql = "DELETE FROM `" . $data['table'] . "` WHERE `id`= " . $data['id'] . "";
    $query=$mysqli->query($sql);
} else {
    echo "Нет данных";
}
