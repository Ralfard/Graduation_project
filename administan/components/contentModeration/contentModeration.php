<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php');
?>
<h1 class="table__name">Статьи требующие проверки</h1>
<table class="table">
    <thead class="table__head">
        <td>Пользователь</td>
        <td>ID</td>
        <td>Статья</td>
        <td>Тема</td>
        <td>Одобрить</td>
        <td>Отклонить</td>
    </thead>
    <tbody class="table__body">
        <?php
        $sql = "SELECT * FROM `articles` WHERE `moderated`= 0 ";
        $request = $mysqli->query($sql);
        for ($i = 0; $i < $request->num_rows; ++$i) {
            $article = $request->fetch_assoc();
            $sql = "SELECT `name` FROM `users` WHERE id=" . $article['author_id'] . "";
            $requestAuthor = $mysqli->query($sql);
            $author = $requestAuthor->fetch_assoc();
        ?>
            <tr>
                <td>
                    <?php echo $author['name'] ?>
                </td>
                <td>
                    <?php echo $article['id'] ?>
                </td>
                <td>
                    <a class="" target="_blank" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/article.php?id=<?php echo $article['id'] ?>">
                        <?php echo $article['title'] ?>
                    </a>
                </td>
                <td class="table__icons-column "><?php echo $article['topic'] ?></td>
                <td class="table__icons-column ">
                    <span class="material-icons table_green-hover" data-action='approve' onclick="approve_or_reject(event)">
                        done
                    </span>
                </td>
                <td class="table__icons-column ">
                    <span class="material-icons table_red-hover" data-action='reject' onclick="approve_or_reject(event)">
                        block
                    </span>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>