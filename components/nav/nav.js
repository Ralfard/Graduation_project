let navMenu = document.querySelectorAll('.nav');
let body = document.querySelector('body');
// let main= document.querySelector('.main');

let path=document.location.pathname.split('/');
path=path[path.length-1];

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

navBurgerBtn.onclick = showOrHide_nav;
bottomLayer.onclick = showOrHide_nav;


var navBolleanMobile = false;

headerBurgerBtn.onclick = showOrHide_nav;
window.onresize = function(){
    if(window.screen.width < 992){
        navMenu[1].style.display = 'none';
        middleContent.style.gridTemplateColumns='1fr';
    }
    else if (window.screen.width > 992){
        navMenu[1].style.display = 'block';
        middleContent.style.gridTemplateColumns='220px 1fr 320px';
    }
};

function showOrHide_nav() {
    if ((window.screen.width > 1200) && (navMenu[1].style.display===''|| navMenu[1].style.display==='block')&&(path==='profile.php')) {
        navMenu[1].style.display = 'none';
        middleContent.style.gridTemplateColumns='1fr';
        return
    }
    else if ((window.screen.width > 1200) && ( navMenu[1].style.display==='none')&&(path==='profile.php')) {
        navMenu[1].style.display = 'block';
        middleContent.style.gridTemplateColumns='220px 1fr ';
        return
    }
    if (navBolleanMobile && window.screen.width < 992) {
        navMenu[0].style.display = 'none';
        bottomLayer.style.display = 'none';
        navBolleanMobile =! navBolleanMobile;
        fixedScroll.enabledScroll();
        return
    }
    else if (!navBolleanMobile  && window.screen.width < 992) {
        navMenu[0].style.display = "block";
        bottomLayer.style.display = 'block';
        navBolleanMobile =! navBolleanMobile;
        fixedScroll.disabledScroll();
        return
    }
    if ((window.screen.width > 992) && (navMenu[1].style.display===''|| navMenu[1].style.display==='block')) {
        navMenu[1].style.display = 'none';
        middleContent.style.gridTemplateColumns='1fr 320px';
        return
    }
    else if ((window.screen.width > 992) && ( navMenu[1].style.display==='none')) {
        navMenu[1].style.display = 'block';
        middleContent.style.gridTemplateColumns='220px 1fr 320px';
        return
    }
    
}








