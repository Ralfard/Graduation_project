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

if ($_POST["submit_enter"]) {
    $error = array();
    if (count($error)) { //                    объединяем массив ошибок в одну строку
        $_SESSION["message"] = "<p id='form-error>" . implode('<br>', $error) . "</p>";
    } else {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        $type= $_POS['type'];
        $description = $_POST['description'];


        $query = "INSERT INTO news (title, date, text, type, description) VALUES
        (
            '" . mysqli_real_escape_string($mysqli, $title) . "',
            '" . mysqli_real_escape_string($mysqli, $date) . "',
            '" . mysqli_real_escape_string($mysqli, $text) . "',
            '" . mysqli_real_escape_string($mysqli, $type) . "',
            '" . mysqli_real_escape_string($mysqli, $description) . "'
        )";
        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));

        $id = mysqli_insert_id($mysqli);

        if (empty($_POST['upload_image'])) {

            include("../action/news_image.php");
            unset($_POST['upload_image']); //unset — Удаляет переменную
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

    ?>
    <section class="main">
        <div class="container">
            <div class="row main__row">
                <h2 class="main__title">Добавление статьи</h2>
                <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/admin/news"><button class="btn">Назад</button></a>
            </div>
            <hr>
            <div class="row">
                <form enctype="multipart/form-data" class="form" method="POST" action="">
                    <div class="form__block">
                        <label class="form__label" for="">Заголовок</label>
                        <input required name="title" type="text" class="form__input">
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Дата публикации</label>
                        <input required name="date" type="date" class="form__input">
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Текст</label>
                        <textarea required name="text" class="form__input form__input_textarea"></textarea>
                    </div>
                    <div class="form__block">
                        <label class="form__label" for="">Текст Для выдачи</label>
                        <textarea required name="description" class="form__input form__input_textarea"></textarea>
                    </div>

                    <div class="form__block">
                        <label class="form__label" for="">Тип статьи</label>
                        <select class="form__select" required name="type" id="">
                            <option value='Новость' class="form__option">Новости</option>
                            <option value='Мероприятия' class="form__option">Мероприятия</option>
                            <option value='Конкурсы' class="form__option">Конкурсы</option>
                        </select>
                    </div>

                    <div class="form__block">
                        <label for="" class="form__label">Изображение</label>
                        <div id="baseimg-upload">
                            <input type="hidden" class="form__input" name="MAX_FILE_SIZE" value="5000000">
                            <input type="file" class="form__input" name="upload_image">
                        </div>
                    </div>

                    <div class="form__block">
                        <input name="submit_enter" type="submit" class="btn" value="Создать">
                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>