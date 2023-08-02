<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//最新消息
$query = "SELECT n_id,n_title,DATE_FORMAT(n_date,'%Y.%m.%d') AS n_date  FROM `news` WHERE n_status = 1 ORDER BY n_order";
$data = sql_data($query, $link, 2, "n_id");

$link = null;
$title_var =  "最新消息 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/news.css">
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
            <li>最新消息</li>
        </ul>

        <div class="wrapper">
            <div class="sr_name">
                <p class="title_en">NEWS</p>
                <span class="title_line">_</span>
                <h1 class="read_jp">最新消息</h1>
            </div>

            <ul class="news_list">
                <?php foreach ($data as $k => $v) { ?>
                    <a href="./news-detail.php?id=<?php echo $k; ?>">
                        <li><span class="date"><?php echo $v["n_date"]; ?></span><span class="title"><?php echo $v["n_title"]; ?></span></li>
                    </a>
                <?php } ?>
            </ul>
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