<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
    to_exit:
    include_once('404.html');
    exit();
}

//三大系列 > 產品系列 > 產品分類
$query = "SELECT a_title,ps_id,pm_title_tw,pm_id,pc_title_tw,pc_title_en,pc_keyword,pc_desc,pc_ctext,pc_mtext,pc_id 
            FROM `p_class` JOIN `p_mclass` USING(pm_id) INNER JOIN `article` ON article.a_id = p_mclass.ps_id WHERE pc_id = $id";
$data = sql_data($query, $link, 1);

//產品
$query = "SELECT p_id,p_title,p_stitle,p_news,p_img FROM `product` WHERE pc_id = $id AND p_status = 1";
$p_data = sql_data($query, $link, 2, "p_id");

$link = null;
$title_var =  $data["pc_title_tw"] . " | " . $title_var;
$meta_data[2]["d_text"] = $data["pc_keyword"];
$meta_data[3]["d_text"] = $data["pc_desc"];

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
            <li><a href="./product.php?id=<?php echo $data["ps_id"]; ?>"><?php echo $data["a_title"]; ?></a></li>
            <li>></li>
            <li><a href="./product-series.php?id=<?php echo $data["pm_id"]; ?>"><?php echo $data["pm_title_tw"]; ?></a></li>
            <li>></li>
            <li><?php echo $data["pc_title_tw"]; ?></li>
        </ul>
        <div class="wrapper">

            <p class="title_en"><?php echo $data["pc_title_en"]; ?></p>
            <span class="title_line">_</span>
            <h1 class="read_jp"><?php echo $data["pc_title_tw"]; ?></h1>

            <div class="section">
                <div class="editor_content">
                    <div class="editor_box pc_use"><?php echo html_decode($data["pc_ctext"]); ?></div>
                    <div class="editor_box mo_use"><?php echo ($data["pc_mtext"] == "") ? html_decode($data["pc_ctext"]) : html_decode($data["pc_mtext"]); ?></div>
                </div>
            </div>
            <div class="series-row">
                <!-- 新的產品則有new這個class -->
                <?php foreach ($p_data as $k => $v) { ?>
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


</body>

</html>