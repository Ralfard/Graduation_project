<?php
if (!$mysqli) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php');
}
$uploadFiles = $_FILES;

foreach ($uploadFiles as $key => $value) {
    if ($value['name'] !== "") {
        if ($key === "userAvatar") {
            $value['directory'] = '/avatars/';
            $value['table'] = 'users';
            $value['column'] = 'icon';
            uploadImg($value, $mysqli);
        } elseif ($key === "userWallpaper") {
            $value['directory'] = '/profileWallpaper/';
            $value['table'] = 'users__wallpaper';
            $value['column'] = 'imgName';
            uploadImg($value,  $mysqli);
        }
    }
}

function uploadImg($img,  $DB)
{
    if (checkErrors($img)) {
        return $_SESSION['error'] .= checkErrors($img);
    }

    $extractType = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $img['name']));
    $currentDate = date('d-m-y');
    $newFileName = $_SESSION['user']['id'] . '-' . $currentDate . rand(10, 30000) . '.' . $extractType;
    $fullPath =  '/images' . $img['directory'] . $newFileName;


    if (move_uploaded_file($img['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $fullPath)) {
        $sql = "SELECT " . $img['column'] . " FROM " . $img['table'] . " WHERE id=" . $_SESSION['user']['id'];
        $request = $DB->query($sql) or die("Ошибка " . mysqli_error($DB));;
        $data = $request->fetch_assoc();

        if ($data) {
            if ($img['directory'] === '/avatars/') {
                $sql = "UPDATE `users` SET `icon`='$fullPath' WHERE `id`=" . $_SESSION['user']['id'];
                $request = $DB->query($sql) or die("Ошибка " . mysqli_error($DB));
                $_SESSION['user']['icon'] = $fullPath;
            } elseif ($img['directory'] === '/profileWallpaper/') {
                $sql = "UPDATE " . $img['column'] . " SET `imgName`='$newFileName' WHERE `id`=" . $_SESSION['user']['id'];
                $request = $DB->query($sql) or die("Ошибка " . mysqli_error($DB));
            }
        } elseif (!isset($data)) {
            if ($img['directory'] === '/avatars/') {
                $sql = "INSERT INTO " . $img['table'] . " ( id," .  $img['column'] . ") VALUES ('" . $_SESSION['user']['id'] . " $fullPath')";
                $request = $DB->query($sql) or die("Ошибка " . mysqli_error($DB));
                $_SESSION['user']['icon'] = $fullPath;
            } elseif ($img['directory'] === '/profileWallpaper/') {
                $sql = "INSERT INTO " . $img['table'] . " ( id," .  $img['column'] . ") VALUES ('" . $_SESSION['user']['id'] . "',' $fullPath')";
                $request = $DB->query($sql) or die("Ошибка " . mysqli_error($DB));
            }
        }
    } else $_SESSION['error'] .= "Ошибка загрузки файла";
}


function checkErrors($img)
{
    $imgType = $img['type'];
    $allowedTypes = ["image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"]; // массив допустимых расширений
    if ($img['error'] > 0) {
        //в зависимости от номера ошибки выводим соответствующее сообщение
        switch ($img['error']) {
            case 1:
                return  'Размер файла превышает допустимое значение UPLOAD_MAX_FILE_SIZE';
                break;
            case 2:
                return  'Размер файла превышает допустимое значение MAX_FILE_SIZE';
                break;
            case 3:
                return  'Не удалось загрузить часть файла';
                break;
            case 4:
                return  'Файл не был загружен';
                break;
            case 6:
                return  'Отсутствует временная папка.';
                break;
            case 7:
                return  'Не удалось записать файл на диск.';
                break;
            case 8:
                return  'PHP-расширение остановило загрузку файла.';
                break;
        }
    } else if (!in_array($imgType, $allowedTypes)) {
        return "Допустимые расширения - .gif, .jpg, .png";
    }
    return false;
}
