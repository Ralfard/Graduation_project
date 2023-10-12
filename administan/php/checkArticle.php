<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/administan\php\db_connect.php');

if ($_POST['data']) {
    $data = json_decode($_POST['data'], true);
    if ($data['action'] === 'approve') {
        $status = 1;
    } elseif ($data['action'] === 'reject') {
        $status = 2;
    } else {
        echo "Ошибка в отправленном имени";
    }
    $sql = "UPDATE  `articles`  SET  `moderated`=$status  WHERE `id`='" . $data['id'] . "'";
    $request = $mysqli->query($sql) or die("Ошибка " . mysqli_error($mysqli));
} else {
    echo 'data не существует';
}
