$('#clientObjs').click(function(){
    if($(this).next().hasClass('show')){
        $(this).next().removeClass('show');
    } else {
        $(this).next().addClass('show');
    }    
});