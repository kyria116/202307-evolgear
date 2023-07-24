<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/showroom.css">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
</head>

<body class="lang_tw" data-menu="3">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>
        <div class="wrapper">
            
        <ul class="breadcrumb">
            <li><a href="./">HOME</a></li>
            <li>></li>
            <li>展廳資訊</li>
        </ul>
        

            <!-- <div class="banner">
                <img src="dist/images/sponsorship-top-bg.jpg" alt="">
            </div> -->

            <!-- <h3>SPONSORSHIP</h3> -->
            <div class="sr_name">
                <p class="title_en">SHOWROOM</p>
                <span class="title_line">_</span>
                <h1 class="read_jp">展廳資訊</h1>
            </div>

            <div class="banner">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- 1920*900px -->
                        <img src="dist/images/sr_taiwan_01.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_02.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_03.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_04.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_05.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_06.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_07.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_08.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_09.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_10.jpg" />
                    </div>
                    </div>
                    <!-- <div class="swiper-button-next"></div> -->
                    <!-- <div class="swiper-button-prev"></div> -->
                </div>

                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_01.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_02.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_03.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_04.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_05.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_06.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_07.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_08.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_09.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="dist/images/sr_taiwan_10.jpg" />
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="show_info">
                <div class="s_access">
                    <p class="side_title_en">
                    SHOWROOM INFOMATION
                    </p>
                    <h2>展廳資訊指導</h2>
                </div>
                <div class="side_title_line"></div>

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
    //   autoplay: {
    //         delay: 2500,
    //         disableOnInteraction: false,
    //     },
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