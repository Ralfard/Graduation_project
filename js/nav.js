let navMenu = document.querySelectorAll('.nav');
let body = document.querySelector('body');
let main= document.querySelector('.main');

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



navBurgerBtn.onclick = showOrHide_nav;
bottomLayer.onclick = showOrHide_nav;


var navBolleanMobile = false;

headerBurgerBtn.onclick = showOrHide_nav;
window.onresize = function(){
    if(window.screen.width < 992){
        navMenu[1].style.display = 'none';
        main.style.gridTemplateColumns='1fr';
    }
    else if (window.screen.width > 992){
        navMenu[1].style.display = 'block';
        main.style.gridTemplateColumns='220px 1fr 320px';
    }
};

function showOrHide_nav() {
    if (navBolleanMobile && window.screen.width < 992) {
        navMenu[0].style.display = 'none';
        bottomLayer.style.display = 'none';
        navBolleanMobile =! navBolleanMobile;
        fixedScroll.enabledScroll();
    }
    else if (!navBolleanMobile  && window.screen.width < 992) {
        navMenu[0].style.display = "block";
        bottomLayer.style.display = 'block';
        navBolleanMobile =! navBolleanMobile;
        fixedScroll.disabledScroll();
    }
    if ((window.screen.width > 992) && (navMenu[1].style.display===''|| navMenu[1].style.display==='block')) {
        navMenu[1].style.display = 'none';
        main.style.gridTemplateColumns='1fr 320px';
    }
    else if ((window.screen.width > 992) && ( navMenu[1].style.display==='none')) {
        navMenu[1].style.display = 'block';
        main.style.gridTemplateColumns='220px 1fr 320px';
    }
}







