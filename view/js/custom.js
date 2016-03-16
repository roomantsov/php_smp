function appear(){
    var opacity = 0;
    var move = setInterval(function(){
        opacity += 0.035;
        document.body.style.opacity = opacity;
        if(opacity >= 1)
            clearInterval(move);
    });
}

setTimeout(function(){
    $(document).ready(function(){
        $('.error_box').fadeTo(1000, 0);
    });
}, 2000);