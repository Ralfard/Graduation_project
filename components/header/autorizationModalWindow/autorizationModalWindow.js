
let btns_for_change_menu = document.getElementsByClassName('log-in__change-form');
let btns_for_login = document.getElementsByClassName('loginBtn_forJS');

const registrationForm = document.getElementById('registrationForm');
const autForm=document.getElementById('autorizationForm');


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
        autorizationForm.style.display = 'none';
    }
    else if (autorizationForm.style.display === 'none') {
        registrationForm.style.display = 'none';
        autorizationForm.style.display = 'block';
    }
}



// асинхронная авторизация
autForm.onsubmit=function asincAutorization(event) {
    event.preventDefault();

    let autData = {
        userMail : autForm.elements.email_aut.value,
        userPass : autForm.elements.password_aut.value,
        errorText:document.getElementById('autorizationErrorText'),
    }
    checkFormLength(autData.userMail, autData.userPass);

    let XHR = createAJAXObject();

    XHR.open("POST", "/PHP_logic/autorization/autorization.php");
    XHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XHR.send('email_aut=' + autData.userMail + '&password_aut=' + autData.userPass);

    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (XHR.responseText == 1) {
                document.location.reload();
            } else {
                autData.errorText.innerText = XHR.responseText;
            }
            return true
        }
    }
}

// асинхронная регистрация
registrationForm.onsubmit=function asincRegistration(event) {
    event.preventDefault();

    let regData={
        regName : registrationForm.elements.name_reg.value,
        regMail : registrationForm.elements.email_reg.value,
        regPass : registrationForm.elements.password_reg.value,
        errorText:document.getElementById('registrationErrorText'),
    }

    if (!checkForm(regData.regName, regData.regMail, regData.regPass)) return false;

    let XHR = createAJAXObject();

    XHR.open('POST', "/PHP_logic/registration/registration.php");
    XHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XHR.send('name_reg='+regData.regName+'&email_reg='+regData.regMail+'&password_reg='+regData.regPass);

    XHR.onreadystatechange=function(){
        if (this.readyState === 4 && this.status === 200) {
            if (XHR.responseText == 1) {
                document.location.reload();
            } else {
                regData.errorText.innerText = XHR.responseText;
            }
            return true
        }
    }
    return true;
}

function checkForm(name, mail, pass) {
    let ErrorText = document.getElementById('registrationErrorText');

    let nameRegExp = /^[A-Za-zА-Яа-я_0-9]{3,20}$/;
    let mailRegExp = /(\@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/;
    let passRegExp = /^(?=.*\d)\w{6,20}$/m;

    if (!nameRegExp.test(name)) {
        ErrorText.innerText = 'Введен не корректное имя пользователя';
        return false;
    }
    else if (!mailRegExp.test(mail)) {
        ErrorText.innerText = 'Введен не корректный адрес электронной почты';
        return false;
    }
    else if (!passRegExp.test(pass)) {
        ErrorText.innerText = 'Введен не корректный пароль';
        return false;
    } else {
        ErrorText.innerText = ""
        return true;
    }

}

function checkFormLength(mail, pass) {
    if (mail.length < 3 || pass.length < 3) {
        autorizationErrorText.innerText = "Не коректная длинна пароля или адреса";
        return false;
    }
}







