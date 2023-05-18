<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/nav-mobile.css">

<nav class="nav nav_mobile">
    <div class="nav__header">
        <div id="navBurgerBtn" class="nav__img-wrapper nav__img-wrapper_burger">
            <img class="img__burger-menu" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/burgerIcon.svg" alt="menu">
        </div>
        <div class="nav__img-wrapper nav__img-wrapper_logo">
            <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/mainLogo.svg" alt="logo">
        </div>
    </div>
    <ol class="nav__list">

        <li class="nav__item">
            <a class="nav__link" href="">
                <span class="material-icons">
                    local_fire_department
                </span>
                <span class="nav__item-text">Популярное</span>
            </a>
        </li>

        <li class="nav__item">
            <a class="nav__link" href="">
                <span class="material-icons">
                    query_builder
                </span>
                <span class="nav__item-text">Свежее</span>
            </a>
        </li>

        <li class="nav__item">
            <a class="nav__link" href="">
                <span class="material-icons">
                    turned_in_not
                </span>
                <span class="nav__item-text">Закладки</span>
            </a>
        </li>

        <li class="nav__item">
            <a class="nav__link" href="">
                <span class="material-icons">
                    apartment
                </span>
                <span class="nav__item-text"> Компании</span>
            </a>
        </li>

        <li class="nav__item">
            <a class="nav__link" href="">
                <span class="material-icons">
                    laptop
                </span>
                <span class="nav__item-text">Вакансии</span>
            </a>
        </li>

        <li class="nav__item">
            <a class="nav__link" href="">
                <span class="material-icons">
                    format_list_bulleted
                </span>
                <span class="nav__item-text">Подписки</span>
            </a>
        </li>
    </ol>
</nav>
<div id="bottomLayer" class="nav__bottom-layer"></div><!-- появляется как темный фон при открытии наигационной панели в мобилках  -->
<script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/nav.js"></script>