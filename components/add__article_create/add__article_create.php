<?php

?>
<main class="main">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/add__article_create/add__article_create.css">
    <section class="add__article_create content-wrapper" data-editable data-name="main-content">
        <form id="addArticle" name="addArticle" method="post" action="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/PHP_logic\add-article\article-image.php">
            <div id="editor">
                <input class="editor__title article__content-h1" form='addArticle' name="input-title" type="text" placeholder="Название статьи...">
                <div class="flex-row editorjs__row">
                    <button id="previewON" class="btn">Предпросмотр</button>
                    <div class="editorjs__left-block">
                        <div id="toolbar" class="editor__toolbar">
                            <div class="toolbar__img">
                                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/toolbar_for_editor/h2.svg" alt="">
                            </div>
                            <div class="toolbar__img">
                                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/toolbar_for_editor/h3.svg" alt="">
                            </div>
                            <div class="toolbar__img">
                                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/toolbar_for_editor/text.svg" alt="">
                            </div>
                            <div class="toolbar__img">
                                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/toolbar_for_editor/img.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <input type='hidden' name="MAX_FILE_SIZE" value="5000000">
                    <input type="submit" class="btn" value="Сохранить">
                </div>
            </div>

            <div id="preview" class="preview">
                <div id="preview__field">

                </div>
                <div class="flex-row editorjs__row">
                    <button id="previewOOF" class="btn">Редактировать</button>
                    <input type="submit" class="btn" value="Сохранить">
                </div>
            </div>
        </form>
    </section>



    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components\add__article_create\add__article_create.js"></script>
</main>