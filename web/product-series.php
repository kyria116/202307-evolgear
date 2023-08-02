<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
    to_exit:
    include_once('404.html');
    exit();
}

//系列分類產品
$query = "SELECT * FROM `p_class` INNER JOIN `article` ON article.a_id = p_class.ps_id WHERE pc_id = $id";
$pc_data = sql_data($query, $link, 1);

//產品
$query = "SELECT p_id,p_title,p_stitle,p_news,p_img FROM `product` WHERE pc_id = $id";
$data = sql_data($query, $link, 2, "p_id");

$link = null;
$title_var =  $pc_data["pc_title_tw"] . " | " . $title_var;
$meta_data[2]["d_text"] = $pc_data["pc_keyword"];
$meta_data[3]["d_text"] = $pc_data["pc_desc"];

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/product-menu2.css">
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
            <li><a href="./product.php?id=<?php echo $pc_data["ps_id"]; ?>"><?php echo $pc_data["a_title"]; ?></a></li>
            <li>></li>
            <li><?php echo $pc_data["pc_title_tw"]; ?></li>
        </ul>
        <div class="wrapper">

            <p class="title_en">WEIGHT STACK</p>
            <span class="title_line">_</span>
            <h1 class="read_jp">配重片系列</h1>

            <div class="section">
                <div class="editor_content">
                    <div class="editor_box pc_use"><?php echo html_decode($pc_data["pc_ctext"]); ?></div>
                    <div class="editor_box mo_use"><?php echo ($pc_data["pc_mtext"] == "") ? html_decode($pc_data["pc_ctext"]) : html_decode($pc_data["pc_mtext"]); ?></div>
                </div>
            </div>

            <div class="series-row">
                <!-- 新的產品則有new這個class -->
                <?php foreach ($data as $k => $v) { ?>
                    <div class="col <?php echo ($v["p_news"] == 1) ? "new" : ""; ?>">
                        <h2>
                            <?php echo $v["p_title"]; ?><br>
                            <span><?php echo $v["p_stitle"]; ?></span>
                        </h2>
                        <a href="./product-detail.php?id=<?php echo $k; ?>">
                            <!-- 如果是新的產品 span會display block -->
                            <?php echo ($v["p_news"] == 1) ? '<span>NEW</span>' : ''; ?>
                            <!-- 1200*1200px -->
                            <img src="upload/<?php echo $v["p_img"]; ?>" alt="<?php echo $v["p_title"]; ?>">
                        </a>
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