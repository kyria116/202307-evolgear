<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
    to_exit:
    include_once('404.html');
    exit();
}

//產品
$query = "SELECT * FROM `product` WHERE p_id = $id";
$data = sql_data($query, $link, 1);
$pc_id = $data["pc_id"];

if (empty($data)) goto to_exit;
if ($data["p_status"] == 0 && !isset($_SESSION["dominator_account"]))  goto to_exit;

//三大系列 > 產品系列 > 產品分類 > 產品
$query = "SELECT a_title,ps_id,pm_title_tw,pm_id,pc_title_tw,pc_title_en,pc_keyword,pc_desc,pc_ctext,pc_mtext,pc_id 
            FROM `p_class` JOIN `p_mclass` USING(pm_id) JOIN `product` USING(pc_id) INNER JOIN `article` ON article.a_id = p_mclass.ps_id WHERE p_id = $id";
$pc_data = sql_data($query, $link, 1);

//產品圖
$query = "SELECT * FROM `image` WHERE related_id = $id AND i_page = 3";
$img_data = sql_data($query, $link);

$link = null;
$title_var =  $data["p_title"] . " | " . $title_var;
$meta_data[2]["d_text"] = $data["p_keyword"];
$meta_data[3]["d_text"] = $data["p_desc"];

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/product-evws001.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="1">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>
        <ul class="breadcrumb">
            <li>TOP</li>
            <li>></li>
            <li><a href="./product.php?id=<?php echo $pc_data["ps_id"]; ?>"><?php echo $pc_data["a_title"]; ?></a></li>
            <li>></li>
            <li><a href="./product-series.php?id=<?php echo $pc_data["pm_id"]; ?>"><?php echo $pc_data["pm_title_tw"]; ?></a></li>
            <li>></li>
            <li><a href="./product-list.php?id=<?php echo $pc_data["pc_id"]; ?>"><?php echo $pc_data["pc_title_tw"]; ?></a></li>
            <li>></li>
            <li><?php echo $data["p_title"]; ?></li>
        </ul>
        <div class="wrapper">

            <div class="product-wrap">
                <p class="mo">
                    <?php echo $data["p_title"]; ?>
                    <span><?php echo $data["p_stitle"]; ?></span>

                </p>
                <div class="product-img">
                    <?php if ($img_data) { ?>
                        <div class="img-slider">
                            <!-- 1200*1200px -->
                            <img src="upload/<?php echo $img_data[1]["i_img_c"]; ?>">
                        </div>

                        <div class="thumbnails">
                            <ul>
                                <!-- 1200*1200px -->
                                <?php foreach ($img_data as $k => $v) { ?>
                                    <li <?php echo $k == 1 ? 'class="active"' : ''; ?>><img src="upload/<?php echo $v["i_img_c"]; ?>"></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="product-detail">
                    <div class="detail-area">
                        <h1><?php echo $data["p_title"]; ?>
                            <span><?php echo $data["p_stitle"]; ?></span>
                        </h1>

                        <div class="editor_content">
                            <div class="editor_box pc_use"><?php echo html_decode($data["p_ctext1"]); ?></div>
                            <div class="editor_box mo_use"><?php echo ($data["p_mtext1"] == "") ? html_decode($data["p_ctext1"]) : html_decode($data["p_mtext1"]); ?></div>
                        </div>

                        <div class="buy_area_read">
                            ▼如欲購買者請從這裡開始▼
                        </div>
                        <div class="buy_btn">
                            <a href="./contact.php">
                                <span>
                                    <img src="dist/images/contact-icon.svg" alt="">
                                </span>
                                <p>洽詢產品問題</p>
                            </a>
                        </div>

                        <div class="care_txt">
                            <span>※填寫時請詳細註明產品名稱或型號</span>
                        </div>
                    </div>
                </div>


            </div>
            <div class="section2">
                <div class="editor_content">
                    <div class="editor_box pc_use"><?php echo html_decode($data["p_ctext2"]); ?></div>
                    <div class="editor_box mo_use"><?php echo ($data["p_mtext2"] == "") ? html_decode($data["p_ctext2"]) : html_decode($data["p_mtext2"]); ?></div>
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
            spaceBetween: 30,
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