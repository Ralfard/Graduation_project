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

$id = $_GET['id'];


if ($_POST["submit_enter"]) {
    $error = array();
    if (count($error)) { //                    объединяем массив ошибок в одну строку
        $_SESSION["message"] = "<p id='form-error>" . implode('<br>', $error) . "</p>";
    } else {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $article_number = $_POST['article_number'];
        $manufacturer = $_POST['manufacturer'];
        $terminal = $_POST['terminal'];
        $power = $_POST['power'];
        $input_voltage = $_POST['input_voltage'];
        $output_voltage = $_POST['output_voltage'];
        $rated_current = $_POST['rated_current'];
        $intagration = $_POST['intagration'];
        $description = $_POST['description'];


        $query = "UPDATE products SET name = '$name', price='$price', discount='$discount', article_number='$article_number', manufacturer='$manufacturer', terminal='$terminal', power='$power', input_voltage='$input_voltage', output_voltage='$output_voltage', rated_current='$rated_current', intagration='$intagration', description='$description' WHERE id ='$id'";

        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));

        if (empty($_POST['galleryimg[]'])) {
            include("../action/product_gallery.php");
            unset($_POST["galleryimg[]"]);
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

    $sql = "SELECT * FROM products WHERE id='$id'";
    $request = $mysqli->query($sql);

    if ($request->num_rows === 1) {
        $response = $request->fetch_assoc();
        switch ($response['manufacturer']) {
            case 'Omron':
                $type1 = 'selected';
                break;
            case 'Nichicon':
                $type2 = 'selected';
                break;
            case 'Sato':
                $type3 = 'selected';
                break;
            case 'Stanley':
                $type4 = 'selected';
                break;
            case 'Weintek':
                $type5 = 'selected';
                break;
        }
    ?>
        <section class="main">
            <div class="container">
                <div class="row main__row">
                    <h2 class="main__title">Изменить товар</h2>
                    <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/admin/products"><button class="btn">Назад</button></a>
                </div>
                <hr>
                <div class="row">
                    <form class="form" method="post" enctype="multipart/form-data" action="">
                        <div class="form__block">
                            <label class="form__label" for="">Название</label>
                            <input name="name" type="text" required class="form__input" value="<?= $response['name'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Цена</label>
                            <input name="price" type="text" required class="form__input" value="<?= $response['price'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Скидка</label>
                            <input name="discount" type="text" required class="form__input" value="<?= $response['discount'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Артикул</label>
                            <input name="article_number" type="text" required class="form__input" value="<?= $response['article_number'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Текст Для выдачи</label>
                            <textarea name="description" required class="form__input"><?= $response['description'] ?></textarea>
                        </div>

                        <div class="form__block">
                            <label class="form__label" for="">Производитель</label>
                            <select class="form__select" required name="manufacturer" id="">
                                <option <?= $type1 ?> value='Omron' class="form__option">Omron</option>
                                <option <?= $type2 ?> value='Nichicon' class="form__option">Nichicon</option>
                                <option <?= $type3 ?> value='Sato' class="form__option">Sato</option>
                                <option <?= $type4 ?> value='Stanley' class="form__option">Stanley</option>
                                <option <?= $type5 ?> value='Weintek' class="form__option">Weintek</option>
                            </select>
                        </div>

                        <div class="form__block">
                            <label class="form__label" for="">Наличие терминала</label>
                            <input name="terminal" type="text" required class="form__input" value="<?= $response['terminal'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Мощность</label>
                            <input name="power" type="text" required class="form__input" value="<?= $response['power'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Входное напряжение</label>
                            <input name="input_voltage" type="text" required class="form__input" value="<?= $response['input_voltage'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Выходное напряжение</label>
                            <input name="output_voltage" type="text" required class="form__input" value="<?= $response['output_voltage'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Номинальный ток</label>
                            <input name="rated_current" type="text" required class="form__input" value="<?= $response['rated_current'] ?>">
                        </div>
                        <div class="form__block">
                            <label class="form__label" for="">Интеграция</label>
                            <input name="intagration" type="text" required class="form__input" value="<?= $response['intagration'] ?>">
                        </div>

                        <?php
                        $sql = "SELECT * FROM `product_gallary` WHERE product_id='$id'";     // запрос 
                        $request = $mysqli->query($sql);  //отправляем запрос  в БД

                        for ($i = 0; $i != $request->num_rows; ++$i) {
                            $response = $request->fetch_assoc();
                        ?>

                            <div class="form__block">
                                <div class="form__border">
                                    <img class="form__img" src="../../upload_image/<?= $response['img'] ?>" alt="">
                                    <ul>
                                        <li class="btn btn_marginBottom10"><a href="delete_img.php?id=<?= $response['id'] ?>" class="">Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                            <br><br>

                        <?php
                        }
                        ?>
                        <div class="form__block">
                            <label for="" class="form__label">Галлерея картинок</label>
                            <div id="objects">
                                <div id="addimage1" class="addimage">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                                    <input type="file" class="form-control" name="galleryimg[]"><br>
                                </div>
                            </div>
                        </div>

                        <p class="btn btn_marginBottom10" id="add-input">Добавить картинку</p>
                        <br>

                        <div class="form__block">
                            <input name="submit_enter" type="submit" class="btn" value="Изменить">
                        </div>
                    </form>
                </div>


            </div>

        </section>
        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/main.js"></script>
</body>
<?php
    }
?>

</html>