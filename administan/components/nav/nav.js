let navBtnsList = document.getElementById('navBtnsList');
let XHR
// window.onload = e => {
//     XHR = useAJAX('/administan/components/adminsList/adminsList.php');
//     useResponseAJAX(XHR);
// }

navBtnsList.onclick = (e) => {

    switch (e.target.innerText) {
        case 'АДМИНИСТРАТОРЫ':
            XHR = useAJAX('/administan/components/adminsList/adminsList.php');
            useResponseAJAX(XHR);
            break;
        case 'ПОЛЬЗОВАТЕЛИ':
            XHR = useAJAX('/administan/components/usersList/usersList.php');
            useResponseAJAX(XHR);
            break;
        // case 'ПОДДЕРЖКА':
        //     XHR = useAJAX('/administan/components/adminsList/adminsList.php');
        //     useResponseAJAX(XHR);
        //     break;
        case 'МОДЕРАЦИЯ СТАТЕЙ':
            XHR = useAJAX('/administan/components/contentModeration/contentModeration.php');
            useResponseAJAX(XHR);
            break;
        default:
            break;
    }
}

