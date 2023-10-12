<?php

if ($_FILES['input_img']['name'][0]) {
    for ($i = 0; $i < count($_FILES['input_img']['name']); $i++) {
 
        $error_gallery = "";

        if ($_FILES['upload_image']['error'] > 0) {
            //в зависимости от номера ошибки выводим соответствующее сообщение
            switch ($_FILES['upload_image']['error']) {
                case 1:
                    $error_img[] =  'Размер файла превышает допустимое значение UPLOAD_MAX_FILE_SIZE';
                    break;
                case 2:
                    $error_img[] =  'Размер файла превышает допустимое значение MAX_FILE_SIZE';
                    break;
                case 3:
                    $error_img[] =  'Не удалось загрузить часть файла';
                    break;
                case 4:
                    $error_img[] =  'Файл не был загружен';
                    break;
                case 6:
                    $error_img[] =  'Отсутствует временная папка.';
                    break;
                case 7:
                    $error_img[] =  'Не удалось записать файл на диск.';
                    break;
                case 8:
                    $error_img[] =  'PHP-расширение остановило загрузку файла.';
                    break;
            }
        } else {
  
            if ($_FILES['input_img']['name'][$i]) {

                $input_imgType = $_FILES['input_img']['type'][$i]; // тип файла
                $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений

                // расширение картинки                    
                $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['input_img']['name'][$i]));
                //папка для загрузки
                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/images/uploadImages/';
                //новое сгенерированное имя файла
                $newfilename = $id . '-' . $id . rand(10, 30000) . '.' . $imgext;
                //путь к файлу (папка.файл)
                $uploadfile = $uploaddir . $newfilename;
                
                array_push($imagesArr, $newfilename);

                if (!in_array($input_imgType, $types)) {
                    $_SESSION['msg'] .= "Допустимые расширения - .gif, .jpg, .png";
                    // $_SESSION['msg'] = $error_gallery;
                    continue;
                }
                $_SESSION['msg'] .= '$uploadfile=' . $uploadfile . ', $newfilename=' . $newfilename . ', $uploaddir=' . $uploaddir . ', $_FILES=' . $_FILES['input_img']['tmp_name'][$i];
                if (empty($error_gallery)) {
                    if (move_uploaded_file($_FILES['input_img']['tmp_name'][$i], $uploadfile)) {

                        mysqli_query($mysqli, "INSERT INTO `articleImages` (`article_id`, `img_name`)
						VALUES(						                        
                            '" . $id . "',
							'" . mysqli_real_escape_string($mysqli, $newfilename) . "'
                            )");
                    } else {
                        $_SESSION['msg'] .= "Ошибка загрузки файла.";
                    }
                }
            }
        }
    }
}
$_SESSION['msg'] .= $error_img;
