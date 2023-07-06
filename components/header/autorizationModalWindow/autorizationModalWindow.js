
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

// let autorizationForm=document.getElementById('authorizationFormMobile');
let autorizationErrorText = document.getElementById('autorizationErrorText');

function checkForm(event) {
    event.preventDefault();
    let userMail = autorizationForm.elements.email_aut.value;
    let userPass = autorizationForm.elements.password_aut.value;
    
    if (userMail.length < 3 || userPass.length < 3) {
        autorizationErrorText.innerText = "Не коректная длинна пароля или адреса";
        return false;
    }

    let XHR = createAJAXObject();


    XHR.open("POST", "PHP_logic/autorization/autorization.php");
    XHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XHR.send('email_aut=' + userMail + '&password_aut=' + userPass);

    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (XHR.responseText == 1) {
                document.location.reload();
            } else {
                autorizationErrorText.innerText = XHR.responseText;
            }
            return true
        }

    }


}



// создает кросбраузерный AJAX объект
function createAJAXObject() {
    let ajax = null;
    try {
        ajax = new XMLHttpRequest();
    } catch (e) {
        try {//for new IE
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                alert("AJAX не поддерживается вашим браузером!")
                return false;
            }
        }
    }
    return ajax;
}





