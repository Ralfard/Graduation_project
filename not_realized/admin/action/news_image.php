<?php
// session_start();
// if ($_SESSION['auth_admin'] == "yes_auth") {
//     define("sunwa-efimov-.r.a", true);
//     if (isset($_GET['logout'])) { //Если в адресной строке задан logout 
//         unset($_SESSION['auth_admin']); //удаляем сессию
//         header('Location: index.php'); // и преводим пользователя к полю авторизации
//     }
// }
include($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic\dataBase\db_connect.php");

//подключаемся к БД
$link=mysqli_connect($db_host, $db_login, $db_pass, $db_database) or die("Ошибка ".mysqli_error($link));
// $error_img = array();

if($_FILES['input_img']['error'] > 0){
    switch($_FILES['input_img']['error']){
        case 1: $error_img[] =  'Размер файла превышает допустимое значение UPLOAD_MAX_FILE_SIZE'; break;
        case 2: $error_img[] =  'Размер файла превышает допустимое значение MAX_FILE_SIZE'; break;
        case 3: $error_img[] =  'Не удалось загрузить часть файла'; break;
        case 4: $error_img[] =  'Файл не был загружен'; break;
        case 6: $error_img[] =  'Отсутствует временная папка.'; break;
        case 7: $error_img[] =  'Не удалось записать файл на диск.'; break;
        case 8: $error_img[] =  'PHP-расширение остановило загрузку файла.'; break;
    }
}
else {
    //проверяем расширения
    if($_FILES['input_img']['type'] == 'image/jpeg' || $_FILES['input_img']['type'] == 'image/jpg' || $_FILES['input_img']['type'] == 'image/png'){

        $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['input_img']['name']));

        //папка для загрузки
        $uploaddir = $_SERVER['DOCUMENT_ROOT']."/images\uploadImages";
        //новое сгенерированное имя файла
        $newfilename = $_POST["id"].''.$id.rand(10,30000).'.'.$imgext;
        //путь к файлу (папка.файл)
        $uploadfile = $uploaddir.$newfilename;
        //загружаем файл move_uploaded_file

        if (move_uploaded_file($_FILES['input_img']['tmp_name'], $uploadfile)){
            $update=mysqli_query($link, "UPDATE news SET image='$newfilename' WHERE id='$id'");
        }
        else{
            $error_img[]="Ошибка загрузки файла.";
        }
    }
    else{
        
        $error_img[] =  'Допустимые расширения: jpeg, jpg, png';
    }    
}


