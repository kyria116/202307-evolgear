<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//引導文字
$query = "SELECT * FROM `article` WHERE a_id = 6";
$data = sql_data($query, $link, 1);

$link = null;
$title_var =  "聯絡我們 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/contact.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="lang_tw" data-menu="8">
  <?php
  include "quote/template/added.php";
  include "quote/template/nav.php";
  ?>
  <main>

    <div class="wrapper">

      <ul class="breadcrumb">
        <li><a href="./">HOME</a></li>
        <li>></li>
        <li>聯絡我們</li>
      </ul>
      <div class="sr_name">
        <p class="title_en">CONTACT</p>
        <span class="title_line">_</span>
        <h1 class="read_jp">聯絡我們</h1>
      </div>

      <div class="wrapper-2">
        <div class="editor_content">
          <div class="editor_box pc_use"><?php echo html_decode($data["a_ctext"]); ?></div>
          <div class="editor_box mo_use"><?php echo ($data["a_mtext"] == "") ? html_decode($data["a_ctext"]) : html_decode($data["a_mtext"]); ?></div>
        </div>

        <div class="table">

          <form action="quote/contact.php" id="contact" method="post" autocomplete="on">
            <div class="row">
              <p>公司行號</p>
              <div class="col">
                <input type="text" name="title" class="form-control" placeholder="泰景科技有限公司">
                <p>※個人用戶不需填寫。</p>
              </div>

            </div>

            <div class="row">
              <p>地址 <span>※</span></p>
              <div class="col ">
                <div class="address">
                  <input type="text" name="addr1" class="form-control" placeholder="330" required>
                  <input type="text" name="addr2" class="form-control" placeholder="台灣桃園市桃園區同德六街89號3樓之3" required>
                </div>
                <p>※郵遞區號不用加上橫槓</p>
              </div>
            </div>

            <div class="row">
              <p>姓名 <span>※</span></p>
              <div class="col">
                <input type="text" name="name" class="form-control" placeholder="王小明" required>
              </div>
            </div>

            <div class="row">
              <p>信箱 <span>※</span></p>
              <div class="col">
                <input type="email" name="mail" class="form-control" placeholder="service@evolgear.com.tw" required>
              </div>
            </div>

            <div class="row">
              <p>聯絡電話 <span>※</span></p>
              <div class="col">
                <input type="tel" name="tel" class="form-control" placeholder="033589863" required>
                <p>※不用橫槓</p>
              </div>
            </div>


            <div class="row">
              <p>諮詢內容 <span>※</span></p>
              <div class="col">
                <textarea name="text" cols="30" rows="10" class="form-control def" placeholder="欲洽詢的產品名或產品型號" required></textarea>
                <p class="note">※請避免使用表情符號</p>
              </div>
            </div>

            <div class="cont_btn_area">
              <!-- <div class="btn"> -->
              <label for="submmitForm" class="btn">確認填寫內容
                <!-- <p>確認填寫內容</p> -->
                <input type="submit" class="submmit-button" z id="submmitForm">
              </label>
              <!-- </div> -->
            </div>
            <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
          </form>


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
  <script src="quote/function.js"></script>

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

    //隱形驗證碼
    rand();
    document.cookie = "captcha=" + validate + ";path=/;";
  </script>
  <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>