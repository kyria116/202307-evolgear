<?php
$page_name = "menu.php";
include '../system/ready.mak';
if (!isset($id) || !is_numeric($id)) {
	header("Location:" . $page_name);
	exit();
}
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

		$title = "功能權限管理";
		$db_name = "menu";
		$id_name = "m_id";
		$type_name = "m_type";
		$name_name = "m_name";
		$main_name = "m_main_purview";
		$sub_name = "m_sub_purview";

		//資訊
		$query = "SELECT * FROM `$db_name` WHERE $id_name = '$id'";
		$data = sql_data($query, $link);
		if (!$data && $data != "") {
			echo "MAK-0002";
			exit;
		}
		$main_data = array("0" => "MAK_supervisor", "1" => "Administrator", "2" => "User");

		//使用者權限
		$query = "SELECT MAX(m_sub_purview) AS max FROM `menu` WHERE	m_main_purview > 1 AND m_sub_purview <> 0";
		$Temporary_data = sql_data($query, $link);
		$sub_data[0] = "ALL";
		$max = ($Temporary_data[1]["max"] != "") ? $Temporary_data[1]["max"] : 0;

		for ($i = 1; $i <= ($max + 1); $i++) $sub_data[$i] = "Category " . $i;

		$link = null;

		$page_mode = "update";
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $cms_lang[23][$language]; ?> <?php echo $title; ?></h1>
				<?php include '../quote/stats.php'; ?>
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
								<form action="../control/doupdate.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=<?php echo $id; ?>" method="post" class="form-horizontal" id="form_update" name="form_update" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label">功能名稱</label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<?php echo $data[1]["m_name"]; ?>
										</div>
									</div>
									<?php
									$field_title = "身份";
									$field_name = $main_name;
									$field_data = $main_data;
									?>
									<div class="form-group">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $field_title; ?></label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<select id="main" name="<?php echo $field_name; ?>" onchange="select_main();">
												<?php
												if ($field_data != "") {
													foreach ($field_data as $k => $v) {
												?>
														<option value="<?php echo $k; ?>" <?php echo $page_mode == "update" ? ($k == $data[1][$field_name] ? "selected" : "") : ""; ?>><?php echo $v; ?></option>
												<?php
													}
												}
												?>
											</select>
											<input type="hidden" name="<?php echo $sub_name; ?>" id="main_sub" value="<?php echo $data[1][$sub_name]; ?>">
										</div>
									</div>
									<?php
									$field_title = "權限";
									$field_name = $sub_name;
									$field_data = $sub_data;
									?>
									<div class="form-group" id="div_sub">
										<label class="col-sm-3 col-md-3 col-lg-2 control-label"><?php echo $field_title; ?></label>
										<div class="col-sm-9 col-md-9 col-lg-10">
											<select id="sub" onchange="select_sub();">
												<?php
												if ($field_data != "") {
													foreach ($field_data as $k => $v) {
												?>
														<option value="<?php echo $k; ?>" <?php echo $page_mode == "update" ? ($k == $data[1][$field_name] ? "selected" : "") : ""; ?>><?php echo $v; ?></option>
												<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-primary btn-sm" onclick="doupdate();"><?php echo $cms_lang[23][$language]; ?></button>
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
	<script src="ckeditor/ckeditor.js"></script>
	<script src="../js/window_load.js"></script>
	<script type="text/javascript">
		$(function() {
			var tdw = $("#input_width").width();
			$(".img_a").css({
				"max-width": tdw + "px"
			});
			select_main();
		});

		function file_upload() {
			$("#filename").html($("#file_id").val());
		};

		function doupdate() {
			$("#form_update").submit();
			alert("<?php echo $cms_lang[23][$language] . $cms_lang[41][$language]; ?>");
		};

		function select_main() {
			if ($("#main").val() <= 1) {
				$("#div_sub").css({
					"display": "none"
				});
				$("#main_sub").val(0);
			} else $("#div_sub").css({
				"display": ""
			});
		};

		function select_sub() {
			$("#main_sub").val($("#sub").val());
		};
	</script>
</body>

</html>