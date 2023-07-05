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
                <span class="material-icons header__icon">
                    search
                </span>
            </div>
        </a>
        <input class="header__search-input" type="search" name="search" id="search" placeholder="Поиск">
    </div>
    <button class="header__add-article"><span class="header__add-icon">+</span><span class="header__add-text">Создать</span></button>


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
        <a class="header__link" href="?logout">
            <div class="header__link-icon-wrapper header__icon">
                <span class="material-icons header__icon">
                    logout
                </span>
            </div>
        </a>
        <a class="header__link" href="../pages/profile.php">
            <div class="header__user-icon-wrapper header__icon">
                <img class="img_cover" src="<?= $_SESSION['user']['icon'] ?>" alt="">
            </div>
        </a>
    </div>
</header>