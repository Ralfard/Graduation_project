<div id="modalWindow" class="log-in">
    <div class="log-in__mobile-block">
        <span id="closeModalWindow" class="material-icons log-in__close">
            close
        </span>

        <div class="registration__mobile">
            <div class="logo-wrapper__mobile-block">
                <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/mainLogo.svg" alt="">
            </div>

            <!-- появляется в поле регистрации -->
            <form id="registrationForm" style="display: block;" method="POST" class="registration__form-mobile" action="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/PHP_logic/registration/registration.php" onsubmit="asincRegistration(event)">
                <h2 class="log-in__title">Регистрация</h2>
                <p id="registrationErrorText" class="log-in__text-error"></p>

                <input class="log-in__input" name="name_reg" type="text" placeholder="Имя">
                <input class="log-in__input" name="email_reg" type="text" placeholder="Почта">
                <input class="log-in__input" name="password_reg" type="password" placeholder="Пароль">
                <input id="registrationSubmit" class="log-in__submit" name="submit_reg" type="submit" value="Зарегистрировать">
                <p class="log-in__text">Есть аккаунт? <span class="log-in__change-form">Войти</span></p>
            </form>

            
            <!-- появляется в поле авторизации -->
            <form id="autorizationForm" style="display: none;" name="autorizationForm" method="POST" class="authorization__form-mobile" action="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/PHP_logic/autorization/autorization.php" onsubmit="asincAutorization(event)">
                <h2 class="log-in__title">Вход в аккаунт</h2>
                <p id="autorizationErrorText" class="log-in__text-error"></p>

                <input class="log-in__input" name="email_aut" type="email" placeholder="Почта" required="false">
                <input class="log-in__input" name="password_aut" type="password" placeholder="Пароль" required="false">
                <input id="autorizationSubmit" class="log-in__submit" name="submit_aut" type="submit" value="Войти">
                <p class="log-in__text">Нет аккаунта? <span class="log-in__change-form">Регистрация</span></p>
            </form>

        </div>

    </div>
</div>
<script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/header/autorizationModalWindow/autorizationModalWindow.js"></script>

<!--<div class="log-in__desctop-block">
        <div class="">

        </div>
        <div class="">
            <form action="" method="post">

            </form>
        </div>
    </div>
 -->