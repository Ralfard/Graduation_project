<?php

if ($_FILES['galleryimg']['name'][0]) {

    for ($i = 0; $i < count($_FILES['galleryimg']['name']); $i++) {

        $error_gallery = "";


        if ($_FILES['galleryimg']['name'][$i]) {

            $galleryimgType = $_FILES['galleryimg']['type'][$i]; // тип файла
            $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений

            // расширение картинки                    
            $imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['galleryimg']['name'][$i]));
            //папка для загрузки
            $uploaddir = '../uploads_images/';
            //новое сгенерированное имя файла
            $newfilename = $_POST["id"] . '-' . $id . rand(10, 30000) . '.' . $imgext;
            //путь к файлу (папка.файл)
            $uploadfile = $uploaddir . $newfilename;



            if (!in_array($galleryimgType, $types)) {
                $error_gallery = "<p id='form-error'>Допустимые расширения - .gif, .jpg, .png</p>";
                $_SESSION['answer'] = $error_gallery;
                continue;
            }

            if (empty($error_gallery)) {

                if (@move_uploaded_file($_FILES['galleryimg']['tmp_name'][$i], $uploadfile)) {

                    mysqli_query($link, "INSERT INTO gallary_project(project_id, image)
						VALUES(						                        
                            '" . $id . "',
							'" . mysqli_real_escape_string($link, $newfilename) . "'
						)");
                } else {
                    $_SESSION['answer'] = "Ошибка загрузки файла.";
                }
            }
        }
    }
}
