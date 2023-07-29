<?php //*отвечает за обработку коментариев к статье
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic\dataBase\db_connect.php');

if (isset($_SESSION['user'])) {
    if ($_POST['data']) {
        $data = json_decode($_POST['data'], true);
        $author = $_SESSION['user']['id'];
        $text = $data['text'];
        $article = $data['article'];
        $date_time = date("H:i Y.m.d");


        $query = "INSERT INTO `articles__comments` (`author_id`,`article_id`, `text`, `date_time`) VALUES
        (
            '" . mysqli_real_escape_string($mysqli, sanitizeString($author)) . "',
            '" . mysqli_real_escape_string($mysqli, sanitizeString($article)) . "',
            '" . mysqli_real_escape_string($mysqli, sanitizeString($text)) . "',
            '" . mysqli_real_escape_string($mysqli, sanitizeString($date_time)) . "'
        )";
        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));


        include_once($_SERVER['DOCUMENT_ROOT'] . '/components\comentsList\comentsList.php');
    } else {
        echo "Возникла ошибка: text не определен";
    }
}
else{
    echo 12;
}
function sanitizeString($str)
{
    $str = stripslashes($str);
    $str = strip_tags($str);
    $str = htmlentities($str);
    return $str;
}
