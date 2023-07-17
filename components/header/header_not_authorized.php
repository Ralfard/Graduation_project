<header class="header">

    <div class="header__left">
        <div id="headerBurgerBtn" class="header__img-burger-wrapper ">
            <img class="header__burger" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/burgerIcon.svg" alt="">
        </div>
        <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages\popular.php">
            <div class="header__img-logo-wrapper ">
                <img class="header__logo" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/mainLogo.svg" alt="">
            </div>
        </a>
    </div>

    <div class="header__search-wrapper">
        <a class="header__link-search" href="">
            <div class="header__search-icon-wrapper header__icon">
                <span class="material-icons header__icon">
                    search
                </span>
            </div>
        </a>
        <input class="header__search-input" type="search" name="search" id="search" placeholder="Поиск">
    </div>


    <div class="header__right">
        <a class="header__link" href="">
            <div class="header__link-icon-wrapper header__icon">
                <span class="material-icons-outlined header__icon">
                    sms
                </span>
            </div>
        </a>
        <a class="header__link" href="">
            <div class="header__link-icon-wrapper header__icon">
                <span class="material-icons-outlined header__icon">
                    notifications
                </span>
            </div>
        </a>
        <div class="header__login-block loginBtn_forJS">
            <span class="material-icons header__login-icon">
                perm_identity
            </span>
            <span class="header__login-text">Войти</span>
        </div>
    </div>
</header>
<?php
include_once("autorizationModalWindow/autorizationModalWindow.php");
?>