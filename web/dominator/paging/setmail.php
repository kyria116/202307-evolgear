<?php
include '../system/ready.mak';
$page_name = basename(__FILE__);
include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/colorpicker.css" />
<link rel="stylesheet" href="../css/datepicker.css" />
<link rel="stylesheet" href="../css/icheck/flat/blue.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="stylesheet" href="../css/unicorn.css" />
<link rel="stylesheet" href="../css/file.css" />
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

		$title = array(0 => "寄件信箱設定", 11 => "信箱帳號", 12 => "信箱密碼", 13 => "SMTP伺服器", 14 => "PORT", 15 => "SMTP加密方式", 16 => "SMTP身份驗證");
		$db_name = "document";
		$id_name = "d_id";
		$text_name = "d_text";

		$query = "SELECT * FROM `$db_name` WHERE $id_name BETWEEN 11 AND 16";
		$data = sql_data($query, $link, 2, "d_id");
		$link = null;
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $title[0]; ?></h1>
				<?php include '../quote/stats.php'; ?>
			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<a href="#" class="current"><?php echo $title[0]; ?></a>
			</div>
			<div class="container-fluid">
				<?php
				foreach ($data as $k => $v) {
				?>
					<div class="row">
						<div class="col-xs-12">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="fa fa-align-justify"></i>
									</span>
									<h5><?php echo $title[$k]; ?></h5>
								</div>
								<div class="widget-content nopadding">
									<form action="../control/doupdate.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=<?php echo $v[$id_name]; ?>" method="post" class="form-horizontal" id="form_update_<?php echo $k; ?>" name="form_update">
										<div class="form-group">
											<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $title[$k]; ?></label>
											<div class="col-sm-9 col-md-9 col-lg-10">
												<?php
												if ($k == 15) {
												?>
													<select name="<?php echo $text_name; ?>">
														<option value="0" <?php echo $v[$text_name] == 0 ? "selected" : ""; ?>>無</option>
														<option value="1" <?php echo $v[$text_name] == 1 ? "selected" : ""; ?>>TLS</option>
														<option value="2" <?php echo $v[$text_name] == 2 ? "selected" : ""; ?>>SSL</option>
													</select>
												<?php
												} elseif ($k == 16) {
												?>
													<select name="<?php echo $text_name; ?>">
														<option value="1" <?php echo $v[$text_name] == 1 ? "selected" : ""; ?>>開啟</option>
														<option value="2" <?php echo $v[$text_name] == 2 ? "selected" : ""; ?>>關閉</option>
													</select>
												<?php
												} else {
												?>
													<input type="text" class="form-control input-sm" name="<?php echo $text_name; ?>" value="<?php echo $v[$text_name]; ?>" placeholder="請輸入<?php echo $title[$k]; ?><?php echo $k == 2 ? "，關鍵字詞之間請以「,」分隔。" : ""; ?>" />
												<?php
												}
												?>
											</div>
										</div>
										<div class="form-actions">
											<button type="button" class="btn btn-primary btn-sm" onclick="doupdate(<?php echo $k; ?>);"><?php echo $cms_lang[23][$language]; ?></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<?php include '../quote/footer.php'; ?>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.custom.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-colorpicker.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/jquery.icheck.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/unicorn.js"></script>
	<script src="../js/unicorn.form_common.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="../js/window_load.js"></script>
	<script type="text/javascript">
		//	     		新增備註
		function doupdate(id) {
			$("#form_update_" + id).submit();
			alert("<?php echo $cms_lang[23][$language] . $cms_lang[41][$language]; ?>");
		};
	</script>
</body>

</html>