<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/companyprofile.css">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
</head>

<body class="lang_tw" data-menu="7">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>

    <div class="wrapper">

        <ul class="breadcrumb">
            <li><a href="./">HOME</a></li>
            <li>></li>
            <li>公司簡介</li>
        </ul>
        

            <!-- <div class="banner">
                <img src="dist/images/sponsorship-top-bg.jpg" alt="">
            </div> -->

            <!-- <h3>SPONSORSHIP</h3> -->
            <div class="sr_name">
                <p class="title_en">COMPANY PROFILE</p>
                <span class="title_line">_</span>
                <h1 class="read_jp">公司簡介</h1>
            </div>

            <div class="wrapper-2">
              <div class="editor_content">
                              <div class="editor_box pc_use">這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 </div>
                              <div class="editor_box mo_use">這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 </div>
                </div>
                
            </div>
            
            </div>
            
            <?php
            include "quote/template/sidebar.php";
        ?>
            
        
    </main>
    <?php
    include "quote/template/footer.php";
    // include "quote/template/top_btn.php";
    ?>
    
    <script src="dist/js/jquery_min.js"></script>
    <script src="dist/js/function.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
      spaceBetween: 5,
      slidesPerView: 'auto',
      loopedSlides:10,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      effect : 'fade',
        fadeEffect: {
            crossFade: true,
        },
      thumbs: {
        swiper: swiper,
      },
      allowTouchMove:false,
    });
    </script>
    <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>