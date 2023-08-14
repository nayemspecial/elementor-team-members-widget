jQuery(document).ready(function($) {
    $('.team-member-wrapper').slick({
        slidesToShow: 4, // Number of slides to show
        slidesToScroll: 1, // Number of slides to scroll
        autoplay: true, // Autoplay the slider
        dots: true,
        prevArrow: false,
        nextArrow: false,
        centerMode:true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

});
