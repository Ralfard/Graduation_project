
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
    if (registrationForm.style.display === 'none') {
        registrationForm.style.display = 'block';
        authorizationForm.style.display = 'none';
    }
    else if (authorizationForm.style.display === 'none') {
        registrationForm.style.display = 'none';
        authorizationForm.style.display = 'block';
    }
}

let autorizationErrorText = document.getElementById('autorizationErrorText');


// асинхронная авторизация
function asincAutorization(event) {
    event.preventDefault();
    let userMail = autorizationForm.elements.email_aut.value;
    let userPass = autorizationForm.elements.password_aut.value;
    checkFormLength(userMail, userPass);

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

// асинхронная регистрация
function asincRegistration(event) {
    event.preventDefault();

    let registrationForm = document.getElementById('registrationForm');
    let regName = registrationForm.elements.name_reg.value;
    let regMail = registrationForm.elements.email_reg.value;
    let regPass = registrationForm.elements.password_reg.value;

    if (!checkForm(regName, regMail, regPass)) {
        return false;
    }

    return false
}

function checkForm(name, mail, pass) {
    let ErrorText = document.getElementById('registrationErrorText');

    let nameRegExp = /[A-Za-z_0-9]{3,16}/;
    if (!nameRegExp.test(name)) {
        ErrorText.innerText = 'Введен не корректное имя пользователя';
        return false;
    } else {
        ErrorText.innerText = ""
    }
    let mailRegExp = /(\@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/;
    if (!mailRegExp.test(mail)) {
        ErrorText.innerText = 'Введен не корректный адрес электронной почты';
        return false;
    } else {
        ErrorText.innerText = ""
    }
    let passRegExp =/z/;
    if(!passRegExp.test(pass)) {
        ErrorText.innerText = 'Введен не корректный пароль';
        return false;
    } else {
        ErrorText.innerText = ""
    }

}

function checkFormLength(mail, pass) {
    if (mail.length < 3 || pass.length < 3) {
        autorizationErrorText.innerText = "Не коректная длинна пароля или адреса";
        return false;
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





