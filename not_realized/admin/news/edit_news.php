<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth") {
    define("sunwa-efimov-.r.a", true);
    if (isset($_GET['logout'])) { //Если в адресной строке задан logout 
        unset($_SESSION['auth_admin']); //удаляем сессию
        header('Location: index.php'); // и преводим пользователя к полю авторизации
    }
}
include("../../include/db_connect.php");

$id=$_GET['id'];

$action = $_GET['action'];
if (isset($action)) {
    switch ($action) {
        case 'delete':
            if (file_exists("../../upload_image/" . $_GET["image"])) {
                //unlink("../uploads_images/".$resPost["image"]); //удаляет изображение у меня на работет, скорее всего не позволяте защита
                $query = "UPDATE news SET image = NULL WHERE id='$id'";
                $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));
            }
            break;
    }
}


if ($_POST["submit_enter"]) {
    $error = array();
    if (count($error)) { //                    объединяем массив ошибок в одну строку
        $_SESSION["message"] = "<p id='form-error>" . implode('<br>', $error) . "</p>";
    } else {
        $title = $_POST['title'];
        $date=$_POST['date'];
        $text = $_POST['text'];
        $type = $_POST['type'];
        $description = $_POST['description'];


        $query = "UPDATE news SET 
        title='".mysqli_real_escape_string($mysqli, $title)."',
        date='".mysqli_real_escape_string($mysqli, $date)."',
        text='".mysqli_real_escape_string($mysqli, $text)."',
        type='".mysqli_real_escape_string($mysqli, $type)."',
        description='".mysqli_real_escape_string($mysqli, $description)."'
        WHERE id ='$id'";

        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));


        if (empty($_POST['upload_image'])) {
            include("../action/news_image.php");
            unset($_POST['upload_image']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><!-- шрифты -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- иконки-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../styles/reset.css">
    <link rel="stylesheet" href="../../styles/grid.css">
    <link rel="stylesheet" href="../styles/common_styles.css">
    <link rel="stylesheet" href="../styles/admins.css">
</head>

<body>
    <?php
    include_once("../include/header.php");
    $error;

    $sql="SELECT * FROM news WHERE id='$id'";
    $request=$mysqli->query($sql);

    if($request->num_rows===1){
        $response=$request->fetch_assoc();
        if($response['type']==="Новости")$type1="selected";
        elseif($response['type']==="Мероприятия")$type2="selected";
        elseif($response['type']==="Конкурсы")$type3="selected";
    ?>
    <section class="main">
        <div class="container">
            <div class="row main__row">
                <h2 class="main__title">Изменить статью</h2>
                <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/admin/news"><button class="btn">Назад</button></a>
            </div>
            <hr>
            <div class="row">
                <form class="form" method="post" enctype="multipart/form-data" action="">
                    <div class="form__block">
                        <label class="form__label" for="">Заголовок</label>
                        <input name="title" type="text" required class="form__input" value="<?= $response['title'] ?>">
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Дата публикации</label>
                        <input name="date" type="date" required class="form__input" value="<?= $response['date'] ?>">
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Текст</label>
                        <textarea name="text" required class="form__input form__input_textarea"><?= $response['text'] ?></textarea>
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Текст Для выдачи</label>
                        <textarea name="description" required class="form__input form__input_textarea"><?= $response['description'] ?></textarea>
                    </div>

                    <div class="form__block">
                        <label class="form__label" for="">Тип статьи</label>
                        <select class="form__select" required name="type" id="">
                            <option <?=$type1?> value='Новость' class="form__option">Новости</option>
                            <option <?=$type2?> value='Мероприятия' class="form__option">Мероприятия</option>
                            <option <?=$type3?> value='Конкурсы' class="form__option">Конкурсы</option>
                        </select>
                    </div>

                    <?php
                        if ((strlen($response["image"]) > 0) && (file_exists("../../upload_image/" . $response["image"]))) {
                            $img_pathh = '../../upload_image/' . $response["image"];
                            echo '
                            <label class="form-label" >Картинка</label><br><br>
                            <div id="baseimg">
                            <img style="width:300px" src="' . $img_pathh . '" /> <br><br>
                            <a class="btn" href="edit_news.php?id=' . $response["id"] . '&image=' . $response["image"] . '&action=delete" >Удалить</a><br>
                            <br>
                            </div>    ';
                        } else {
                            echo '
                            <label class="form__label" >Картинка</label>
                            <div id="baseimg-upload">
                            <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                            <input class="form-control" type="file" name="upload_image" />
                            </div> <br>
                            ';
                        }
                    ?>
                
                    <div class="form__block">
                        <input name="submit_enter" type="submit" class="btn" value="Изменить">
                    </div>
                </form>
            </div>
        </div>

    </section>
</body>
        <?php
    }
        ?>
</html>