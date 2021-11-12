function favorite_like_call(id){
    var url = document.getElementById(id).style.backgroundImage;
    console.log(url.substring(5, url.length-2));
    if (url.substring(5, url.length-2)=='./img/icon-like.svg'){
        console.log("1");
        document.getElementById(id).style.backgroundImage = "url('./img/icon-like-active.svg')";
    }
    else {
        console.log("2");
        document.getElementById(id).style.backgroundImage = "url('./img/icon-like.svg')";
    }
}