jQuery(document).ready(function(){
    jQuery(".owl-carousel").owlCarousel({
        loop:true,
        margin:10,
        items:2,
        center:true,
        nav:true,
        dots:true,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash'
    });
});