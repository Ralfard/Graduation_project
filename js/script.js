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
    if (path === 'myProfile.php' || path === 'userProfile.php' || path === 'my__edit-profile.php') {
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
    //для сайтов с широким блоком main
    if (path === 'myProfile.php' || path === 'userProfile.php' || path === 'my__edit-profile.php') {
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

    navMenu[1].style.display = 'none';
    aside ? aside.style.display = 'none' : false;
    // aside.style.display = 'none';
    middleContent.style.gridTemplateColumns = '1fr';
}
function grid_220_1fr() {

    navMenu[1].style.display = 'block';
    aside ? aside.style.display = 'none' : false;
    // aside.style.display = 'none';
    middleContent.style.gridTemplateColumns = '220px 1fr ';
}
function hide_mobile_menu() {

    navMenu[0].style.display = 'none';
    bottomLayer.style.display = 'none';
    fixedScroll.enabledScroll();
    return navBolleanMobile = !navBolleanMobile;
}
function show_mobile_menu() {

    navMenu[0].style.display = "block";
    bottomLayer.style.display = 'block';
    fixedScroll.disabledScroll();
    return navBolleanMobile = !navBolleanMobile;
}
function grid_220_1fr_320() {

    navMenu[1].style.display = 'block';
    aside ? aside.style.display = 'block' : false;
    middleContent.style.gridTemplateColumns = '220px 1fr 320px';
}
function grid_1fr_320() {

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


let bottomPanels_of_articles = document.getElementsByClassName('preview__bottom-panel');

let arr = [...bottomPanels_of_articles];

arr.forEach(elem => elem.onclick = function connect_buttons(e) {
    if (e.target.className.includes('likesBtn')) {
        let btnState = e.target.className.includes('like_active') ? true : false;
        let request = {
            id: e.target.dataset.id,
            btnState: btnState
        }
        let XHR = useAJAX('/PHP_logic/articles__likes/articles__likes.php', `data=${JSON.stringify(request)}`);
        XHR.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                try {
                    let response = JSON.parse(XHR.responseText);//превращаем ответ json в объект 

                    if (response.toggle === 1) {
                        e.target.classList.add('like_active');
                        e.target.nextElementSibling.innerText = response.count;
                    }
                    else if (response.toggle === -1) {
                        e.target.classList.remove('like_active');
                        e.target.nextElementSibling.innerText = response.count;
                    }
                } catch (error) {

                    alert(`Возникла непредвиденная ошибка\n${error}`);

                }
            }
        }
    }


    else if (e.target.className.includes('bookmarksBtn')) {
        let btnState = e.target.className.includes('bookmark_active') ? true : false;
        let request = {
            id: e.target.dataset.id,
            btnState: btnState
        }
        let XHR = useAJAX('/PHP_logic/articles__bookmarks.php', `data=${JSON.stringify(request)}`);
        XHR.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                try {
                    let response = JSON.parse(XHR.responseText);//превращаем ответ json в объект 
                    if (response.toggle === 1) {
                        e.target.classList.add('bookmark_active');
                    }
                    else if (response.toggle === -1) {
                        e.target.classList.remove('bookmark_active');
                    }
                } catch (error) {
                    alert(`Возникла непредвиденная ошибка\n${error}`);
                }
            }
        }
    }
});


//автоматическое увеличение высоты textarea блоков
function resizeTextarea(e) {
    let elem = e.target || e.srcElement;
    elem.style.height = 'auto';
    elem.style.height = Math.max(elem.scrollHeight, elem.offsetHeight) + "px";
}




















