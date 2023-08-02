<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
    to_exit:
    include_once('404.html');
    exit();
}
//內容
$query = "SELECT c_title,c_ctext,c_mtext,c_title1,c_ctext1,c_mtext1,c_status,c_keyword,c_desc,c_city,c_tag  FROM `casestudy` WHERE c_id = $id";
$data = sql_data($query, $link, 1);

if (empty($data)) goto to_exit;
if ($data["c_status"] == 0 && !isset($_SESSION["dominator_account"]))  goto to_exit;

//圖片
$query = "SELECT i_img_c FROM `image` WHERE i_page = 6 AND related_id = $id ORDER BY i_order";
$img_data = sql_data($query, $link);

$link = null;
$title_var = $data["c_title"] . " | " . $title_var;
$meta_data[2]["d_text"] = $data["c_keyword"];
$meta_data[3]["d_text"] = $data["c_desc"];

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/casestudy-2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="4">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>
        <ul class="breadcrumb">
            <li><a href="./">HOME</a></li>
            <li>></li>
            <li><a href="./casestudy.php" class="casestudy-bread">客戶實績</a></li>
            <li>></li>
            <li><?php echo $data["c_title"]; ?></li>
        </ul>
        <div class="casestudy-detail">
            <div class="case-cap"><?php echo $data["c_city"]; ?></div>
            <div class="case-cap-cat"><?php echo $data["c_tag"]; ?></div>
            <h3><?php echo $data["c_title"]; ?></h3>
            <div class="casestudy-wrapper">
                <?php if ($img_data) { ?>
                    <div class="left">
                        <div class="main-photo">
                            <!-- 1536*1024px 這邊是主圖 對應到下面的縮圖 第一張圖是上一頁面的縮圖-->
                            <?php foreach ($img_data as $k => $v) { ?>
                                <div class="img-wrapper <?php echo ($k == 1) ? 'active' : ''; ?>"><img src="upload/<?php echo $v["i_img_c"]; ?>" alt=""></div>
                            <?php } ?>
                        </div>
                        <div class="photo-list">
                            <!-- 1536*1024px 這邊是縮圖 對應到上面的主圖-->
                            <?php foreach ($img_data as $k => $v) { ?>
                                <div class="img-wrapper active"><img src="upload/<?php echo $v["i_img_c"]; ?>" alt=""></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="right">
                    <h4>客戶情報</h4>
                    <div class="editor_content">
                        <div class="editor_box pc_use"><?php echo html_decode($data["c_ctext"]); ?></div>
                        <div class="editor_box mo_use"><?php echo ($data["c_mtext"] == "") ? html_decode($data["c_ctext"]) : html_decode($data["c_mtext"]); ?></div>
                    </div>
                </div>
            </div>
            <div class="casestudt-under-text">
                <h4><?php echo $data["c_title1"]; ?></h4>
                <div class="editor_content">
                    <div class="editor_box pc_use"><?php echo html_decode($data["c_ctext1"]); ?></div>
                    <div class="editor_box mo_use"><?php echo ($data["c_mtext1"] == "") ? html_decode($data["c_ctext1"]) : html_decode($data["c_mtext1"]); ?></div>
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
    <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>