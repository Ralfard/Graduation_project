let profile__wallpaper = document.querySelector('.profile__wallpaper');

if (screen.width < 640) {
    profile__wallpaper.style.height = screen.width * 0.40 + 'px';
}
else if (screen.width > 640 && screen.width < 992) {
    profile__wallpaper.style.height = screen.width * 0.32 + 'px';
}
else {
    profile__wallpaper.style.height = screen.width * 0.25 + 'px';
}

window.onresize = function () {
    if (screen.width < 640) {
        profile__wallpaper.style.height = screen.width * 0.40 + 'px';
    }
    else if (screen.width > 640 && screen.width < 992) {
        profile__wallpaper.style.height = screen.width * 0.32 + 'px';
    }
    else {
        profile__wallpaper.style.height = screen.width * 0.25 + 'px';
    }
}