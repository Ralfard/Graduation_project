<?php //отвечает за обработку лайков и дизлайков
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic\dataBase\db_connect.php');

if (isset($_SESSION['user'])) {
    if ($_POST['data']) {
        $data = json_decode($_POST['data'], true);
        
        $toggle = $data['btnState'] === true ? -1 : 1;
        user_likes($data['id'], $_SESSION['user']['id'], $toggle, $mysqli);
        $count = increment_or_decrement($data['id'], $toggle, $mysqli);

        echo '{"toggle":' . $toggle . ', "count":' . $count . '}';
    }
} else {
    echo "Данное действие разрешено только авторизованным пользователям";
}

function increment_or_decrement($id, $num, $DB)
{
    $sql = "UPDATE articles   SET articles.likes=articles.likes+$num WHERE id= $id";
    $request = mysqli_query($DB, $sql);
    $sql = "SELECT likes FROM articles WHERE id = $id";
    $request = mysqli_query($DB, $sql);
    $count = mysqli_fetch_assoc($request);

    return $count['likes'];
} 


function user_likes($articleID,  $userID,   $num, $DB) // в зависимости от $num удаляет или добавляет статью в лайкнутые статьи пользователя
{
    $sql = "SELECT likedArticles FROM users WHERE id=$userID";
    $request = mysqli_query($DB, $sql);
    if (mysqli_num_rows($request) === 1) {
        $response = mysqli_fetch_assoc($request);
        $likes = $response['likedArticles'] === Null ? array($response['likedArticles']) : unserialize($response['likedArticles']);
        if ($num === 1) {
            array_push($likes, $articleID);
        } else if ($num === -1) {
            $likes = remove_from_array($likes, $articleID);
        }
        $likes = serialize($likes);
        $sql = "UPDATE `users` SET `likedArticles`= '$likes' WHERE `id`= $userID";
        $request = mysqli_query($DB, $sql) ? mysqli_query($DB, $sql) : mysqli_error($DB);
    } else {
        echo "Возникла не предвиденная ошибка в функции user_likes<br>";
    }
} 



function remove_from_array($arr, $delete)
{ //удаляет из массива переданное значение
    $key = array_search($delete, $arr);
    if ($key !== false) {
        unset($arr[$key]);
        $arr = array_values($arr);
        return $arr;
    }
}
