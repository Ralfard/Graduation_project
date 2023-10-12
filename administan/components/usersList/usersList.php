<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_logic/dataBase/db_connect.php');
?>
<h1 class="table__name">список Пользователей</h1>
<table class="table">

    <thead class="table__head">
        <td class="table__icons-column">ID</td>
        <td>Пользователь</td>
        <!-- <td>Написать</td> -->
        <td>E-mail</td>
        <!-- <td class="table__icons-column">Профиль</td> -->
        <!-- <td class="table__icons-column">Забанить</td> -->
        <td class="table__icons-column">Удалить</td>
    </thead>

    <tbody class="table__body">
        <?php
        $sql = "SELECT * FROM `users`";
        $request = $mysqli->query($sql);
        for ($i = 0; $i < $request->num_rows; ++$i) {
            $user = $request->fetch_assoc();
        ?>
            <tr> 
                <td class="table__icons-column"><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['mail'] ?></td>
                
                <!-- <td class="table__icons-column ">
                    <span class="material-icons table_orange-hover">gavel</span>
                </td> -->
                <td class="table__icons-column ">
                    <span class="material-icons table_red-hover" data-table="users" onclick="deleteRow(event)">delete</span>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>

</table>