/**
 ** Slider -start
 */

jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        var sticky = $('.sticky'),
                scroll = $(window).scrollTop();
        if (scroll >= 300)
            sticky.addClass('fixed');
        else
            sticky.removeClass('fixed');
    });
    new WOW().init();
//Menu toggle
    $('.menu-tigger').on('click', function () {
        $(this).toggleClass('button-tigger');
        $('nav').toggleClass('res-menu');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let splideElements = document.querySelectorAll("#partnersCarousel");

    splideElements.forEach(function (element) {
        let splide = new Splide(element, {
            type: "loop",
            perPage: 6,
            gap: "30px",
            arrows: false,
            pagination: true,
            breakpoints: {
                1200: {
                    perPage: 3,
                },
                 768: {
                    perPage: 2,
                },
            },
        });

        splide.mount();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let splideElements = document.querySelectorAll("#clients-review-splide");

    splideElements.forEach(function (element) {
        let splide = new Splide(element, {
            type: "loop",
            perPage: 1,
            gap: "30px",
            arrows: true,
            pagination: true,
            breakpoints: {
                1200: {
                    perPage: 1,
                    gap: "0"
                }
            }
        });

        splide.mount();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let splideElements = document.querySelectorAll("#engagements-splide");
    splideElements.forEach(function (element) {
        let splide = new Splide(element, {
            type: "loop",
            perPage: 1,
            gap: "30px",
            pagination: true,
            breakpoints: {
                1200: {
                    perPage: 2,
                    gap: "10px"
                },
                 768: {
                    perPage: 1,
                },
            }
        });
        splide.mount();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let splideElements = document.querySelectorAll("#aboutgallery");

    splideElements.forEach(function (element) {
        let splide = new Splide(element, {
            type: "loop",
            perPage: 2,
            pagination: true
//            breakpoints: {
//                776: {
//                    perPage: 1,
//                    gap: "0"
//                }
//            }
        });

        splide.mount();
    });
});

