<footer class="mobile-footer">
    <a class="mobile-footer__img-wrapper" href="">
        <span class="material-icons-outlined">home</span>
    </a>
    <a class="mobile-footer__img-wrapper" href="">
        <span class="material-icons">
            apartment
        </span>
    </a>
    <a class="mobile-footer__img-wrapper" href="">
        <span class="material-icons-outlined">
            sms
        </span>
    </a>
    <a class="mobile-footer__img-wrapper" href="">
        <span class="material-icons-outlined">
            notifications
        </span>
    </a>
    <a class="mobile-footer__img-wrapper" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/pages/profile.php">
        <img class="user-avatar_circle" src="<?= $_SESSION['user']['icon'] ?>" alt="icon">
    </a>
</footer>