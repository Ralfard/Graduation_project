<?php
    
?>
<main class="main">

    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/add__article_create/add__article_create.css">
    <section class="add__article_create content-wrapper" data-editable data-name="main-content">
        <form id="addArticle" name="addArticle" method="POST" action="/PHP_logic/add-article/add-article.php" enctype="multipart/form-data">
            <div id="editor">
                <div class="selector__row">
                    <select class="editor__select" name="topic" id="select" required title="Тема в которой будет опубликована статья">
                        <option class="display_none" selected disabled value="">Выберите тему</option>
                        <option class="selector__option" value="Мой блог">Мой блог</option>
                        <option class="selector__option" value="Спорт">Спорт</option>
                        <option class="selector__option" value="Право">Право</option>
                        <option class="selector__option" value="Технологии">Технологии</option>
                    </select>
                </div>
                <textarea class="editor__title article__content-h1" oninput='resizeTextarea(event)' form='addArticle' name="input-title" type="text" placeholder="Название статьи..." rows="1"></textarea>
                <div class="flex-row editorjs__row">
                    <div id="previewON" class="btn">Предпросмотр</div>
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
                    <input type='hidden' name="article_HTML" value="">
                    <input type="submit" name="send_article" class="btn" value="Опубликовать">
                </div>
            </div>
 
            <div id="preview" class="preview">
                <div id="preview__field">

                </div>
                <div class="flex-row editorjs__row">
                    <div id="previewOOF" class="btn">Редактировать</div>
                    <input type="submit" name="send_article" class="btn" value="Опубликовать">
                </div>

            </div>
        </form>
    </section>



    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components\add__article_create\add__article_create.js"></script>
</main>