<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php');
?>
<h1 class="table__name">список администраторов</h1>
<table class="table">
    <thead class="table__head">
        <tr>
            <td rowspan="2" class="table__icons-column ">ID</td>
            <td rowspan="2">Имя</td>
            <td rowspan="2">E-mail</td>
            <td colspan="2" class="table__icons-column ">Права управления</td>
            <!-- <td rowspan="2">Удалить</td> -->
        </tr>
        <tr>
            <td class="table__icons-column ">
                Пользователи
            </td>
            <td class="table__icons-column ">
                Статьи
            </td>
        </tr>
    </thead>
    <tbody class="table__body">
        <?php
        $sql = "SELECT * FROM `admins`";
        $request = $mysqli->query($sql);
        for ($i = 0; $i < $request->num_rows; ++$i) {
            $admin = $request->fetch_assoc();
            $sql = "SELECT * FROM `admins__rights` WHERE `id`= '" . $admin['id'] . "'";
            $requestRights = $mysqli->query($sql) or die("Ошибка " . mysqli_error($mysqli));
            $rights = $requestRights->fetch_assoc();
            $rights['artiles_moderation'] = $rights['artiles_moderation'] === '1' ? 'checked' : '';
            $rights['managing_users'] = $rights['managing_users'] === '1' ? "checked" : '';
        ?>
            <tr>
                <td class="table__icons-column "><?php echo $admin['id'] ?></td>
                <td><?php echo $admin['name'] ?></td>
                <td><?php echo $admin['mail'] ?></td>
                <td class="table__icons-column "><input type="checkbox" <?php echo $rights['artiles_moderation'] ?> name="managing_users" onchange="manageRights(event)"></td>
                <td class="table__icons-column "><input type="checkbox" <?php echo $rights['managing_users'] ?> name="artiles_moderation" onchange="manageRights(event)"></td>
                <!-- <td class="table__icons-column "><span class="material-icons table_red-hover">delete</span></td> -->
            </tr>
        <?php
        }
        ?>
    </tbody>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/administan/components/adminsList/adminsList.js"></script>
</table>