<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- иконки-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles/common_styles.css">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/add_article.css">

    <link rel="stylesheet" href="../plugins/build/content-tools.min.css">

    <style>
        .author {
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color: #F2F0F2;">
    <main class="main">
        <article class="add-article" data-editable data-name="main-content">
            <h1>Заголовок</h1>
            <p class="author">Контент</p>
            
        </article>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    <script src="../plugins/build/content-tools.min.js"></script>
    <script src="../plugins/build/editor.js"></script>
</body>

</html>