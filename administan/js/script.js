let changeableArea = document.getElementById('changeableArea');


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


function useResponseAJAX(obj) {
    obj.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            try {
                changeableArea.innerHTML = obj.responseText;
            } catch (error) {
                alert(error);
            }
        }
    }
}



function manageRights(e) {
    let obj = {
        id: +e.target.parentElement.parentElement.children[0].innerText,
        typeRights: e.target.name,
        toggle: null
    }
    try {
        if (e.target.checked === true) {
            obj.toggle = 1;
        }
        else {
            obj.toggle = 0;
        }
        let request = JSON.stringify(obj);
        let XHR = useAJAX('/administan/php/changeRights.php', `data=${request}`);
    } catch (error) {
        alert(error);
    }
}

function approve_or_reject(e) {
    let obj = {
        id: +e.target.parentElement.parentElement.children[1].innerText,
        action: e.target.dataset.action,
    }
    try {
        let request = JSON.stringify(obj);
        let XHR = useAJAX('/administan/php/checkArticle.php', `data=${request}`);
        let refresh = useAJAX('/administan/components/contentModeration/contentModeration.php')
        useResponseAJAX(refresh);
    } catch (error) {
        alert(error);
    }
}

function deleteRow(e) {
    let boolean = confirm('Вы уверены что хотите удалить этого пользователя? \nДанные будут без возвратно удалены!');
    if (boolean) {
        let obj = {
            id: +e.target.parentElement.parentElement.children[0].innerText,
            table: e.target.dataset.table
        }
        try {
            let json = JSON.stringify(obj);
            let XHR = useAJAX('/administan/php/deleteRow.php', `data=${json}`);
            let refresh = useAJAX('/administan/components/usersList/usersList.php')
            useResponseAJAX(refresh);
        } catch (error) {
            alert(error)
        }
    }
}
