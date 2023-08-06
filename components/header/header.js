
let openChat = document.getElementById('openChat')!==null?document.getElementById('openChat'):'';
let scriptMeseges=document.getElementById('scriptMeseges');


openChat.onclick = (e) => {
    let XHR = useAJAX('/components/messages/messages.php');
    XHR.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            try {
                let response=XHR.responseText;
                let indexHTML=response.indexOf('<style>');
                let html=response.slice(indexHTML);
                let js=response.slice(0, indexHTML)
                body.insertAdjacentHTML('afterbegin', html)
                scriptMeseges.innerHTML=js;
            }
            catch (error) {
                console.log(error);
            }
        }
    }
}