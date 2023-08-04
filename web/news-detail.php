<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
  to_exit:
  include_once('404.html');
  exit();
}
//內容
$query = "SELECT n_title,n_ctext,n_mtext,n_status,DATE_FORMAT(n_date ,'%Y.%m.%d') AS n_date,n_keyword,n_desc  FROM `news` WHERE n_id = $id";
$data = sql_data($query, $link, 1);

if (empty($data)) goto to_exit;
if ($data["n_status"] == 0 && !isset($_SESSION["dominator_account"]))  goto to_exit;

$link = null;
$title_var = $data["n_title"] . " | " . $title_var;
$meta_data[2]["d_text"] = $data["n_keyword"];
$meta_data[3]["d_text"] = $data["n_desc"];

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/news-detail.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw">
  <?php
  include "quote/template/added.php";
  include "quote/template/nav.php";
  ?>
  <main>
    <ul class="breadcrumb">
      <li><a href="./">TOP</a></li>
      <li>></li>
      <li><a href="./news.php">最新消息</a></li>
      <li>></li>
      <li><?php echo $data["n_title"]; ?></li>
    </ul>

    <div class="wrapper">
      <div class="sr_name">
        <p class="title_en">NEWS</p>
        <span class="title_line">_</span>
        <h1 class="read_jp"><?php echo $data["n_title"]; ?></h1>
      </div>

      <div class="wrapper-2">
        <div class="editor_content">
          <div class="editor_box pc_use"><?php echo html_decode($data["n_ctext"]); ?></div>
          <div class="editor_box mo_use"><?php echo ($data["n_mtext"] == "") ? html_decode($data["n_ctext"]) : html_decode($data["n_mtext"]); ?></div>
        </div>
      </div>
      <a class="btn" href="./news.php" btn_click_track="bottom_contact">BACK</a>
    </div>
    <?php
    include "quote/template/sidebar.php";
    ?>



  </main>
  <?php
  include "quote/template/footer.php";

  ?>

  <script src="dist/js/jquery_min.js"></script>
  <script src="dist/js/function.js"></script>


</body>

</html>