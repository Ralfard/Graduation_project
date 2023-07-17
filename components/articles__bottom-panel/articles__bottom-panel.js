// useAJAX(url, sendData = '', method = "POST")
let one_bottomPanel=document.getElementsByClassName('preview__bottom-panel');

one_bottomPanel[0].onclick=function(e){
    // console.log(e.target.className);
    if(e.target.className.includes('likesBtn')){
        console.log('likesBtn');
    }
    else if(e.target.className.includes('comentsBtn')){
        console.log('comentsBtn');
    }
    else if(e.target.className.includes('bookmarksBtn')){
        console.log('bookmarksBtn');
    }
}