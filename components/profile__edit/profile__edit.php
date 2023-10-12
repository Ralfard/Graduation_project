<section class="profile__edit content-wrapper ">
    <form name="editProfile" action="/PHP_logic/edit_Profile_Info.php" method="post" enctype="multipart/form-data">

        <link rel="stylesheet" href="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/components/profile__edit/profile__edit.css">
        <h1 class="profile__edit-h1">Изменение профиля</h1>

        <label class="profile__edit-h2">Отображаемое имя</label>
        <input class="profile__input" name="userName" value="<?= $_SESSION['user']['name'] ?>" maxlength="255" type="text">

        <label class="profile__edit-h2">Описание профиля</label>
        <textarea class="profile__text-area" name="description" type="text" rows="5" maxlength="255" autocomplete="off"><?= $_SESSION['user']['description'] ?></textarea>

        <label class="profile__edit-h2">Аватар пользователя</label>
        <input type="hidden" name='MAX_FILE_SIZE' value='5000000' onchange=" handleFiles(event)">
        <input type="file" name="userAvatar" onchange=" handleFiles(event)">

        <label class="profile__edit-h2">Обои профлия</label>
        <input type="hidden" name='MAX_FILE_SIZE' value='5000000' onchange=" handleFiles(event)">
        <input type="file" name="userWallpaper" onchange=" handleFiles(event)">

        <div class="flex-row profile__row">
            <input id="saveProfile" class="btn" name="save" type="submit" value="Сохранить">
        </div>

    </form>
</section>