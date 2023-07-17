let aside = document.getElementById('aside') ? document.getElementById('aside') : false;
let navMenu = document.querySelectorAll('.nav');
let body = document.querySelector('body');

let path = document.location.pathname.split('/');
path = path[path.length - 1];


let navBolleanMobile = false;
let navBolleanDesctop = false;



var fixedScroll = {// отвечает за фиксацию скрола во время появления модального окна меню, после его закрытия скрол остается на том месте на котором остановился
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

let middleContent = document.getElementById('middleContent');



window.addEventListener('load', checkWidth);
window.addEventListener('resize', checkWidth);

//меняет положение колонок при изменении ширины окна
function checkWidth() {
    console.log(arguments.callee.name);
    if (path === 'myProfile.php') {
        if (window.screen.width <= 1220) {
            // navMenu[1].style.display = 'none';
            // aside.style.display = 'none';
            // middleContent.style.gridTemplateColumns = '1fr';
            grid_1fr();
        }
        else if (window.screen.width > 1220 && window.screen.width <= 1540) {
            if (navBolleanDesctop === false) {
                // navMenu[1].style.display = 'block';
                // aside.style.display = 'block';
                // middleContent.style.gridTemplateColumns = '220px 1fr 320px';
                grid_220_1fr();
            }
            else if (navBolleanDesctop !== false) {
                // aside.style.display = 'block';
                // middleContent.style.gridTemplateColumns = '1fr 320px';
                grid_1fr();
            }
            return navBolleanMobile = false;
        }
        else if (window.screen.width > 1540) {
            if (navBolleanDesctop === false) {
                // navMenu[1].style.display = 'block';
                // aside.style.display = 'block';
                // middleContent.style.gridTemplateColumns = '220px 1fr 320px';
                grid_220_1fr_320();
            }
            else if (navBolleanDesctop !== false) {
                // aside.style.display = 'block';
                // middleContent.style.gridTemplateColumns = '1fr 320px';
                grid_1fr_320();
            }
        }
    }
    else {
        if (window.screen.width < 992) {
            // navMenu[1].style.display = 'none';
            // middleContent.style.gridTemplateColumns = '1fr';
            grid_1fr();
        }
        if (window.screen.width > 992 && window.screen.width <= 1200) {
            if (navBolleanDesctop === false) {
                // navMenu[1].style.display = 'block';
                // aside.style.display = 'block';
                // middleContent.style.gridTemplateColumns = '220px 1fr 320px';
                grid_220_1fr();
            }
            else if (navBolleanDesctop !== false) {
                // aside.style.display = 'block';
                // middleContent.style.gridTemplateColumns = '1fr 320px';
                grid_1fr();
            }
            return navBolleanMobile = false;
        }
        if (window.screen.width > 1200) {
            if (navBolleanDesctop === false) {
                grid_220_1fr_320();
            }
            else if (navBolleanDesctop !== false) {
                grid_1fr_320();
            }
        }
    }
};

bottomLayer.onclick = show_Or_Hide_nav;
navBurgerBtn.onclick = show_Or_Hide_nav;
headerBurgerBtn.onclick = show_Or_Hide_nav;

// открывает\закрыват nav
function show_Or_Hide_nav() {
    console.log(arguments.callee.name);
    //для сайтов с широким блоком main
    if (path === 'myProfile.php') {
        if (window.screen.width > 1540) {
            if (navBolleanDesctop === false) {
                grid_1fr_320();
                return navBolleanDesctop = !navBolleanDesctop;
            }
            else if (navBolleanDesctop !== false) {
                grid_220_1fr_320();
                return navBolleanDesctop = !navBolleanDesctop;
            }
        }
        else if (window.screen.width > 1220 && window.screen.width <= 1540) {
            if (navBolleanDesctop === false) {
                grid_1fr();
                return navBolleanDesctop = !navBolleanDesctop;
            }
            else if (navBolleanDesctop !== false) {
                grid_220_1fr();
                return navBolleanDesctop = !navBolleanDesctop;
            }
        }
        else if (window.screen.width <= 1220) {
            if (navBolleanMobile === false) {
                show_mobile_menu();
            }
            else if (navBolleanMobile != false) {
                hide_mobile_menu();
            }
        }
    }
    //для сайтов с узким main 
    else {
        if (window.screen.width > 1200) {
            if (navBolleanDesctop === false) {
                grid_1fr_320();
                return navBolleanDesctop = !navBolleanDesctop;
            }
            else if (navBolleanDesctop !== false) {
                grid_220_1fr_320();
                return navBolleanDesctop = !navBolleanDesctop;
            }
        }
        else if (window.screen.width > 992 && window.screen.width <= 1200) {
            if (navBolleanDesctop === false) {
                grid_1fr();
                return navBolleanDesctop = !navBolleanDesctop;
            }
            if (navBolleanDesctop !== false) {
                grid_220_1fr();
                return navBolleanDesctop = !navBolleanDesctop;
            }
        }
        else if (window.screen.width <= 992) {
            if (navBolleanMobile === false) {
                hide_mobile_menu();
            }
            else if (navBolleanMobile !== false) {
                show_mobile_menu();
            }
        }
    }
}

//функции управления стилями 3-ёх основных столбцов
function grid_1fr() {
    console.log(arguments.callee.name);
    navMenu[1].style.display = 'none';
    aside ? aside.style.display = 'none' : false;
    // aside.style.display = 'none';
    middleContent.style.gridTemplateColumns = '1fr';
}
function grid_220_1fr() {
    console.log(arguments.callee.name);
    navMenu[1].style.display = 'block';
    aside ? aside.style.display = 'none' : false;
    // aside.style.display = 'none';
    middleContent.style.gridTemplateColumns = '220px 1fr ';
}
function hide_mobile_menu() {
    console.log(arguments.callee.name);
    navMenu[0].style.display = 'none';
    bottomLayer.style.display = 'none';
    fixedScroll.enabledScroll();
    return navBolleanMobile = !navBolleanMobile;
}
function show_mobile_menu() {
    console.log(arguments.callee.name);
    navMenu[0].style.display = "block";
    bottomLayer.style.display = 'block';
    fixedScroll.disabledScroll();
    return navBolleanMobile = !navBolleanMobile;
}
function grid_220_1fr_320() {
    console.log(arguments.callee.name);
    navMenu[1].style.display = 'block';
    aside ? aside.style.display = 'block' : false;
    middleContent.style.gridTemplateColumns = '220px 1fr 320px';
}
function grid_1fr_320() {
    console.log(arguments.callee.name);
    navMenu[1].style.display = 'none';
    aside ? aside.style.display = 'block' : false;
    middleContent.style.gridTemplateColumns = '1fr 320px';
}

function useAJAX(url, sendData = '', method = "POST") {
    let XHR = createAJAXObject();
    XHR.open(method, url)
    XHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XHR.responseType = "text";
    XHR.send(sendData);
    return XHR;
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















