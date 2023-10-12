<?php //отвечает за обработку закладок
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic\dataBase\db_connect.php');

if (isset($_SESSION['user'])) {
    if ($_POST['data']) {
        $data = json_decode($_POST['data'], true);

        $toggle = $data['btnState'] === true ? -1 : 1;
        user_boormarks($data['id'], $_SESSION['user']['id'], $toggle, $mysqli);
        echo '{"toggle":' . $toggle . '}';
    } else {
        echo 'Ошибка data пуст';
    }
} else {
    echo "Данное действие разрешено только авторизованным пользователям";
}



function user_boormarks($articleID,  $userID,   $num, $DB) // в зависимости от $num удаляет или добавляет статью в закладки
{
    $sql = "SELECT `bookmarks` FROM `users__bookmarks` WHERE user_id=$userID";
    $request = mysqli_query($DB, $sql) or die("Ошибка " . mysqli_error($DB));
    if (mysqli_num_rows($request) === 1) {
        $response = mysqli_fetch_assoc($request);
        $bookmarks = $response['bookmarks'] === Null ? array() : unserialize($response['bookmarks']);
        if ($num === 1) {
            array_push($bookmarks, $articleID);
        } else if ($num === -1) {
            $bookmarks = remove_from_array($bookmarks, $articleID);
        }
        $bookmarks = serialize($bookmarks);
        $sql = "UPDATE `users__bookmarks` SET `bookmarks`= '$bookmarks' WHERE `user_id`= $userID";
        $request = mysqli_query($DB, $sql) or die("Ошибка " . mysqli_error($DB));
    } else {
        echo "Возникла не предвиденная ошибка в функции user_bookmarks<br>";
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

