<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//主視覺
$query = "SELECT * FROM `image` WHERE i_id = 1";
$banner_data = sql_data($query, $link, 1);

//黑色+白色區塊
$query = "SELECT * FROM `essay` WHERE e_id IN (1,2)";
$text_data = sql_data($query, $link, 2, "e_id");

//快速連結
$query = "SELECT *,e_ctext AS e_url FROM `essay` WHERE e_id IN (3,4,5,6) ORDER BY e_order";
$link_data = sql_data($query, $link, 2, "e_id");

//最新消息
$query = "SELECT n_id,n_title,DATE_FORMAT(n_date,'%Y.%m.%d') AS n_date  FROM `news` WHERE n_status = 1 ORDER BY n_date DESC LIMIT 3";
$news_data = sql_data($query, $link, 2, "n_id");


$link = null;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/index.css">

</head>

<body class="lang_tw" data-menu="0">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>
        <a href="<?php echo $banner_data["i_url"]; ?>" target="_blank" class="banner">
            <!-- PC : 2400*1500px -->
            <!-- MB : 740*1400px  -->
            <?php  /*
                To tommy：請調整為桌手分開。
            */ ?>
            <div class="top_logo">
                <img src="dist/images/evolgear-logo_fromjp.png" alt="EVOLGEAR from JAPAN">
            </div>
            <div class="olympia-logo">
                <div>
                    <img src="dist/images/olympia-logo.svg">
                </div>
                <p class="olympia-text">EVOLGEAR是國際健美大賽“OLYMPIA”的官方認定訓練機械品牌</p>
            </div>
        </a>

        <section class="bg_black">
            <div class="category-link-btn">
                <ul>
                    <li><a href="product.php?id=1"><?php echo $product_series_menu[1]["a_title_en"]; ?></a></li>
                    <li><a href="product.php?id=2"><?php echo $product_series_menu[2]["a_title_en"]; ?></a></li>
                    <li><a href="product.php?id=3"><?php echo $product_series_menu[3]["a_title_en"]; ?></a></li>
                </ul>
            </div>
            <?php /*黑色區塊 */
            if ($text_data[1]["e_status"] == 1) { ?>
                <div class="official-sponser-wrapper">
                    <p class="title_en"><?php echo $text_data[1]["e_title"]; ?></p>
                    <span class="title_line">_</span>

                    <div class="editor_content">
                        <div class="editor_box pc_use"><?php echo html_decode($text_data[1]["e_ctext"]); ?></div>
                        <div class="editor_box mo_use"><?php echo html_decode($text_data[1]["e_mtext"]); ?> </div>
                    </div>
                </div>
            <?php } ?>
        </section>
        <?php /*白色區塊 */
        if ($text_data[2]["e_status"] == 1) { ?>
            <section class="section2">
                <div class="editor_content">
                    <div class="editor_box pc_use"><?php echo html_decode($text_data[2]["e_ctext"]); ?></div>
                    <div class="editor_box mo_use"><?php echo html_decode($text_data[2]["e_mtext"]); ?> </div>
                </div>
            </section>
        <?php } ?>
        <section class="bg_black-2">
            <p class="title_en">PRODUCT</p>
            <span class="title_line">_</span>

            <div class="add-top-btn">
                <a href="product.php?id=1" btn_click_track="hp_pro_edition">
                    <div class="top-btn-shadow">
                        <!-- 1000*496px -->
                        <img src="upload/<?php echo $product_series_menu[1]["a_img"]; ?>" class="ed-img">
                        <div class="ed-tit">
                            <div class="ed-tit-cat"><?php echo $product_series_menu[1]["a_title_en"]; ?></div>
                            <div class="ed-tit-caption">查看<?php echo $product_series_menu[1]["a_title"]; ?></div>
                        </div>
                    </div>
                </a>
                <a href="product.php?id=2" btn_click_track="hp_home_edition">
                    <div class="top-btn-shadow">
                        <!-- 1000*496px -->
                        <img src="upload/<?php echo $product_series_menu[2]["a_img"]; ?>" class="ed-img">
                        <div class="ed-tit">
                            <div class="ed-tit-cat"><?php echo $product_series_menu[2]["a_title_en"]; ?></div>
                            <div class="ed-tit-caption">查看<?php echo $product_series_menu[1]["a_title"]; ?></div>
                        </div>
                    </div>
                </a>
                <a href="product.php?id=3" btn_click_track="hp_corerevo">
                    <div class="top-btn-shadow">
                        <!-- 1000*496px -->
                        <img src="upload/<?php echo $product_series_menu[3]["a_img"]; ?>" class="ed-img">
                        <div class="ed-tit tit-pilates">
                            <div class="ed-tit-cat"><?php echo $product_series_menu[3]["a_title_en"]; ?></div>
                            <div class="ed-tit-caption">查看<?php echo $product_series_menu[3]["a_title"]; ?></div>
                        </div>
                    </div>
                </a>
            </div>

            <article>
                <p class="title_en">TOPICS</p>
                <span class="title_line">_</span>

                <div class="row top-topics-area">
                    <?php foreach ($link_data as $k => $v) { ?>
                        <div class="col topics4">
                            <a href="<?php echo $v["e_url"]; ?>" btn_click_track="hp_home_showroom">
                                <div>
                                    <!-- 480*480px -->
                                    <img src="upload/<?php echo $v["e_img"]; ?>" alt="">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </article>
        </section>
        <?php if ($news_data) { ?>
            <section class="part-3">
                <p class="title_en_bk">NEWS</p>
                <span class="title_line">_</span>
                <h2 class="read_jp_bk">最新消息</h2>
                <ul class="news_list">
                    <?php foreach ($news_data as $k => $v) { ?>
                        <a href="news-detail.php?id=<?php echo $k; ?>">
                            <li><span class="date"><?php echo $v["n_date"]; ?></span><span class="title"><?php echo $v["n_title"]; ?></span></li>
                        </a>
                    <?php } ?>
                </ul>
                <div class="readmore">
                    <a href="news.php">read more <img src="dist/images/news_arrow.svg"></a>
                </div>
            </section>
        <?php } ?>
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
    <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>