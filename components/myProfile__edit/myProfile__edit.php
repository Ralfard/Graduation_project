<main class="main">
    <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/myProfile/myProfile.css">
    <div class="profile">
        <!-- 
                |                                               |
                |   profileDescription                   |
                |__________________________|
                |                       |                       |
                |desctop            |   desctop         |
                |-left-block        |   -right-block    |
                |                       |                       |
                |                       |                       |
     -->
        <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . '/components/profileDescription/profileDescription.php');

        include_once($_SERVER['DOCUMENT_ROOT'] . '/components\profile__edit\profile__edit.php');

        // include_once($_SERVER['DOCUMENT_ROOT'] . '/components/profile__desctop-right-block/profile__desctop-right-block.php');
        ?>

    </div>
</main>