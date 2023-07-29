let msgsWindow = document.getElementById('messages');
let dragBtn = document.getElementById('dragBtn');
let closeBtn = document.getElementById('closeBtn');
let resizeBtn = document.getElementById('resizeBtn');

dragBtn.onmousedown = (e) => {//отвечает за перетаскивание положение блока
    e.preventDefault();
    let winWidth = msgsWindow.offsetWidth;
    this.onmousemove = (e) => {
        msgsWindow.style.left = (e.clientX - winWidth / 2) + 'px';
        msgsWindow.style.top = (e.clientY - 8) + 'px';
    }
}
window.onmouseup = (e) => {
    this.onmousemove = (e) => null;
};
closeBtn.onclick = () => msgsWindow.style.display = 'none';//прячет блок при клике на крестик

resizeBtn.onmousedown = (e) => {//отвечает за изменени размера блока
    e.preventDefault();
    let startX = e.clientX
    let startY = e.clientY
    let width = msgsWindow.offsetWidth;
    let height = msgsWindow.offsetHeight;
    this.onmousemove = (e) => {
        console.log(`${startX}, ${startY}`);
        msgsWindow.style.width = (width + (e.clientX - startX)) + 'px';
        msgsWindow.style.height = (height + (e.clientY - startY)) + 'px';
    }
}
