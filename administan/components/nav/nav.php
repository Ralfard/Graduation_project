<nav class="nav">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/administan/components/nav/nav.css">
    <ul id="navBtnsList" class="nav__list">
        <?php
        if ($_SESSION['adm']['managing_administrators'] === '1') {
        ?>
            <li class="nav__item">Администраторы</li>
        <?php
        }
        ?>
        <?php
        if ($_SESSION['adm']['managing_users'] === '1') {
        ?>
            <li class="nav__item">Пользователи</li>
        <?php
        }
        ?>
        <?php
        if ($_SESSION['adm']['artiles_moderation'] === '1') {
        ?>
            <li class="nav__item">Модерация статей</li>
        <?php
        }
        ?>




        <!-- <li class="nav__item">Поддержка</li> -->

    </ul>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/administan/components/nav/nav.js"></script>
</nav>