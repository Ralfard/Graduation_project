<?php
    session_start();
    if($_SESSION['auth_admin']=='yes_auth'){
        define("olson", true);//запрещает переход по ссылкам через путь в адресной строке
        if(isset($_GET['logout'])){
            unset($_SESSION['auth_admin']);
            header('Location: index.php');
        }
    }
    include("../include/db_connect.php");  
    
    if($_POST["submit_add"]){
        $error=array();
        if(count($error)){
            $_SESSION["message"]= "<p id='form-error'>".implode('<br/>', $error)."</p>";
        }
        else{
            $title=$_POST['title']; // создаем переменные из имен инпутов которые отправляются при нажатии на кнопку
            $author=$_POST['author'];
            $data=$_POST['data'];
            $time=$_POST['time'];
            $text=$_POST['text'];
            $description=$_POST['description'];

            $query="INSERT INTO blog (title , author, data, time, text, description) VALUES /*создаем SQL запрос к БД */
            (
            '".mysqli_real_escape_string($mysqli, $title) /*экранируем символы для безопасности*/."',  
            '".mysqli_real_escape_string($mysqli, $author)."',
            '".mysqli_real_escape_string($mysqli, $data)."',
            '".mysqli_real_escape_string($mysqli, $time)."',
            '".mysqli_real_escape_string($mysqli, $text)."',
            '".mysqli_real_escape_string($mysqli, $description)."'
            )";
            $result=mysqli_query($mysqli, $query) or die("Ошибка ". mysqli_error($mysqli));

            $id=mysqli_insert_id($mysqli);

            if(empty($_POST['upload_image'])){
                include("action/blog_image.php");
                unset($_POST["upload_image"]);
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

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/setka.css">
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>
    <?php
    include("include/nav.php");
    $error;
    ?>
    <section class="main">
        <div class="container">
            <div class="row main_row">
                <div class="col-12">
                    <h2 class="main__header">Блог - добавление статьи</h2>
                </div>
            </div>
            <hr class="main__hr">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <form class="form" enctype="multipart/form-data" method="post" action="">
                        <div class="form-block">
                            <label for="" class="form-label">Заголовок</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-block">
                            <label for="" class="form-label">Автор</label>
                            <input type="text" class="form-control" name="author">
                        </div>
                        <div class="form-block">
                            <label for="" class="form-label">Дата</label>
                            <input type="date" class="form-control" name="data">
                        </div>
                        <div class="form-block">
                            <label for="" class="form-label">Время</label>
                            <input type="text" class="form-control" name="time">
                        </div>
                        <div class="form-block">
                            <label for="" class="form-label">Текст</label>
                            <textarea type="text" class="form-control" name="text"></textarea>
                        </div>
                        <div class="form-block">
                            <label for="" class="form-label">Описание для выдачи</label>
                            <input type="text" class="form-control" name="description">
                        </div>


                        <div class="form-block">
                            <label for="" class="form-label">Изображение</label>
                            <div id="baseimg-upload">
                                <input type="hidden" class="form-control" name="MAX_FILE_SIZE" value="5000000">
                                <input type="file" class="form-control" name="upload_image">
                            </div>
                        </div>

                        <input type="submit" id="submit_form" name="submit_add" class="form__btn" value="Добавить">
                    </form>
                </div>
            </div>         
        </div>
    </section>

    
    
</body>
</html>