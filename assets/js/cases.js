$(document).ready(function(){
    $('.loop').owlCarousel({
        center          : true,
        loop            : true,
        autoplay        : true,
        autoplayTimeout : 5000,
        items           : 3,
        margin          : 10,
        /*responsive      : { 0: { items:1 }, 400: { items:3 }, 600: { items:3 } }*/
    });
});