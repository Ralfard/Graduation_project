<?php
    // defined('olson') or die('Доступ запрещен!');//  запрещает переход по пути через адресную строку


    $db_host="127.0.0.1";//Адрес
    $db_user="root"; // логин
    $db_password=""; // пароль
    $db_database="tut_byl_ya"; //название базы данных

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_database); // инициируем вход в базу данных
    if($mysqli -> connect_error){
        printf("Соединение не удалось: %s\n", $mysqli -> connect_error); //если не удалось подключиться 
        exit();
    }