<footer class="mobile-footer">
    <a class="mobile-footer__img-wrapper" href="">
        <span class="material-icons material-icons_black ">local_fire_department</span>
    </a>


    <a class="mobile-footer__img-wrapper" href="">
        <span class="material-icons-outlined material-icons_black ">
            turned_in_not
        </span>
    </a>

    <a class="mobile-footer__img-wrapper" href="">
        <span class="material-icons-outlined material-icons_black ">
            sms
        </span>
    </a>

    <a class="mobile-footer__img-wrapper" href="?logout">
        <span class="material-icons header__icon">
            logout
        </span>
    </a>

    <a class="mobile-footer__img-wrapper" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages\account\myProfile.php?id=<?= $_SESSION['user']['id'] ?>">
        <img class="user-avatar_circle" src="<?= $_SESSION['user']['icon'] ?>" alt="icon">
    </a>
</footer>