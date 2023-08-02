<?php
$page_name = basename(__FILE__);
include '../system/ready.mak';
include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/icheck/flat/blue.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/unicorn.css" />
<!--[if lt IE 9]>
		<script type="text/javascript" src="../js/respond.min.js"></script>
		<![endif]-->

</head>

<body data-color="grey" class="flat">
	<div id="wrapper">
		<?php
		include '../quote/header.php';
		include '../quote/sidebar.php';
		$_SESSION["dom_url"] = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$link = null;
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $cms_lang[14][$language]; ?></h1>

			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<a href="#" class="current"><?php echo $cms_lang[14][$language]; ?></a>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="fa fa-align-justify"></i>
							</span>
							<h5><?php echo $cms_lang[14][$language]; ?></h5>
						</div>
						<div class="widget-content nopadding">
							<form class="form-horizontal" method="post" action="../control/doupdate.php?db=user&id_name=u_id&id=<?php echo $_SESSION["dominator_id"]; ?>" name="pw_chang" id="pw_chang">
								<div class="form-group">
									<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $cms_lang[4][$language]; ?></label>
									<div class="col-sm-9 col-md-9 col-lg-10">
										<input type="password" class="form-control input-sm" id="pw" onchange="check_pw()" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $cms_lang[33][$language]; ?></label>
									<div class="col-sm-9 col-md-9 col-lg-10">
										<input type="password" class="form-control input-sm" id="pwd" onchange="md5_password()" />
										<input type="hidden" name="u_password" id="u_password">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $cms_lang[34][$language]; ?></label>
									<div class="col-sm-9 col-md-9 col-lg-10">
										<input type="password" class="form-control input-sm" id="pwd2" />
									</div>
								</div>
								<div class="form-actions">
									<input type="button" value="<?php echo $cms_lang[23][$language]; ?>" class="btn btn-primary" onclick="check()">
								</div>
							</form>
							<input type="hidden" id="pw_check">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include '../quote/footer.php'; ?>
	</div>


	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.custom.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.icheck.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/jquery.validate.js"></script>

	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/unicorn.js"></script>
	<script src="../js/unicorn.form_validation.js"></script>
	<script src="../js/md5.js"></script>
	<script src="../js/window_load.js"></script>
	<script type="text/javascript">
		//	 		確認密碼是否正確
		function check_pw() {
			$.ajax({
				type: "POST",
				url: "../system/password_check.php",
				dataType: "text",
				data: {
					"id": "<?php echo $_SESSION["dominator_id"]; ?>",
					"password": $("#pw").val()
				},
				success: function(msg) {
					if (msg == 1) {
						$("#pw_check").val(1);
					} else {
						$("#pw_check").val(0);
					}
				}
			});
		};

		//	 		確認修改密碼是否填寫正確
		function check() {
			if ($("#pw").val() == "") {
				alert("<?php echo $cms_lang[35][$language]; ?>");
				$("#pw").focus();
			} else if ($("#pw_check").val() == "0") {
				alert("<?php echo $cms_lang[36][$language]; ?>");
				$("#pw").focus();
			} else if ($("#u_password").val() == "") {
				alert("<?php echo $cms_lang[37][$language]; ?>");
				$("#pwd").focus();
			} else if ($("#pwd").val().length < 6) {
				alert("<?php echo $cms_lang[38][$language]; ?>");
				$("#pw").focus();
			} else if ($("#pwd2").val() != $("#pwd").val()) {
				alert("<?php echo $cms_lang[39][$language]; ?>");
				$("#pwd2").focus();
			} else {
				alert("<?php echo $cms_lang[40][$language]; ?>")
				$("#pw_chang").submit();
			}
		};

		//	 		將密碼轉為MD5
		function md5_password() {
			$("#u_password").val(hex_md5($("#pwd").val()));
		};
	</script>
</body>

</html>