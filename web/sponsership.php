<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//主視覺
$query = "SELECT i_img_c FROM `image` WHERE i_id = 2";
$banner_data = sql_data($query, $link, 1);

//sponsor
$query = "SELECT * FROM `sponsor` ORDER BY s_order";
$data = sql_data($query, $link);

//人物圖
$query = "SELECT i_id,related_id,i_img_c FROM `image` WHERE i_page = 4 AND i_id > 10 ORDER BY i_order";
$img_data = sql_data($query, $link, 3, "i_id", "related_id");

$link = null;
$title_var =  "健身代言 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/sponsership.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="2">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>
        <ul class="breadcrumb">
            <li><a href="./">HOME</a></li>
            <li>></li>
            <li>健身代言</li>
        </ul>
        <div class="wrapper">

            <div class="banner">
                <img src="upload/<?php echo $banner_data["i_img_c"]; ?>" alt="">
            </div>

            <h3>SPONSORSHIP</h3>
            <?php foreach ($data as $k => $v) { ?>
                <div class="content-in">
                    <div class="player-box">
                        <div class="pb-img">
                            <?php if ($img_data) { ?>
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($img_data[$k] as $k1 => $v1) { ?>
                                            <div class="swiper-slide banner1 swiper-banner"><img src="upload/<?php echo $v1["i_img_c"]; ?>" alt=""></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pb-status">
                            <div class="name-area">
                                <p class="name"><?php echo $v["s_title_tw"]; ?></p>
                                <p class="kana"><?php echo $v["s_title_en"]; ?></p>
                                <p class="award"><?php echo $v["s_stitle"]; ?></p>
                            </div>

                            <div class="profile-area">
                                <div class="tit">個人檔案</div>
                                <p class="text">
                                    <?php echo nl2br($v["s_ctext"]); ?>
                                </p>
                            </div>

                            <div class="history-area">
                                <p class="tit">主要戰績</p>
                                <div class="editor_content">
                                    <div class="editor_box"><?php echo html_decode($v["s_mtext"]); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
            spaceBetween: 30,
            // centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            speed: 4000,
            effect: "fade",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>