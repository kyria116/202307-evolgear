<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/contact.css">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
</head>

<body class="lang_tw" data-menu="8">
    <?php
    include "quote/template/added.php";
    include "quote/template/nav.php";
    ?>
    <main>

    <div class="wrapper">

        <ul class="breadcrumb">
            <li>HOME</li>
            <li>></li>
            <li>聯絡我們</li>
        </ul>
        

            <!-- <div class="banner">
                <img src="dist/images/sponsorship-top-bg.jpg" alt="">
            </div> -->

            <!-- <h3>SPONSORSHIP</h3> -->
            <div class="sr_name">
                <p class="title_en">CONTACT</p>
                <span class="title_line">_</span>
                <h1 class="read_jp">聯絡我們</h1>
            </div>

            <div class="wrapper-2">
              <!-- <div class="editor_content">
                              <div class="editor_box pc_use">這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 這是桌機 </div>
                              <div class="editor_box mo_use">這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 這是手機 </div>
                </div> -->
                <p>請來電或填寫諮詢表格，讓我們協助您選擇合適的機器、預算規劃、機器設置、產品相關或其他任何問題等。</p>

                <div class="table">

                <form action="">
                  <div class="row">
                    <p>公司行號</p>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="泰景科技有限公司">
                      <p>※個人用戶不需填寫。</p>
                    </div>
                    
                  </div>

                  <div class="row">
                    <p>地址 <span>※</span></p>
                    <div class="col ">
                      <div class="address">
                        <input type="text" class="form-control" placeholder="330" required>
                        <input type="text" class="form-control" placeholder="台灣桃園市桃園區同德六街89號3樓之3" required>
                      </div>
                      <p>※郵遞區號不用加上橫槓</p>
                    </div>
                  </div>

                  <div class="row">
                    <p>姓名 <span>※</span></p>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="王小明" required>
                    </div>
                  </div>

                  <div class="row">
                    <p>信箱 <span>※</span></p>
                    <div class="col">
                      <input type="email" class="form-control" placeholder="service@evolgear.com.tw" required>
                    </div>
                  </div>

                  <div class="row">
                    <p>聯絡電話 <span>※</span></p>
                    <div class="col">
                      <input type="tel" class="form-control" placeholder="033589863" required>
                      <p>※不用橫槓</p>
                    </div>
                  </div>

                  
                  <div class="row">
                    <p>諮詢內容 <span>※</span></p>
                    <div class="col">
                      <textarea name="" id="" cols="30" rows="10" class="form-control def" placeholder="欲洽詢的產品名或產品型號" required></textarea>
                      <p class="note">※請避免使用表情符號</p>
                    </div>
                  </div>

                  <div class="cont_btn_area">
                    <!-- <div class="btn"> -->
                      <label for="submmitForm" class="btn">確認填寫內容
                      <!-- <p>確認填寫內容</p> -->
                      <input type="submit"  class="submmit-button" z id="submmitForm">
                      </label>
                    <!-- </div> -->
                  </div>

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

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
      spaceBetween: 5,
      slidesPerView: 'auto',
      loopedSlides:10,
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
      effect : 'fade',
        fadeEffect: {
            crossFade: true,
        },
      thumbs: {
        swiper: swiper,
      },
      allowTouchMove:false,
    });
    </script>
    <!-- <script src="dist/js/index.js"></script> -->
</body>

</html>