<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
    $id = 1;
}

//三大系列產品
$query = "SELECT a_title,a_img,a_keyword,a_desc  FROM `article` WHERE a_id = $id";
$data = sql_data($query, $link, 1);

//圖片管理
$query = "SELECT i_img_c,i_img_m,i_url  FROM `image` WHERE i_page = 2 AND related_id = $id";
$banner_data = sql_data($query, $link);

//區塊說明
$query = "SELECT e_title,e_ctext,e_mtext,e_img AS e_template FROM `essay` WHERE e_page = 2 AND id = $id AND e_status = 1 ORDER BY e_order";
$essay_data = sql_data($query, $link);

//系列分類產品
$query = "SELECT pc_id,pc_title_tw,pc_title_en,pc_img FROM `p_class` WHERE ps_id = $id";
$pc_data = sql_data($query, $link, 2, "pc_id");


$link = null;
$title_var =  $data["a_title"] . " | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/product.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="1">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>
        <ul class="breadcrumb">
            <li><a href="./">HOME</a></li>
            <li>></li>
            <li><?php echo $data["a_title"]; ?></li>
        </ul>
        <div class="wrapper">
            <div class="banner">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($banner_data as $k => $v) { ?>
                            <div class="swiper-slide swiper-banner">
                                <a <?php echo ($v["i_url"] == "") ? '' : 'href="' . $v["i_url"] . '" target="_blank" '; ?>>
                                    <picture>
                                        <!-- PC : 2400*1080px -->
                                        <!-- MB : 740*1400px -->
                                        <source srcset="upload/<?php echo $v["i_img_m"]; ?>" media="(max-width:768px)">
                                        <img src="upload/<?php echo $v["i_img_c"]; ?>" alt="">
                                    </picture>
                                </a>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>

            <?php foreach ($essay_data as $k => $v) { ?>
                <div class="<?php echo ($v["e_template"] == 0) ? "section2" : "section1"; ?>">
                    <div class="editor_content">
                        <div class="editor_box pc_use">
                            <?php echo html_decode($v["e_ctext"]); ?>
                        </div>
                        <div class="editor_box mo_use">
                            <?php echo html_decode($v["e_mtext"]); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="contents-in">
                <h3>PRODUCTS</h3>
                <div class="product-box-area">
                    <?php foreach ($pc_data as $k => $v) { ?>
                        <a class="product-box" href="./product-series.php?id=<?php echo $k; ?>">
                            <div class="product-name"><span><?php echo $v["pc_title_tw"]; ?></span><?php echo $v["pc_title_en"]; ?></div>
                            <!-- 600*600px -->
                            <img src="upload/<?php echo $v["pc_img"]; ?>">
                            <div class="btn-lineup">產品一覽<img src="dist/images/btn-arrow-white.svg" class="btn-arrow"></div>
                        </a>
                    <?php } ?>
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
            spaceBetween: 0,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
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