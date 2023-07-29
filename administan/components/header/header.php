<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST'])  ; ?>/admin/styles/header.css">
<header class="header">
    <div class="container">
        <div class="row justify__content__between align__items__center">
            <div class="col-auto">
                <h1 class="header__title">Панель администратора</h1>
            </div>
            <div class="col-auto">
                <ul>
                    <li class="header__item"><a class="header__link" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST'])  ; ?>/admin/admins">Главная</a></li>
                    <li class="header__item"><a class="header__link" href="?logout">Выйти</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>