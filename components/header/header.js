
let msgIcon = document.getElementById('msgIcon') !== null ? document.getElementById('msgIcon') : '';
let scriptMeseges = document.getElementById('scriptMeseges');
let alreadyClicked = false;

msgIcon.onclick = (e) => {
    if (alreadyClicked === false) {
        let XHR = useAJAX('/components/messages/messages.php');
        XHR.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                try {
                    let response = XHR.responseText;
                    let indexOfJs = response.indexOf('// start js');
                    let html = response.slice(0, indexOfJs);
                    let js = response.slice(indexOfJs);
                    body.insertAdjacentHTML('afterbegin', html)
                    scriptMeseges.innerHTML = js;
                    alreadyClicked = true;
                }
                catch (error) {
                    console.log(error);
                }
            }
        }
    }
    else msgsWindow.style.display='block';
}
