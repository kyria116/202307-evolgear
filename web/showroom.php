<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//圖片
$query = "SELECT i_img_c FROM `image` WHERE i_page = 5 ORDER BY i_order";
$img_data = sql_data($query, $link);

//詳細資訊
$query = "SELECT * FROM `essay` WHERE e_id IN (7)";
$data = sql_data($query, $link, 1);

$link = null;
$title_var = "展廳資訊 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/showroom.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
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
            <div class="sr_name">
                <p class="title_en">SHOWROOM</p>
                <span class="title_line">_</span>
                <h1 class="read_jp">展廳資訊</h1>
            </div>

            <div class="banner">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <?php foreach ($img_data as $k => $v) { ?>
                            <div class="swiper-slide">
                                <img src="upload/<?php echo $v["i_img_c"]; ?>" />
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($img_data as $k => $v) { ?>
                            <div class="swiper-slide">
                                <img src="upload/<?php echo $v["i_img_c"]; ?>" />
                            </div>
                        <?php } ?>
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
                    <div class="editor_box pc_use"><?php echo html_decode($data["e_ctext"]); ?></div>
                    <div class="editor_box mo_use"><?php echo ($data["e_mtext"] == "") ? html_decode($data["e_ctext"]) : html_decode($data["e_mtext"]); ?></div>
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
            loopedSlides: 10,
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
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            thumbs: {
                swiper: swiper,
            },
            allowTouchMove: false,
        });
    </script>
    <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>