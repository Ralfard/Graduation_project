
let btns_for_change_menu = document.getElementsByClassName('log-in__change-form');
let btns_for_login = document.getElementsByClassName('loginBtn_forJS');


var fixedScroll = {
    disabledScroll() {
        document.body.style.cssText = `
            overflow:hidden;
            possition:fixed;
            top:0;
            left:0;
            height:100vh;
            width:100vw;
            `;
    },
    enabledScroll() {
        document.body.style.cssText = ``;
    }
}


let booleanModalWindow = false;

for (i = 0; i < btns_for_login.length; ++i) {
    btns_for_login[i].addEventListener("click", show_or_CloseModalWindow);
}


document.getElementById('closeModalWindow').onclick = show_or_CloseModalWindow;


// вешает на кнопки события
for (i = 0; i < btns_for_change_menu.length; ++i) {
    btns_for_change_menu[i].addEventListener("click", changeMenu);
}

function show_or_CloseModalWindow() {
    if (modalWindow.style.display === '' || modalWindow.style.display === 'none') {
        modalWindow.style.display = 'block';
        fixedScroll.disabledScroll();
    }
    else {
        modalWindow.style.display = 'none';
        fixedScroll.enabledScroll();
    }
}


function changeMenu() {
    if (registrationFormMobile.style.display === 'none') {
        registrationFormMobile.style.display = 'block';
        authorizationFormMobile.style.display = 'none';
    }
    else if (authorizationFormMobile.style.display === 'none') {
        registrationFormMobile.style.display = 'none';
        authorizationFormMobile.style.display = 'block';
    }
}


// асинхронная авторизация

let XHR = new XMLHttpRequest;

XHR.open("POST", "<?php echo $_SERVER['REQUEST_SCHEME']; ?>://<?php print($_SERVER['HTTP_HOST']); ?>/PHP_logic/autorization/autorization.php")
XHR.onreadystatechange = function () {
    console.log(XHR.readyState);
    console.log(XHR.status);
    if (this.readyState === 4 && this.status === 200) {
        console.log(XHR.response);
        
    }
}
XHR.send();

