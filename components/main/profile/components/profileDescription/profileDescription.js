//уменьшает обои профиля что бы они не были слишком большими
let profile__wallpaper = document.querySelector('.profile__wallpaper');


window.addEventListener('load', resizeWallpaper);
window.addEventListener('resize', resizeWallpaper);
function resizeWallpaper () {
    console.log(arguments.callee.name);
    if (window.screen.width < 640) {
        profile__wallpaper.style.height = window.screen.width * 0.35 + 'px';
    }
    else if (window.screen.width > 640 && window.screen.width <= 1220) {
        profile__wallpaper.style.height = window.screen.width * 0.25 + 'px';
    }
    else if (window.screen.width > 1220 && window.screen.width <= 1540){
        profile__wallpaper.style.height = window.screen.width * 0.2 + 'px';
    }
    else if (window.screen.width > 1540){
        profile__wallpaper.style.height = window.screen.width * 0.15 + 'px';
    }
}