<?php
ob_start();
$page_name = "user.php";
include '../system/ready.mak';

if (!isset($id) || $id == "" || !is_numeric($id)) header("Location:" . $page_name);

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

		if ($_SESSION["dominator_main"] > 1) {
			header("Location:index.php");
			exit();
		}

		$title = $cms_lang[13][$language];
		$db_name = "user";
		$id_name = "u_id";
		$account_name = "u_account";
		$password_name = "u_password";
		$name_name = "u_name";
		$main_name = "u_main_purview";
		$sub_name = "u_sub_purview";

		$sql = "SELECT $account_name,$password_name,$name_name,$main_name,$sub_name FROM $db_name WHERE $id_name = :id";
		$result = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();

		if ($result->rowCount() != 1) header("Location:" . $page_name);
		$row = $result->fetch(PDO::FETCH_ASSOC);



		$main_data = array("1" => "Administrator", "2" => "User");

		//使用者權限
		$query = "SELECT m_sub_purview FROM menu WHERE	m_main_purview > 1 AND m_sub_purview <> 0 GROUP BY m_sub_purview ORDER BY	m_sub_purview";
		$Temporary_data = @sql_data($query, $link);
		$sub_data[0] = "ALL";
		if ($Temporary_data) foreach ($Temporary_data as $v) $sub_data[$v["m_sub_purview"]] = "Category " . $v["m_sub_purview"];
		$sub_count = count($sub_data);

		$link = null;
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $cms_lang[23][$language]; ?> <?php echo $title; ?></h1>

			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<a href="<?php echo $db_name; ?>.php"><?php echo $title; ?></a>
				<a href="#" class="current"><?php echo $cms_lang[23][$language]; ?> <?php echo $title; ?></a>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-align-justify"></i>
								</span>
								<h5><?php echo $cms_lang[23][$language]; ?> <?php echo $title; ?></h5>
							</div>
							<div class="widget-content nopadding">
								<form action="../control/doupdate.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=<?php echo $id; ?>" method="post" class="form-horizontal" id="form_update" name="form_update">
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $cms_lang[25][$language]; ?></label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="text" class="form-control input-sm" name="<?php echo $account_name; ?>" value="<?php echo html_decode($row[$account_name]); ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $cms_lang[26][$language]; ?></label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="text" class="form-control input-sm" name="<?php echo $name_name; ?>" value="<?php echo html_decode($row[$name_name]); ?>" />
										</div>
									</div>
									<?php
									if ($_SESSION["dominator_main"] == 0) {
									?>
										<div class="form-group">
											<label class="col-sm-3 col-md-3 col-lg-2 control-label">身份</label>
											<div class="col-sm-9 col-md-9 col-lg-10">
												<select name="<?php echo $main_name; ?>">
													<?php
													if ($main_data) {
														foreach ($main_data as $k => $v) {
													?>
															<option value="<?php echo $k; ?>" <?php echo $row[$main_name] == $k ? "selected" : ""; ?>><?php echo $v; ?></option>
													<?php
														}
													}
													?>
												</select>
											</div>
										</div>
									<?php
									}
									if ($_SESSION["dominator_main"] == 0) {
									?>
										<div class="form-group">
											<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $cms_lang[27][$language]; ?></label>
											<div class="col-sm-9 col-md-9 col-lg-10">
												<select name="<?php echo $sub_name; ?>">
													<?php
													if ($sub_data) {
														foreach ($sub_data as $k => $v) {
													?>
															<option value="<?php echo $k; ?>" <?php echo $row[$sub_name] == $k ? "selected" : ""; ?>><?php echo $v; ?></option>
													<?php
														}
													}
													?>
												</select>
											</div>
										</div>
									<?php
									}
									?>
									<div class="form-actions">
										<button type="button" class="btn btn-primary btn-sm" onclick="doupdate();"><?php echo $cms_lang[23][$language]; ?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
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
								<form action="../control/doupdate.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=<?php echo $id; ?>" method="post" class="form-horizontal" id="form_pw" name="form_pw">
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $cms_lang[4][$language]; ?></label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<input type="text" class="form-control input-sm" id="pw" />
											<input type="hidden" name="<?php echo $password_name; ?>" id="pw1">
										</div>
									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-primary btn-sm" onclick="doupdate_pw();"><?php echo $cms_lang[23][$language]; ?></button>
									</div>
								</form>
							</div>
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
	<script src="../js/bootstrap-colorpicker.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/jquery.icheck.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/unicorn.js"></script>
	<script src="../js/unicorn.form_common.js"></script>
	<script src="../js/md5.js"></script>
	<script src="../js/window_load.js"></script>
	<script type="text/javascript">
		function doupdate() {
			$("#form_update").submit();
		};

		function doupdate_pw() {
			$("#pw1").val(hex_md5($("#pw").val()));
			$("#form_pw").submit();
			alert("<?php echo $cms_lang[4][$language] . " " . $cms_lang[32][$language]; ?>");
		};
	</script>
</body>

</html>