
//漢堡選單
$(document).ready(function(){

  const menu = $(".menu");
  let body = $('body');

    $(".hamburger").click(function(){
      $(this).toggleClass("is-active");

      menu.toggleClass("show");

      
      body.toggleClass("menuShow");

      let header = $('header');
      header.toggleClass("menu_show");

      if($(this).hasClass('show')){

      }else{
        $(".arrow").css("display", "none");
        $(".product-dropdown").css("display", "none");
        firstMenu.removeClass('noShow');;
      };

    });

    let firstMenu = $(".first-menu");
    let productDropdown = $(".product-dropdown");

    $(".menu-product").click(function(e){
      e.preventDefault();
      if ($(window).width() < 1237) { 
        $(".arrow").css("display", "block");
        productDropdown.css("display", "block");
        let firstMenu = $(".first-menu");
        firstMenu.toggleClass("noShow");
      }
      

    });

    let show = 0;
    let mouse_enterDropdown = false;

    $(".menu-product").mouseenter(function(){
      productDropdown.addClass('show');
    });


    $(".menu-product").mouseleave(function(){
      if (productDropdown.is(':hover')) {
          // alert('123');
      }else{
        productDropdown.removeClass('show');
        // alert('456');
      };
    });


    productDropdown.mouseleave(function(){
      if ($(".menu-product").is(':hover')) {

    }else{
      productDropdown.removeClass('show');

    };

    });


    

    

    $(".arrow").click(function(e){
      e.preventDefault();
      $(".arrow").css("display", "none");
      $(".product-dropdown").css("display", "none");
      firstMenu.toggleClass("noShow");
    });

    $(document).on("click", ".menu-h", function(e) {
      if ($(window).width() < 1237) {
        e.preventDefault();
        $(this).toggleClass("dropdownShow");
      }
    });

    $(window).resize(function() {
      if ($(window).width() > 1237) {
        $('header').removeClass('menu_show');
        body.removeClass('menuShow');
        // console.log('視窗');
        
        menu.removeClass('show');
        $(".hamburger").removeClass("is-active");
        $(".arrow").css("display", "none");
        // $(".product-dropdown").css("display", "none");
      }else{
        // alert('123');
      };

      
    });

    $('.thumbnails li').click(function() {
        // alert($(this).attr('src'));
         let changeImage = $(this).find('img').attr('src');

      $('.img-slider img').attr('src', changeImage);

      $('.thumbnails li').removeClass('active');
      $(this).addClass('active');
      
    });

    $('.casestudy-detail .img-wrapper').click(function() {
      // let changeImage = $(this).find('img').attr('src');
      // $('.casestudy-detail .main-photo img').attr('src', changeImage);
      $('.casestudy-detail .img-wrapper').removeClass('active');
      $(this).addClass('active');

      var index = $(this).index();
      // alert(index);

      $('.main-photo .img-wrapper').removeClass('active');
      $('.main-photo .img-wrapper').eq(index).addClass('active');


    });

    $('.item_open').click(function() {
      $('.download_list').toggleClass('active');
    });

    $('.corner .main').click(function(e) {
      e.preventDefault();
      $('.corner').toggleClass('active');
    });

    const menuValue = $("body").data("menu");

    $('.menu-index').eq(menuValue).addClass("pc-active");
});
