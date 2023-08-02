<?php
ob_start();
$page_name = basename(__FILE__);
include '../system/ready.mak';
include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
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

		if ($_SESSION["dominator_main"] > 1) {
			header("Location:index.php");
			exit();
		}

		$title = $cms_lang[13][$language];
		$db_name = "user";
		$id_name = "u_id";
		$account_name = "u_account";
		$name_name = "u_name";
		$main_name = "u_main_purview";
		$sub_name = "u_sub_purview";
		$check_name = "u_check";

		//使用者資訊
		$dominator_main = (int) $_SESSION["dominator_main"];
		$query = "SELECT $id_name,$account_name,$name_name,$check_name,$main_name,$sub_name FROM $db_name WHERE $main_name > $dominator_main ";
		$data = @sql_data($query, $link);

		$check_data = array("Y" => $cms_lang[19][$language], "N" => $cms_lang[20][$language]);

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
				<h1><?php echo $title; ?></h1>

			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<a href="#" class="current"><?php echo $title; ?></a>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="fa fa-th"></i>
							</span>
							<h5><?php echo $title; ?> <?php echo $cms_lang[18][$language]; ?></h5>
							<div style="padding-top: 3px;">
								<a href="<?php echo $db_name; ?>_add.php" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> <?php echo $cms_lang[22][$language]; ?></a>
							</div>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover data-table">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th><?php echo $cms_lang[25][$language]; ?></th>
										<th><?php echo $cms_lang[26][$language]; ?></th>
										<th><?php echo $cms_lang[27][$language]; ?></th>
										<th><?php echo $cms_lang[28][$language]; ?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($data != "") {
										foreach ($data as $v) {
											if ($v[$id_name] != 1) {
									?>
												<tr>
													<td style="text-align: center; vertical-align: middle;" width="20%" id="td_img">
														<div class="btn-group">
															<button data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle"><?php echo $cms_lang[21][$language]; ?> <span class="caret"></span></button>
															<ul class="dropdown-menu dropdown-yellow">
																<li><a href="<?php echo $db_name; ?>_update.php?id=<?php echo $v[$id_name]; ?>"><?php echo $cms_lang[23][$language]; ?></a></li>
																<li class="divider"></li>
																<?php
																if ($v[$check_name] == "Y") {
																?>
																	<li><a href="#" onclick="chang(<?php echo $v[$id_name]; ?>,'N')"><?php echo $cms_lang[20][$language]; ?></a></li>
																<?php
																} else {
																?>
																	<li><a href="#" onclick="chang(<?php echo $v[$id_name]; ?>,'Y')"><?php echo $cms_lang[19][$language]; ?></a></li>
																<?php
																}
																?>
																<li class="divider"></li>
																<li><a href="#" onclick="del(<?php echo $v[$id_name]; ?>);return false;"><?php echo $cms_lang[24][$language]; ?></a></li>
															</ul>
														</div>
													</td>
													<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
														<?php echo $v[$account_name]; ?>
													</td>
													<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
														<?php echo $v[$name_name]; ?>
													</td>
													<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
														<?php
														echo $main_data[$v[$main_name]];
														if ($sub_count > 1) {
															echo '<hr style="margin: 1px;">';
															echo $sub_data[$v[$sub_name]];
														}
														?>
													</td>
													<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
														<?php echo $check_data[$v[$check_name]]; ?>
													</td>
												</tr>
									<?php
											}
										}
									}
									?>
								</tbody>
							</table>
							<form action="#" id="form_chang" method="post">
								<input type="hidden" name="<?php echo $check_name ?>" id="check" value="Y">
							</form>
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
	<script src="../js/bootbox.min.js"></script>
	<script src="../js/jquery.icheck.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>

	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/unicorn.js"></script>
	<script src="../js/unicorn.tables.js"></script>
	<script src="../js/md5.js"></script>
	<script src="../js/window_load.js"></script>
	<script type="text/javascript">
		<?php include '../quote/del_box.php'; //刪除功能
		?>

		function chang(id, St) {
			$("#form_chang").attr("action", "../control/doupdate.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=" + id);
			$("#check").val(St);
			$("#form_chang").submit();
		};
	</script>
</body>

</html>