<?php
defined("sunwa-efimov-.r.a") or die ("Переход через адресную строку запрещен!");

$db_host="127.0.0.1";//Адрес
$db_login="root";//логин
$db_pass="";//пароль
$db_database="sunwa";//название базы данных


$mysqli=new mysqli($db_host, $db_login, $db_pass, $db_database);// переменная содержит функцию с передаваемыми параметрами

if($mysqli->connect_error){
    printf("Не удалось соединиться: %s\n", $mysqli->connect_error);// в случае неудачного подключения выводим ошибку
    exit();
}
?>