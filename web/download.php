<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//前言
$query = "SELECT e_ctext,e_mtext FROM `essay` WHERE e_id = 9";
$info_data = sql_data($query, $link, 1);

//下載檔案
$query = "SELECT * FROM `d_mclass` ORDER BY dm_order";
$dm_data = sql_data($query, $link, 2, "dm_id");

//系列分類
$query = "SELECT * FROM `d_series` JOIN `d_mclass` USING(dm_id)  ORDER BY ds_order";
$ds_data = sql_data($query, $link, 3, "ds_id", "dm_id");

//單一型錄
$query = "SELECT * FROM `download` JOIN `d_series` USING(ds_id) ORDER BY d_order";
$data = sql_data($query, $link, 3, "d_id", "ds_id");

$link = null;
$title_var =   "下載型錄 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/download.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="6">
  <?php
  include "quote/template/added.php";
  include "quote/template/nav.php";
  ?>
  <main>

    <div class="wrapper">

      <ul class="breadcrumb">
        <li><a href="./">HOME</a></li>
        <li>></li>
        <li>下載型錄</li>
      </ul>
      <div class="sr_name">
        <p class="title_en">DOWNLOAD</p>
        <span class="title_line">_</span>
        <h1 class="read_jp">下載型錄</h1>
      </div>

      <div class="wrapper-2">
        <div class="editor_content">
          <div class="editor_box pc_use">
            <?php echo html_decode($info_data["e_ctext"]); ?>
          </div>
          <div class="editor_box mo_use">
            <?php echo ($info_data["e_mtext"] == "") ? html_decode($info_data["e_ctext"]) : html_decode($info_data["e_mtext"]); ?>
          </div>
        </div>

        <?php if ($dm_data) { ?>
          <ul class="download_list">
            <?php foreach ($dm_data as $k => $v) {
              $dm_size = ($v["dm_size"] > 1024 * 1024) ? round($v["dm_size"] / 1024 / 1024, 1) . 'KB' : round($v["dm_size"] / 1024, 1) . 'MB';
            ?>
              <li class="pc_li">
                <div class="download_thumb">
                  <!-- 100*143px -->
                  <img src="upload/<?php echo $v["dm_img"]; ?>">
                </div>
                <div class="download_content">
                  <p><?php echo $v["dm_title"]; ?></p>
                  <div class="button-wrapper">
                    <p class="item_open">
                      <span>+</span>
                      按類別
                    </p>

                    <a href="pdfdownload/<?php echo $v["dm_pdf"]; ?>" class="download-1">
                      <p>PDF</p>
                      <span>(<?php echo $dm_size; ?>)</span>
                  </div>
                  </a>
                </div>
              </li>
              <?php if (isset($ds_data[$k])) {
                foreach ($ds_data[$k] as $k1 => $v1) {
              ?>
                  <li class="second">
                    <p><?php echo $v1["ds_title"]; ?></p>
                    <ol>
                      <?php foreach ($data[$k1] as $k2 => $v2) {
                        $d_size = ($v2["d_size"] > 1024 * 1024) ? round($v2["d_size"] / 1024 / 1024, 1) . 'KB' : round($v2["d_size"] / 1024, 1) . 'MB';
                      ?>
                        <li class="second-2">
                          <p><?php echo $v2["d_title"]; ?></p>
                          <a href="pdfdownload/<?php echo $v2["d_pdf"]; ?>" class="download">
                            <p>PDF</p>
                            <span>(<?php echo $d_size; ?>)</span>
                          </a>
                        </li>
                      <?php } //第三層
                      ?>
                    </ol>
                  </li>
            <?php } //第二層
              }
            } ?>
          </ul>


          <ul class="download_list">
            <?php foreach ($dm_data as $k => $v) {
              $dm_size = ($v["dm_size"] > 1024 * 1024) ? round($v["dm_size"] / 1024 / 1024, 1) . 'KB' : round($v["dm_size"] / 1024, 1) . 'MB';
            ?>
              <li class="pc_li">
                <div class="download_thumb">
                  <!-- 100*143px -->
                  <img src="upload/<?php echo $v["dm_img"]; ?>">
                </div>
                <div class="download_content">
                  <p><?php echo $v["dm_title"]; ?></p>
                  <div class="button-wrapper">
                    <p class="item_open">
                      <span>+</span>
                      按類別
                    </p>

                    <a href="pdfdownload/<?php echo $v["dm_pdf"]; ?>" class="download-1">
                      <p>PDF</p>
                      <span>(<?php echo $dm_size; ?>)</span>
                  </div>
                  </a>
                </div>
              </li>
              <?php if (isset($ds_data[$k])) {
                foreach ($ds_data[$k] as $k1 => $v1) {
              ?>
                  <li class="second">
                    <p><?php echo $v1["ds_title"]; ?></p>
                    <ol>
                      <?php foreach ($data[$k1] as $k2 => $v2) {
                        $d_size = ($v2["d_size"] > 1024 * 1024) ? round($v2["d_size"] / 1024 / 1024, 1) . 'KB' : round($v2["d_size"] / 1024, 1) . 'MB';
                      ?>
                        <li class="second-2">
                          <p><?php echo $v2["d_title"]; ?></p>
                          <a href="pdfdownload/<?php echo $v2["d_pdf"]; ?>" class="download">
                            <p>PDF</p>
                            <span>(<?php echo $d_size; ?>)</span>
                          </a>
                        </li>
                      <?php } //第三層
                      ?>
                    </ol>
                  </li>
            <?php } //第二層
              }
            } ?>
          </ul>
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