
let btns_for_change_menu = document.getElementsByClassName('log-in__change-form');



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

login.onclick = show_or_CloseModalWindow;
closeModalWindow.onclick = show_or_CloseModalWindow;







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