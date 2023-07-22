<?php //* хранит в себе функции php которые часто использовались по всему сайту
function request_a_line($DB, $sql)
{ //*функция обращения к БД Принимает: базу данных и sql запрос Возвращает: ассоциативный массив
    $request = mysqli_query($DB, $sql) ? mysqli_query($DB, $sql) : mysqli_error($DB);
    $response = mysqli_fetch_assoc($request);
    return $response;
}

function check_likes_of_authorizedUser($DB, $user, $articleID)
{ //* проверяет поставил ли авторизованный пользователь лайк этой статье
    $response = request_a_line($DB, "SELECT  likedArticles FROM users WHERE id=" . $user['id'] . "");
    $likes = unserialize($response['likedArticles']);
    return in_array($articleID, $likes) ? ' like_active' : "";
}

function increment_views($DB, $articleID)
{ //* обновляет счетчик просмотров статьи
    mysqli_query($DB, "UPDATE articles SET views=views+1 WHERE id=$articleID");
}
