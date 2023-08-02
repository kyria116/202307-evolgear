<?php
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

		$title = "功能權限管理";
		$db_name = "menu";
		$id_name = "m_id";
		$type_name = "m_type";
		$name_name = "m_name";
		$main_name = "m_main_purview";
		$sub_name = "m_sub_purview";

		//資訊
		$query = "SELECT $id_name,$type_name,$name_name,$main_name,$sub_name FROM `$db_name` ORDER BY $id_name";
		$stmt = $link->prepare($query);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (!$data && $data != "") {
			echo "MAK-0002";
			exit;
		}
		$type_data = array("root" => "主目錄", "leaf" => "-> 次目錄");

		$main_data = array("0" => "MAK_supervisor", "1" => "Administrator", "2" => "User");

		//使用者權限
		$query = "SELECT m_sub_purview FROM `menu` WHERE	m_main_purview > 1 AND m_sub_purview <> 0 GROUP BY m_sub_purview ORDER BY	m_sub_purview";
		$Temporary_data = sql_data($query, $link);

		$sub_data[0] = "ALL";
		if ($Temporary_data) foreach ($Temporary_data as $v) $sub_data[$v["m_sub_purview"]] = "Category " . $v["m_sub_purview"];
		$link = null;
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $title; ?></h1>
				<?php include '../quote/stats.php'; ?>
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
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th>類別</th>
										<th>功能名稱</th>
										<th>權限</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data) && $data != "") {
										foreach ($data as $k => $v) {
									?>
											<tr>
												<td style="text-align: center; vertical-align: middle;" width="20%">
													<div class="btn-group">
														<?php
														if ($v[$type_name] == "root") {
														?>
															<a href="<?php echo $db_name; ?>_update.php?id=<?php echo $v[$id_name]; ?>">
																<button class="btn btn-xs btn-info"><?php echo $cms_lang[23][$language]; ?></button>
															</a>
														<?php
														} else echo "-";
														?>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<?php echo $type_data[$v[$type_name]]; ?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="40%">
													<?php echo $v[$name_name]; ?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<?php echo $main_data[$v[$main_name]]; ?>
													<hr style="margin: 1px;">
													<?php echo $sub_data[$v[$sub_name]]; ?>
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
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
	<script src="../js/window_load.js"></script>
</body>

</html>