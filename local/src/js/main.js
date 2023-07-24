//@prepros-prepend jquery_min.js
//@prepros-prepend function.js
//@prepros-prepend topmenu.js


var $window = $(window);
var $header = $('header nav');
var winW, winH, footerH, bodyH, scrollTop;
var srtop = 0;

$(function () {
    window.setTimeout(function () {
        $('body').addClass('fade-in');
    }, 800);
    //scroll animation
    window.setTimeout(function () {
        $('header').addClass('animated');
        $('.pgkv,.banner').addClass('animated');
    }, 1200);
    window.setTimeout(function () {
        $window.resize();
        $window.on('scroll', revealOnScroll);
        revealOnScroll();
    }, 2000);
    $("#topBtn").click(function () {
        $("html,body").animate({ scrollTop: 0 }, 1000);
        return false;
    });
    //mobile menu
    var menuicon = $('header .menuicon'),
        navBox = $('header .mmenu'),
        nav = $('header .navBox'),
        $body = $('body');
    $header = $('header');
    menuicon.on('click', function () {
        var $this = $(this);
        if (!$header.hasClass('menu-expanded')) {
            $header.addClass('menu-expanded');
            nav.stop().fadeIn();
        } else {
            $header.removeClass('menu-expanded');
            nav.stop().fadeOut(function () {
                $(this).removeAttr('style');
            });
        }
        return false;
    });
    $('a.hasmenu').on('click', function () {
        var $this = $(this).parent();
        if ($this.hasClass('in-active')) {
            $this.toggleClass('in-active');
        } else {
            $('ul.mmenu > li').removeClass('in-active');
            $this.addClass('in-active');
        }
        return false;
    });
    $window.on('resize', function () {
        winW = $window.width();
        winH = $window.height();
        footerH = $('footer').outerHeight(true);
        if ($('#index').length < 1) {
            bodyH = winH - footerH;
        }
        //bodyH
        $('#Wapper').css('min-height', bodyH);
        srtop = 150;
        if (winW < 576) {
            srtop = 100;
        }
    }).resize();
    $window.on('scroll', function () {
        scrollTop = $(this).scrollTop();
        gotopfun(scrollTop);
    }).scroll();
    const swiper = new Swiper('.swiper', {
        speed: 200,
        effect: "fade",
        autoplay: {
            delay: 500,
            disableOnInteraction: false
        },
    });
});

