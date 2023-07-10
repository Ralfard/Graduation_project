<link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/main/profile/profile.css">
<main class="main">
    <div class="profile">
        <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/main/profile/components/profileDescription/profileDescription.php')
        ?>
        <div class="profile__desctop-left-block">
            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . '/components/main/profile/components/add_articles_block/add_articles_block.php')
            ?>
            <section class="profile__articles">
                <div class="profile__alternative">
                    <p class="profile__alternative-text">
                        Напишите первую статью, чтобы привлечь читателей в ваш блог
                    </p>
                    <button class="profile__alternative-btn">Создать запись</button>

                </div>
            </section>
        </div>


        <div class="profile__desctop-right-block">

            <section class="profile__subscribers">
                <div class="text-block">
                    <h3 class="profile__h3">Подписчики</h3><span class="profile__gray-text">500</span>
                </div>
                <div class="profile__subscribers-gallery">
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <div class="user-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                </div>
                <span class="profile__blue-text">Показать всех</span>
            </section>

            <section class="profile__subscriptions">
                <div class="text-block">
                    <h3 class="profile__h3">Подписки</h3><span class="profile__gray-text">500</span>
                </div>
                <div class="profile__subscriptions-item">
                    <div class="topic-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <span class="">Технологии</span>
                </div>
                <div class="profile__subscriptions-item">
                    <div class="topic-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <span class="">Технологии</span>
                </div>
                <div class="profile__subscriptions-item">
                    <div class="topic-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <span class="">Технологии</span>
                </div>
                <div class="profile__subscriptions-item">
                    <div class="topic-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <span class="">Технологии</span>
                </div>
                <div class="profile__subscriptions-item">
                    <div class="topic-avatar_rectangle">
                        <img class="img__cover" src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/images/2 2.png" alt="">
                    </div>
                    <span class="">Технологии</span>
                </div>
                <span class="profile__blue-text">Показать все</span>
            </section>
        </div>

    </div>
</main>