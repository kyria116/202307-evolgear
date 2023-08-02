<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//內容
$query = "SELECT * FROM `article` WHERE a_id = 4";
$data = sql_data($query, $link, 1);

$link = null;
$title_var =  "購買流程 | " . $title_var;
$meta_data[2]["d_text"] = $data["a_keyword"];
$meta_data[3]["d_text"] = $data["a_desc"];

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/flow.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="5">
  <?php
  include "quote/template/added.php";
  include "quote/template/nav.php";
  ?>
  <main>

    <div class="wrapper">

      <ul class="breadcrumb">
        <li><a href="">HOME</a></li>
        <li>></li>
        <li>購買流程</li>
      </ul>
      <div class="sr_name">
        <p class="title_en">FLOW</p>
        <span class="title_line">_</span>
        <h1 class="read_jp">購買流程</h1>
      </div>

      <div class="wrapper-2">
        <div class="editor_content">
          <div class="editor_box pc_use"><?php echo html_decode($data["a_ctext"]); ?></div>
          <div class="editor_box mo_use"><?php echo ($data["a_mtext"] == "") ? html_decode($data["a_ctext"]) : html_decode($data["a_mtext"]); ?></div>
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
      spaceBetween: 5,
      slidesPerView: 'auto',
      loopedSlides: 10,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true,
      },
      thumbs: {
        swiper: swiper,
      },
      allowTouchMove: false,
    });
  </script>
  <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>