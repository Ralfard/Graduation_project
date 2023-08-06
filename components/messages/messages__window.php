<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/PHP_logic\dataBase\db_connect.php");
$id = $_SESSION['user']['id'];
?>

<style>
    .messages__window {
        z-index: 99;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        width: 500px;
        min-width: 300px;
        height: 400px;
        min-height: 200px;
        border: 2px solid rgb(100, 100, 100);
        border-radius: 10px 10px 0;
        padding: 15px 3px 3px 3px;
        position: fixed;
        background-color: #fff;
    }

    .messages__drag-block {
        display: flex;
        justify-content: center;
        position: absolute;
        top: -50px;
        font-size: 50px;
        cursor: grab;
        width: inherit;
        height: 15px;
    }

    .messages__drag-block:active {
        cursor: grabbing;
    }

    .messages__inner-block {
        box-sizing: border-box;
        border: 1px solid rgb(50, 50, 50);
        border-radius: 10px 10px 30px;
        height: 100%;
        width: 100%;
        position: relative;
    }

    .messages__close-window {
        position: absolute;
        top: -20px;
        right: 2px;
        cursor: pointer;
    }

    .messages__resize {
        z-index: 2;
        position: absolute;
        right: -1px;
        bottom: -1px;
        cursor: nwse-resize;
        height: 17px;
        width: 17px;
        background-color: gray;
        border: 1px solid gray;
        display: block;
        clip-path: polygon(100% 0, 100% 100%, 0 100%, 23% 91%, 45% 80%, 66% 66%, 79% 46%, 90% 22%);
    }

    .messages__contacts {
        z-index: 2;
        background-color: rgb(255, 255, 255);
        border-radius: 10px 0 0 10px;
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        display: flex;
        border-right: 1px solid darkgray;
        height: 100%;
        width: 45px;
        overflow: hidden;
        transition-duration: 200ms;
        transition-delay: 0.4s;
    }

    .messages__contacts:hover {
        width: 50%;
    }

    .messages__list {
        width: 100%;
        list-style-type: none;
    }

    .messages__item {
        box-sizing: border-box;
        padding: 6px;
        width: 100%;
        height: 45px;
        border-bottom: 1px solid darkgray;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
    }

    .messages__item:hover {
        background-color: rgb(224, 224, 224);
    }

    .messages__contact-name {
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .messages__avatar-wrapper {}

    .messages__chat-wrapper {
        height: calc(100% - 45px);
    }

    .messages__chat {
        box-sizing: border-box;
        padding: 10px;
        width: calc(100% - 45px);
        height: auto;
        max-height: 100%;
        margin-left: 45px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
        overflow: auto;
    }

    .messages__interlocutor-msg {
        justify-self: start;
        border-radius: 5px 5px 5px 0;
    }

    .messages__my-msg {
        justify-self: end;
        background-color: rgb(231, 255, 219);
        border-radius: 5px 5px 0 5px;
    }

    .messages__msg {
        display: grid;
        max-width: 80%;
        padding: 4px 8px;
        -webkit-box-shadow: 0px 0px 5px 2px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 0px 0px 5px 2px rgba(34, 60, 80, 0.2);
        box-shadow: 0px 0px 5px 2px rgba(34, 60, 80, 0.2);
    }

    .messages__msg-text {}

    .messages__msg-time {
        font-size: 12px;
        color: rgb(100, 100, 100);
        margin: 4px;
    }

    .messages__my-msg .messages__msg-time {
        justify-self: end;
    }

    .messages__input-area {
        border-top: 1px solid darkgray;
        border-radius: 0 0 25px;
        box-sizing: border-box;
        bottom: 6px;
        padding: 6px;
        width: calc(100% - 45px);
        height: 40px;
        margin-left: 45px;
        display: grid;
        grid-template-columns: 1fr 40px;
        gap: 8px;
        background-color: #fff;

    }

    .messages__input {
        height: 80%;
    }

    .messages__submit {
        height: 95%;
        width: 35px;
        text-align: center;
    }
</style>



<div id="messages" class="messages__window">
    <div class="messages__inner-block">
        <div id="dragBtn" class="messages__drag-block">
            .....
        </div>
        <div id="closeBtn" class="messages__close-window">
            <span class="material-icons"> close </span>
        </div>
        <div id="resizeBtn" class="messages__resize"></div>

        <div class="messages__contacts">
            <ul class="messages__list">
                <?php
                function getContact($DB, $user)
                {
                    $sqlContacts = "SELECT `contacts`  FROM `users` WHERE `id`=$user";
                    $requestContacts = $DB->query($sqlContacts);
                    $responseContacts = $requestContacts->fetch_assoc();
                    if($responseContacts['contacts'] !== NULL){
                        $contactsArr = unserialize($responseContacts['contacts'])?unserialize($responseContacts['contacts']):false;
                    }
                }
                getContact($mysqli, $id);

                if ($requestContacts !== NULL) {
                    $contactsArr = unserialize($responseContacts['contacts']);

                    for ($i = 0; $i < count($contactsArr); ++$i) {
                        $contactID = $contactsArr[$i];

                        $searchContact = "SELECT `icon`, `name`  FROM `users` WHERE `id`=$contactID";
                        $request = $mysqli->query($searchContact);
                        $response = $request->fetch_assoc();

                        extract($response);
                ?>

                        <li class="messages__item" data-id="1">
                            <div class="messages__avatar-wrapper">
                                <img src="<?php echo $icon ?>" alt="#">
                            </div>
                            <div>
                                <span class="messages__contact-name">
                                    <?php echo $name ?>
                                </span>
                            </div>
                        </li>

                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="messages__chat-wrapper">
            <div class="messages__chat">
                <div class="messages__msg messages__interlocutor-msg">
                    <span class="messages__msg-text">
                        Привет, как дела?
                    </span>
                    <time datetime="23:00" class="messages__msg-time">
                        12:32
                    </time>
                </div>
                <div class="messages__msg messages__my-msg">
                    <span class="messages__msg-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid perferendis dolorum
                        necessitatibus sed nisi facere?
                    </span>
                    <time datetime="23:00" class="messages__msg-time">
                        20:41
                    </time>
                </div>
                <div class="messages__msg messages__my-msg">
                    <span class="messages__msg-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid perferendis dolorum
                        necessitatibus sed nisi facere?
                    </span>
                    <time datetime="23:00" class="messages__msg-time">
                        20:41
                    </time>
                </div>
            </div>
        </div>

        <div class="messages__input-area">
            <input class="messages__input" type="text">
            <button class="messages__submit">
                <span class="material-icons ">
                    send
                </span>
            </button>
        </div>
    </div>
</div>