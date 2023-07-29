<nav class="nav">
    <h3 class="nav__title">Категории</h3>
    <ul class="nav__ul">
        <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/admin/admins">
            <li class="nav__li">Администраторы</li>
        </a>
        <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/admin/news">
            <li class="nav__li">Новости</li>
        </a>
        <a href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/admin/products">
            <li class="nav__li">Товары</li>
        </a>
    </ul>
</nav>