<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//前言
$query = "SELECT e_ctext,e_mtext FROM `essay` WHERE e_id = 8";
$info_data = sql_data($query, $link, 1);


//客戶實績
$query = "SELECT c_id,c_city,c_tag,c_title,c_img,c_stext FROM `casestudy` WHERE c_status = 1 ORDER BY c_order";
$data = sql_data($query, $link, 2, "c_id");

$link = null;
$title_var =  "客戶實績 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/casestudy.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="4">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>

        <div class="wrapper">
            <ul class="breadcrumb">
                <li><a href="./">HOME</a></li>
                <li>></li>
                <li>客戶實績</li>
            </ul>
            <div class="sr_name">
                <p class="title_en">CASE STUDY</p>
                <span class="title_line">_</span>
                <h1 class="read_jp">客戶實績</h1>
            </div>


            <div class="editor_content">
                <div class="editor_box pc_use">
                    <?php echo html_decode($info_data["e_ctext"]); ?>
                </div>
                <div class="editor_box mo_use">
                    <?php echo ($info_data["e_mtext"] == "") ? html_decode($info_data["e_ctext"]) : html_decode($info_data["e_mtext"]); ?>
                </div>
            </div>

            <div class="casestudy-wrap">
                <?php foreach ($data as $k => $v) { ?>
                    <a href="./casestudy-detail.php?id=<?php echo $k; ?>">
                        <div class="case-cap"><?php echo $v["c_city"]; ?></div>
                        <div class="case-cap-cat"><?php echo $v["c_tag"]; ?></div>
                        <h3><?php echo $v["c_title"]; ?></h3>
                        <div class="case-img">
                            <img src="upload/<?php echo $v["c_img"]; ?>" alt="">
                        </div>
                        <p>
                            <?php echo $v["c_stext"]; ?>
                        </p>
                    </a>
                <?php } ?>
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
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
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