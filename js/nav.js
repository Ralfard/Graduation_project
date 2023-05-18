let navMenu = document.querySelectorAll('.nav');
let body = document.querySelector('body');

const fixedScroll={
    disabledScroll(){
        document.body.style.cssText=`
        overflow:hidden;
        possition:fixed;
        top:0;
        left:0;
        height:100vh;
        width:100vw;
        `;
    },
    enabledScroll(){
        document.body.style.cssText=``;
    }
}

navBurgerBtn.onclick = hideNav;
bottomLayer.onclick = hideNav;

headerBurgerBtn.onclick = showNav;


function hideNav(){
    navMenu[0].style.display = 'none';
    bottomLayer.style.display = 'none';
    fixedScroll.enabledScroll();
}
function showNav() {
    navMenu[0].style.display = "block";
    bottomLayer.style.display = 'block';
    fixedScroll.disabledScroll();
}

document.onclick=function(event){
    console.log(event.target);
}
