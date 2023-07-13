let editor = document.getElementById('editor');
let form = document.getElementById('addArticle');
let preview = document.getElementById('preview');


function addHeader2() {
    editor.insertAdjacentHTML('beforeend', "<div class='flex-row'><textarea class='editorjs__inputs article__content-h2' form='addArticle' name='input_h2'></textarea><div class='close-icon__wrapper'><img class='img__cover' src='/images/close.svg' alt=''></div></div>");
}
function addHeader3() {
    editor.insertAdjacentHTML('beforeend', "<div class='flex-row'><textarea class='editorjs__inputs article__content-h3' form='addArticle' name='input_h3'></textarea><div class='close-icon__wrapper'><img class='img__cover' src='/images/close.svg' alt=''></div></div>");
}
function addParagrath() {
    editor.insertAdjacentHTML('beforeend', "<div class='flex-row'><textarea class='editorjs__inputs article__content-p' form='addArticle' name='input_text'></textarea><div class='close-icon__wrapper'><img class='img__cover' src='/images/close.svg' alt=''></div></div>");
}
function addImg() {
    editor.insertAdjacentHTML('beforeend', "<div class='flex-column'><input class='input__content-img' form='addArticle' type='file' name='input_img' onchange='handleFiles(event)'><div class='close-icon__wrapper'><img class='img__cover' src='/images/close.svg' alt=''></div><img src='' class='img__cover'></div>");
}



let toolbar = document.getElementById('toolbar');
toolbar.onclick = function (e) {
    if (e.target === toolbar.children[0].children[0]) {
        addHeader2();
    }
    else if (e.target === toolbar.children[1].children[0]) {
        addHeader3();
    }
    else if (e.target === toolbar.children[2].children[0]) {
        addParagrath();
    }
    else if (e.target === toolbar.children[3].children[0]) {
        addImg();
    }

}

editor.onclick = function (e) {
    let src = e.target.src == undefined ? false : e.target.src.endsWith('close.svg');
    if (src) {
        e.target.parentElement.parentElement.remove();
    }
}


function handleFiles(event) {
    const files = event.target.files;
    const countFiles = files.length;
    if (!countFiles) {
        alert('Не выбран файл!');
        return;
    }
    const selectedFile = files[0];
    if (!/^image/.test(selectedFile.type)) {
        alert('Выбранный файл не является изображением!');
        return;
    }
    const img = event.target.parentElement.lastChild;
    const reader = new FileReader();
    reader.readAsDataURL(selectedFile);
    reader.addEventListener('load', (event) => {
        img.src = event.target.result;
        img.alt = selectedFile.name;
        img.className = 'img__cover';
    });
    event.target.parentElement.appendChild(img);
}
let preview__field=document.getElementById('preview__field');

form.onsubmit = (e) => {
    e.preventDefault();
    preview__field.innerHTML='';
    let inputs= form.querySelectorAll("[form='addArticle']");
    for (const i of inputs) {
        if(i.className.endsWith('article__content-p')){
            preview__field.insertAdjacentHTML('beforeend', `<div class='flex-row'><p class='article__content-p'>${i.value}</p></div>`);
        }
        else if(i.className.endsWith('article__content-h2')){
            preview__field.insertAdjacentHTML('beforeend', `<div class='flex-row'><h2 class='article__content-h2'>${i.value}</h2></div>`);
        }
        else if(i.className.endsWith('article__content-h3')){
            preview__field.insertAdjacentHTML('beforeend', `<div class='flex-row'><h3 class='article__content-h3'>${i.value}</h3></div>`);
        }
        else if(i.className.endsWith('article__content-h1')){
            preview__field.insertAdjacentHTML('beforeend', `<div class='flex-row'><h1 class='article__content-h1'>${i.value}</h1></div>`);
        }
        else if(i.className.endsWith('input__content-img')){
            preview__field.insertAdjacentHTML('beforeend', `<img src='' class='img__cover'>`);
        }
    }
    form.onsubmit;
    return true;
}

let previewON=document.getElementById('previewON');
let previewOOF=document.getElementById('previewOOF');


previewON.onclick=function(){
    editor.style.display='none';
    preview.style.display='block';
}
previewOOF.onclick=function(){
    preview.style.display='none';
    editor.style.display='block';
}
