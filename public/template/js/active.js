// const { Alert } = require("bootstrap");

$("#but_Annuler").hide();
(function ($) {
    'use strict';

    var $window = $(window);

    // :: Nav Active Code
    if ($.fn.classyNav) {
        $('#essenceNav').classyNav();
    }

    // :: Sliders Active Code
    if ($.fn.owlCarousel) {
        $('.popular-products-slides').owlCarousel({
            items: 4,
            margin: 30,
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        });
        $('.product_thumbnail_slides').owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: true,
            navText: ["<img src='img/core-img/long-arrow-left.svg' alt=''>", "<img src='img/core-img/long-arrow-right.svg' alt=''>"],
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000
        });
    }

    // :: Header Cart Active Code
    var cartbtn1 = $('#essenceCartBtn');
    var cartOverlay = $(".cart-bg-overlay");
    var cartWrapper = $(".right-side-cart-area");
    var cartbtn2 = $("#rightSideCart");
    var cartOverlayOn = "cart-bg-overlay-on";
    var cartOn = "cart-on";

    cartbtn1.on('click', function () {
        cartOverlay.toggleClass(cartOverlayOn);
        cartWrapper.toggleClass(cartOn);
    });
    cartOverlay.on('click', function () {
        $(this).removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });
    cartbtn2.on('click', function () {
        cartOverlay.removeClass(cartOverlayOn);
        cartWrapper.removeClass(cartOn);
    });


    // :: ScrollUp Active Code
    if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1000,
            easingType: 'easeInOutQuart',
            scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
        });
    }

    // :: Sticky Active Code
    $window.on('scroll', function () {
        if ($window.scrollTop() > 0) {
            $('.header_area').addClass('sticky');
        } else {
            $('.header_area').removeClass('sticky');
        }
    });

    // :: Nice Select Active Code
    if ($.fn.niceSelect) {
        $('select').niceSelect();
    }

    // :: Slider Range Price Active Code
    $('.slider-range-price').each(function () {
        var min = jQuery(this).data('min');
        var max = jQuery(this).data('max');
        var unit = jQuery(this).data('unit');
        var value_min = jQuery(this).data('value-min');
        var value_max = jQuery(this).data('value-max');
        var label_result = jQuery(this).data('label-result');
        var t = $(this);
        $(this).slider({
            range: true,
            min: min,
            max: max,
            values: [value_min, value_max],
            slide: function (event, ui) {
                var result = label_result + " " + unit + ui.values[0] + ' - ' + unit + ui.values[1];
                console.log(t);
                t.closest('.slider-range').find('.range-price').html(result);
            }
        });
    });

    // :: Favorite Button Active Code
    var favme = $(".favme");

    favme.on('click', function () {
        $(this).toggleClass('active');
    });

    favme.on('click touchstart', function () {
        $(this).toggleClass('is_animating');
    });

    favme.on('animationend', function () {
        $(this).toggleClass('is_animating');
    });

    // :: Nicescroll Active Code
    if ($.fn.niceScroll) {
        $(".cart-list, .cart-content").niceScroll();
    }

    // :: wow Active Code
    if ($window.width() > 767) {
        new WOW().init();
    }

    // :: Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // :: PreventDefault a Click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

})(jQuery);

// javascript
// function f() {
//         var ck = document.getElementById("ck1");
//         var txt = document.getElementsByClassName("txt11");
//         if (ck.checked) {
//             for (var i = 0; i < txt.length; i++) {
//                 txt[i].value = "";
//             }
//         }
//     }

   

//jquery

 





/////////////////////////////////////////////////////////////////
// function readURL(input) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 $(input).next().attr('src', e.target.result);
//             }

//             reader.readAsDataURL(input.files[0]);
//         }
//         else
//             $(input).next().attr('src', "");
//     }


// $("#but_OK").click(function () {
//     var num = $("#num").val();
//     if (!isNaN(num)) {
//         for (var i = 0; i < Number(num); i++)
//             $("#divvv").html($("#divvv").html() + "<input type='file' class='clas1234' /><img class='clas2' /><br />");
//         $("#divv").hide();
//         $("#but_Annuler").show();

//         $(".clas1234").change(function () {
//             readURL(this);
//         });

//         $(".clas2").click(function () {
//             $(this).addClass("clas3");
            
//         });


//         var clas2 = $(".clas2");
//         $(document.body).click(function (e) {
//             if (!$(e.target).is(clas2) && !$.contains(clas2[0], e.target)) {
//                 $(".clas2").removeClass("clas3");
//             }
            
//         });
//     }
// });



// $("#but_Annuler").click(function () {
//     $("#divvv").html("");
//     $("#divv").show();
//     $("#but_Annuler").hide();
// });

paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill',
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: Number(document.getElementById("hidden").value)/10,
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("success-payment")
        })
    },
    onCancel: function (data) {
        window.location.replace("cancel-payment")
    }
}).render('#paypal-payment-button');


//filter
 function range(){
      document.getElementById('rangeInput').value =  document.getElementById('range').innerHTML;
    
 }