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
        overflow-y: auto;
        scrollbar-width: none;
        scrollbar-color: gray darkgray;
        overflow-x: hidden;
    }

    .messages__list :hover {
        scrollbar-width: thin;
    }

    .messages__item {
        box-sizing: border-box;
        padding: 6px;
        min-width: 200px;
        width: 100%;
        height: 45px;
        border-bottom: 1px solid darkgray;
        overflow: hidden;
        display: grid;
        grid-template-columns: 34px 1fr;
        align-items: center;
        gap: 6px;
        cursor: pointer;
    }

    .messages__item:hover {
        background-color: rgb(224, 224, 224);
    }

    .messages__contact-icon {
        height: 100%;
        border-radius: 50%;
        overflow: hidden;
    }

    .messages__contact-name {
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }


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
        overflow-y: auto;
        scrollbar-width: thin;
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
        word-wrap: anywhere;
    }


    .messages__msg-time {
        font-size: 12px;
        color: rgb(100, 100, 100);
        margin: 5px 0;
    }
    .messages__date-time{
        display: flex;
        justify-content: space-between;
        gap: 0 10px;
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
        border-radius: 6px;
        border: unset;
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
                $myContacts = getContactsID($id, $mysqli);

                for ($i = 0; $i < count($myContacts); ++$i) {
                    $sql = "SELECT `icon`, `name`, `id` FROM `users` WHERE id=" . $myContacts[$i] . "";
                    $request = $mysqli->query($sql);
                    $contact = $request->fetch_assoc();
                    $contact['icon'] = $contact['icon'] !== '0' ? $contact['icon'] : "https://placehold.co/40x40/34691E/dddddd?text=" . strtoupper($contact['name'][0]);
                ?>

                    <li class="messages__item" data-contactid="<?php echo $contact['id'] ?>">

                        <img src="<?php echo $contact['icon'] ?>" alt="#" class="img__cover messages__contact-icon">


                        <span class="messages__contact-name">
                            <?php echo $contact['name'] ?>
                        </span>

                    </li>

                <?php
                }
                ?>
            </ul>
        </div>
        <div class="messages__chat-wrapper">
            <div class="messages__chat">
                <?php

                ?>

            </div>
        </div>

        <form id="sendMessage" data-interlocutor="" action="" method="post">
            <div class="messages__input-area">
                <input class="messages__input" autocomplete="off" name="message" type="text">
                <button class="messages__submit">
                    <span class="material-icons ">
                        send
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

// start js

let msgsWindow = document.getElementById("messages");
let dragBtn = document.getElementById("dragBtn");
let closeBtn = document.getElementById("closeBtn");
let resizeBtn = document.getElementById("resizeBtn");
let sendMessage = document.getElementById("sendMessage");
let messages__chat = document.querySelector('.messages__chat');


dragBtn.onmousedown = (e) => { //отвечает за перетаскивание положение блока
    e.preventDefault();
    let winWidth = msgsWindow.offsetWidth;
    this.onmousemove = (e) => {
        msgsWindow.style.left = (e.clientX - winWidth / 2) + "px";
        msgsWindow.style.top = (e.clientY - 8) + "px";
    }
}
window.onmouseup = (e) => {
    this.onmousemove = (e) => null;
};
closeBtn.onclick = () => msgsWindow.style.display = "none"; //прячет блок при клике на крестик

resizeBtn.onmousedown = (e) => { //отвечает за изменени размера блока
    e.preventDefault();
    let startX = e.clientX
    let startY = e.clientY
    let width = msgsWindow.offsetWidth;
    let height = msgsWindow.offsetHeight;
    this.onmousemove = (e) => {
        msgsWindow.style.width = (width + (e.clientX - startX)) + "px";
        msgsWindow.style.height = (height + (e.clientY - startY)) + "px";
    }
}

let contacts = document.querySelector(".messages__list");

contacts.onclick = (e) => {
    let userID
    if (e.target.className === "messages__item") {
        userID = e.target.dataset.contactid;
        sendMessage.dataset.interlocutor = userID;
    } else {
        userID = e.target.parentElement.dataset.contactid;
        sendMessage.dataset.interlocutor = userID;
    }
    refreshChat();
}

sendMessage.onsubmit = (e) => {
    let input = sendMessage.elements.message;
    e.preventDefault();
    let data = {
        interlocutorID: sendMessage.dataset.interlocutor,
        text: input.value
    }
    data = JSON.stringify(data);

    let XHR = useAJAX("/PHP_logic/sendMessage.php", `message=${data}`);

    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            try {
                messages__chat.innerHTML = XHR.responseText;
                messages__chat.scrollTop = messages__chat.scrollHeight;
            } catch (error) {
                alert('Возникла не предвиденная ошибка при отображении сообщений\n');
            }
        }
    }

    input.value = '';
}

window.setInterval(refreshChat, 3000);

function refreshChat() {
    if (sendMessage.dataset.interlocutor === '' || msgsWindow.style.display === "none") {
        return
    }
    let beeforeMessegesLength = messages__chat.children.length;
    let XHR = useAJAX("/PHP_logic/showMesseges.php", `id=${sendMessage.dataset.interlocutor}`);

    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            try {
                if (messages__chat.innerHTML === XHR.responseText) {
                    return
                }
                else {
                    messages__chat.innerHTML = XHR.responseText;
                    let afterMessegesLength = messages__chat.children.length;
                    if (beeforeMessegesLength === afterMessegesLength) {
                        return
                    }
                    else {
                        messages__chat.scrollTop = messages__chat.scrollHeight;;
                    }

                }
            } catch (error) {
                alert('Возникла не предвиденная ошибка при отображении сообщений\n');
            }
        }
    }
}
<?php
function getContactsID($myID, $DB)
{
    $sql = "SELECT `contacts` FROM `users` WHERE `id`=$myID";
    $request = $DB->query($sql);
    $response = $request->fetch_assoc();
    $response['contacts']?$contactsArr = unserialize($response['contacts']):$contactsArr= array();
        
    return $contactsArr;
}


?>
