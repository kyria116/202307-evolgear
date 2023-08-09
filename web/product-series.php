<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
    to_exit:
    include_once('404.html');
    exit();
}

//三大系列 > 產品系列
$query = "SELECT * FROM `p_mclass` INNER JOIN `article` ON article.a_id = p_mclass.ps_id WHERE pm_id = $id";
$data = sql_data($query, $link, 1);

//產品分類
$query = "SELECT pc_id,pc_title_tw,pc_title_en,pc_img,pc_stext FROM `p_class` WHERE pm_id = $id ORDER BY pc_order";
$pc_data = sql_data($query, $link, 2, "pc_id");

$link = null;
$title_var =  $data["pm_title_tw"] . " | " . $title_var;
$meta_data[2]["d_text"] = $data["pm_keyword"];
$meta_data[3]["d_text"] = $data["pm_desc"];

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/product-menu1.css">
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
            <li><a href="./product.php?id=<?php echo $data["ps_id"]; ?>"><?php echo $data["a_title"]; ?></a></li>
            <li>></li>
            <li><?php echo $data["pm_title_tw"]; ?></li>
        </ul>
        <div class="wrapper">

            <p class="title_en"><?php echo $data["pm_title_en"]; ?></p>
            <span class="title_line">_</span>
            <h1 class="read_jp"><?php echo $data["pm_title_tw"]; ?></h1>

            <div class="section">
                <div class="editor_content">
                    <div class="editor_box pc_use"><?php echo html_decode($data["pm_ctext"]); ?></div>
                    <div class="editor_box mo_use"><?php echo ($data["pm_mtext"] == "") ? html_decode($data["pm_ctext"]) : html_decode($data["pm_mtext"]); ?></div>
                </div>
            </div>

            <div class="category_row">
                <?php foreach ($pc_data as $k => $v) { ?>
                    <div class="col">
                        <a href="./product-list.php?id=<?php echo $k; ?>">
                            <p class="category_name_en"><?php echo $v["pc_title_en"]; ?></p>
                            <h2 class="category_name"><?php echo $v["pc_title_tw"]; ?></h2>
                            <img src="upload/<?php echo $v["pc_img"]; ?>" alt="<?php echo $v["pc_title_tw"]; ?>">
                            <p class="category_text"><?php echo $v["pc_stext"]; ?></p>
                        </a>
                        <a href="./product-list.php?id=<?php echo $k; ?>" class="btn">
                            查看列表
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