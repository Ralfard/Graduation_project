let addComentForm = document.getElementById('addComentForm');

addComentForm.onsubmit = (e) => {
    e.preventDefault();
    let articleID=document.querySelector('[data-id]').dataset.id;
    let data = {
        article: articleID,
        text:addComentForm.textArea.value,
    }

    let XHR=useAJAX("/PHP_logic/add-comment/add-comment.php",`data=${JSON.stringify(data)}`);

    let comentsList=document.querySelector('.comentsList');
    XHR.onreadystatechange=function(){
        if(this.readyState=== 4 && this.status===200){
            try {
                if(XHR.responseText===12){
                    alert('"Только авторизованные пользователи могут оставлять коментарии."');
                }else{
                comentsList.innerHTML=XHR.responseText;
                console.log(XHR.responseText);
                addComentForm.textArea.value='';
                }
            } catch (error) {
                alert('Возникла не предвиденная ошибка при отправке коментария\n');
            }
        }
    }
}