
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