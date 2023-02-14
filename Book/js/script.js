var $ = jQuery;
$('.category_slider_block').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 2,
    arrows: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 1008,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }

        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }

        }

    ]
});
$('.rated_block').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 2,
    arrows: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 1000,
    responsive: [{
            breakpoint: 1214,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            // for desktop
            breakpoint: 1640,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 1008,
            settings: {
                slidesToShow:1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }

        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }

        }

    ]
});

$('.feature_book_container').slick({
    infinite: true,
    slidesToShow:1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }

        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }

        }

    ]
});

$('.maybe_like_slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 1000,
    responsive: [{
            breakpoint: 1214,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            // for desktop
            breakpoint: 1640,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 1008,
            settings: {
                slidesToShow:1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 2
            }

        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }

        }

    ]
});

$(document).ready(function(){
    $('.category_filter').hide();
    $('h2.book_cat').click(function(){
        $('h2.book_cat').toggleClass('active-cat');
        $('.category_filter').slideToggle(500).show();
    });
    $('.publisher_filter').hide();
    $('.publisher_heading').click(function(){
        $('.publisher_heading').toggleClass('active-cat');
        $('.publisher_filter').slideToggle(500).show();
    });
    $('.get_year').hide();
    $('.book_year').click(function(){
        $('.book_year').toggleClass('active-cat');
        $('.get_year').slideToggle(500).show();
    })
})
