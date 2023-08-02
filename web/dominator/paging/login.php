<?php
include '../system/ready.mak';
include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/unicorn-login.css" />
<script type="text/javascript" src="../js/respond.min.js"></script>
</head>

<body>
    <div id="container">
        <div id="logo" style="color: #FFF; font-size: 30px; text-align: center; font-weight: bold; padding: 20px 0px;">
            【<?php echo $project_title; ?> - 後台管理】
        </div>
        <div id="user">
            <div class="text" style="margin-left: -60px;">
                <h4><?php echo $cms_lang[1][$language]; ?><br /><?php echo $cms_title[$language]; ?></h4>
            </div>
        </div>
        <div id="loginbox">
            <form id="loginform" action="../system/check.php" method="post">
                <p><?php echo $cms_lang[2][$language]; ?>：</p>
                <div class="input-group input-sm">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" type="text" name="username" placeholder="<?php echo $cms_lang[3][$language]; ?>" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" type="password" name="password" placeholder="<?php echo $cms_lang[4][$language]; ?>" />
                </div>
                <div class="form-actions clearfix">
                    <?php
                    if ($language == "tw") {
                    ?>
                        <div class="pull-right">
                            <a href="#recoverform" class="flip-link to-recover grey">忘記密碼</a>
                        </div>
                    <?php
                    }
                    ?>
                    <input type="submit" class="btn btn-block btn-primary btn-default" value="<?php echo $cms_lang[5][$language]; ?>" />
                </div>
            </form>

            <form id="recoverform" action="#">
                <p>若您忘記您的帳號、密碼，為保護您的帳戶安全，煩請您直接與管理人員聯繫。</p>
                <p><br /></p>
                <div class="form-actions clearfix">
                    <div class="pull-left">
                        <a href="#loginform" class="grey flip-link to-login">返回登入頁</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.custom.min.js"></script>
    <script src="../js/unicorn.login.js"></script>
</body>

</html>