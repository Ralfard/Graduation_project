<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic\dataBase\db_connect.php");
include($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic/functions.php");


$imagesArr = [];
if ($_POST["article_HTML"] && $_POST['topic']) {

    foreach ($_POST as $key => $val) sanitizeString($val);

    $error = array();
    if (count($error)) { //                    объединяем массив ошибок в одну строку
        $_SESSION["message"] = "<p id='form-error>" . implode('<br>', $error) . "</p>";
    } else {



        $length = strlen($_POST['article_HTML']);
        $authorID = $_SESSION['user']['id'];
        $title = getTitle($_POST['article_HTML']);
        $content = $_POST['article_HTML'];
        $topic = $_POST['topic'];
        $date = date("Y-m-d");
        $imgesNames = serialize($imagesArr);
        $description = getDescription($content);


        $query = "INSERT INTO articles (`author_id`, `title`, `content`, `topic`, `date` , `img_name`, `description`) VALUES
        (
            '" . mysqli_real_escape_string($mysqli, $authorID) . "',
            '" . mysqli_real_escape_string($mysqli, $title) . "',
            '" . mysqli_real_escape_string($mysqli, $content) . "',
            '" . mysqli_real_escape_string($mysqli, $topic) . "',
            '" . mysqli_real_escape_string($mysqli, $date) . "',
            '" . mysqli_real_escape_string($mysqli, $imgesNames) . "',
            '" . mysqli_real_escape_string($mysqli, $description) . "'
            )";

        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));
        $id = mysqli_insert_id($mysqli);
        if (empty($_POST['input_img[]'])) {
            include($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic\add-article\article-image.php');
            unset($_POST['input_img[]']); //unset;Удаляет переменную
        }
    }

    $_SESSION['msg'] .=  $_FILES['input_img[]'] . ", " . $_POST['input_img[]'];
}
header("Location:  /pages/account/myProfile.php");


function getTitle($html)
{
    return strip_tags(substr($html, 0, strpos($html, "</h1>")));
}
function getDescription($html)
{ //получает весь текст без html разметки после тега h1
    return substr(strip_tags(substr($html, strpos($html, '</div>'))), 0, 240 . '...');
}
