<?php
    session_start();
    if($_SESSION['auth_admin']=='yes_auth'){
        define("sunwa-efimov-.r.a", true);//запрещает переход по ссылкам через путь в адресной строке
        if(isset($_GET['logout'])){
            unset($_SESSION['auth_admin']);
            header('Location: index.php');
        }
    }
    include("../../include/db_connect.php");

    $id=$_GET['id'];

//МЕНЯЕМ ТОЛЬКО НАЗВАНИЕ ТАБЛИЦЫ

    $query="DELETE FROM news WHERE id='$id'";
    $result=mysqli_query($mysqli, $query) or die("Ошибка ". mysqli_error($mysqli));

    mysqli_close($mysqli);

    header("Location:{$_SERVER['HTTP_REFERER']}");//возвращает пользователя обратно на предыдущую страницу
?>