<?php
$sql = "SELECT * FROM `articles__comments` WHERE `article_id`=" . $_SESSION['articleID'] . "";
$requestComments = $mysqli->query($sql);
for ($i = 0; $i < $requestComments->num_rows; ++$i) {
    $comment = $requestComments->fetch_assoc();
    $comment_author = getAuthor($comment['author_id'], $mysqli);

?>
    <div class="comment">
        <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/userProfile.php?id=<?php $comment_author['id'] ?>">
            <div class="comment__top-row">
                <div class="comment__img-wrapper user-avatar_circle">
                    <img class="img__cover" src="<?= $comment_author['icon'] ?>" alt="">
                </div>
                <div class="comment__info-column">
                    <span class="comment__author-name author-name"><?= $comment_author['name'] ?></span>
                    <time class="preview__time" datetime='00:00 30-01-2000'><?= $comment['date_time'] ?></time>
                </div>
            </div>
        </a>
        <div class="comment__middle-row">
            <p class="comment__text article__content-p">
                <?= $comment['text'] ?>
            </p>
        </div>
    </div>
<?php
}
function getAuthor($id, $DB)
{
    $sqlAuthor = "SELECT * FROM `users` WHERE `id`= $id ";
    $requestAuthor = $DB->query($sqlAuthor);

    $Author = $requestAuthor->fetch_assoc();
    $Author['icon'] = $Author['icon'] ? $Author['icon'] : "https://placehold.co/40x40/34691E/dddddd?text=" . strtoupper($Author['name'][0]);
    return $Author;
}
?>