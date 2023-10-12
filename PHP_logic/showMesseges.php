<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic\dataBase\db_connect.php");
if ($_POST['id']) {
    showMesseges($_SESSION['user']['id'], $_POST['id'], $mysqli);
}


function showMesseges($myID, $interlocutorID, $DB)
{
    $sql = "SELECT * FROM `messages` WHERE (`user1`=$myID AND `user2`=$interlocutorID) OR (`user1`=$interlocutorID AND `user2`=$myID)";
    $request = $DB->query($sql);
    for ($i = 0; $i < mysqli_num_rows($request); $i++) {
        $response = $request->fetch_assoc();
        $date_time = explode(" ", $response['date_time']);
        if ($response['user1'] == $myID) {
?>
            <div class="messages__msg messages__my-msg">
                <span class="messages__msg-text">
                    <?php echo $response['text'] ?>
                </span>
                <div class="row messages__date-time">
                    <time datetime="23:00 31.12.1999" class="messages__msg-time">
                        <?php echo $date_time[1] ?>
                    </time>
                    <time datetime="23:00 31.12.1999" class="messages__msg-time">
                        <?php echo $date_time[0] ?>
                    </time>
                </div>
            </div>
        <?php
        } else if ($response['user2'] == $myID) {
        ?>
            <div class="messages__msg messages__interlocutor-msg">
                <span class="messages__msg-text">
                    <?php echo $response['text'] ?>
                </span>
                <div class="row messages__date-time">
                    <time datetime="23:00 31.12.1999" class="messages__msg-time">
                        <?php echo $date_time[0] ?>
                    </time>
                    <time datetime="23:00 31.12.1999" class="messages__msg-time">
                        <?php echo $date_time[1] ?>
                    </time>
                </div>
            </div>
<?php
        } else {
            echo "возникла не предвиденная ошибка в функции showMesseges!\n user1:" . $response['user1'] . "\n user2: " . $response['user2'];
            return;
        }
    }
}
