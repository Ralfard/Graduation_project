<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/header.css">
<header class="header">


    <div class="header__left">
        <div id="headerBurgerBtn" class="header__img-burger-wrapper ">
            <img class="header__burger" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/burgerIcon.svg" alt="">
        </div>
        <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>">
            <div class="header__img-logo-wrapper ">
                <img class="header__logo" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/mainLogo.svg" alt="">
            </div>
        </a>
    </div>

    <div class="header__search-wrapper">
        <a class="header__link-search" href="">
            <div class="header__search-icon-wrapper header__icon">
                <img class="img_cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/search_black_24dp.svg" alt="">
            </div>
        </a>
        <input class="header__search-input" type="search" name="search" id="search" placeholder="Поиск">
    </div>
    <button class="header__add-article"><span class="header__add-icon">+</span><span class="header__add-text">Создать</span></button>


    <div class="header__right">
        <a class="header__link" href="">
            <div class="header__link-icon-wrapper header__icon">
                <img class="img_cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/textsms_black_24dp.svg" alt="">
            </div>
        </a>
        <a class="header__link" href="">
            <div class="header__link-icon-wrapper header__icon">
                <img class="img_cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/notifications_black_24dp.svg" alt="">
            </div>
        </a>
        <a class="header__link" href="">
            <div class="header__login-block">
                <span class="material-icons header__login-icon">
                    perm_identity
                </span>
                <span class="header__login-text">Войти</span>
            </div>
        </a>
    </div>
</header>

<div class="log-in">
    <div class="log-in__mobile-block">
        <div class="registration__mobile">
            <div class="logo-wrapper__mobile-block">
                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/mainLogo.svg" alt="">
            </div>
            <h2 class="log-in__title">Регистрация</h2>
            <form class="log-in__form" action="">
                <input class="log-in__input" type="text" placeholder="Имя">
                <input class="log-in__input" type="email" placeholder="Почта">
                <input class="log-in__input" type="password" placeholder="Пароль">
            </form>
            <button class=""></button>
        </div>
        <div class="authorization__mobile">

        </div>
    </div>




    <div class="log-in__desctop-block">
        <div class="">

        </div>
        <div class="">
            <form action="" method="post">

            </form>
        </div>
    </div>
</div>