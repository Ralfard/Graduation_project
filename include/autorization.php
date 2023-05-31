<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/styles/autorization.css">

<div id="modalWindow" class="log-in">
    <div class="log-in__mobile-block">
        <span id="closeModalWindow" class="material-icons">
            close
        </span>
        <div class="registration__mobile">
            <div class="logo-wrapper__mobile-block">
                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/mainLogo.svg" alt="">
            </div>
            <form id="registrationFormMobile" style="display: block;" class="registration__form-mobile" action="">
                <h2 class="log-in__title">Регистрация</h2>
                <input class="log-in__input" type="text" placeholder="Имя">
                <input class="log-in__input" type="email" placeholder="Почта">
                <input class="log-in__input" type="password" placeholder="Пароль">
                <input class="log-in__submit" type="submit" value="Зарегистрировать">
                <p class="log-in__text">Есть аккаунт? <span class="log-in__change-form">Войти</span></p>
            </form>
            <form id="authorizationFormMobile" style="display: none;" class="authorization__form-mobile" action="">
                <h2 class="log-in__title">Вход в аккаунт</h2>
                <input class="log-in__input" type="email" placeholder="Почта">
                <input class="log-in__input" type="password" placeholder="Пароль">
                <input class="log-in__submit" type="submit" value="Войти">
                <p class="log-in__text">Нет аккаунта? <span class="log-in__change-form">Регистрация</span></p>
            </form>
        </div>

    </div>
</div>



<!--<div class="log-in__desctop-block">
        <div class="">

        </div>
        <div class="">
            <form action="" method="post">

            </form>
        </div>
    </div>
 -->

<script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/js/autorization.js"></script>