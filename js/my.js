$(document).scroll(function(e){
    var scrollTop = $(document).scrollTop();
    if(scrollTop > 90){
        $('.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');
    } else {
        $('.navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');
    }
});
