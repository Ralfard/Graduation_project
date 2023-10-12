let saveProfileBtn = document.getElementById('saveProfile');
let preview_userName = document.querySelector('.profile__user-name');
let preview_description = document.querySelector('.profile__description-text');
let form = document.querySelector('[name="editProfile"]');



form.userName.oninput = () => preview_userName.innerText = form.userName.value;
form.description.oninput = e => {
    preview_description.innerText = form.description.value;
    resizeTextarea(e);
};



function handleFiles(e) {
    const wallpaper = document.querySelector('.profile__wallpaper').children[0];
    const avatar = document.querySelector('.profile__avatar').children[0];
    const countFiles = e.target.files.length;

    if (!countFiles) {
        alert('Не выбран файл!');
        return;
    }
    const selectedFile = e.target.files[0];
    if (!/^image/.test(selectedFile.type)) {
        alert('Выбранный файл не является изображением!');
        return;
    }
    const reader = new FileReader();
    reader.readAsDataURL(selectedFile);


    if (e.target.name === 'userAvatar') {
        reader.addEventListener('load', (event) => {
            avatar.src = event.target.result;
        });
    }
    else if (e.target.name === 'userWallpaper') {
        reader.addEventListener('load', (event) => {
            wallpaper.src = event.target.result;
        });
    }
    else alert("Возникла не предвиденная ошибка при загрузке изображений!");
}
 

