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

		$title = "聯絡表單資訊";
		$db_name = "contact";
		$id_name = "c_id";
		$date_name = "c_date";
		$name_name = "c_name";
		$tel_name = "c_tel";
		$mail_name = "c_mail";
		$addr_name = "c_addr";
		$title_name = "c_title";
		$text_name = "c_text";
		$status_name = "c_status";
		$ip_name = "c_ip";


		$search = "";
		if (isset($s_date) && $s_date != "" && isset($e_date) && $e_date != "") {
			if ($s_date > $e_date) {
				$a = $e_date;
				$e_date = $s_date;
				$s_date = $a;
			}
		}
		if (isset($s_date) && $s_date != "") {
			if ($search != "") $search .= " AND ";
			$search .= "c_date >= '$s_date 00:00:00'";
		} else $s_date = "";
		if (isset($e_date) && $e_date != "") {
			if ($search != "") $search .= " AND ";
			$search .= "c_date <= '$e_date 23:59:59'";
		} else $e_date = "";
		if (isset($c_status) && $c_status != "0") {
			if ($search != "") $search .= " AND ";
			$search .= "c_status = '$c_status'";
		} else $c_status = "0";
		if ($search == "") $search = 1;

		//訊息資訊
		$query = "SELECT * FROM `$db_name` WHERE $search ORDER BY $date_name DESC";
		$data = sql_data($query, $link, 2, $id_name);

		$link = null;

		$sex_data = array("1" => "先生", "2" => "小姐");
		$status_data = array("1" => "尚未處理", "2" => "已處理");
		// $sex_data[$v[$sex_name]]
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $title; ?></h1>
				<?php include '../quote/stats.php'; ?>
			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<a href="contact.php" class="current"><?php echo $title; ?></a>
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
								<?php /*
								<a href="<?php echo $db_name; ?>_search.php" class="btn btn-default btn-xs"><i class="fa fa-search"></i> 查詢</a>
								<a href="../control/change_excel.php?id=1&search=<?php echo $search; ?>" class="btn btn-default btn-xs" target="_blank"><i class="fa fa-random"></i> 匯出</a> */ ?>
							</div>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover data-table">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th>訊息時間</th>
										<th>聯絡人</th>
										<th>聯絡資訊</th>
										<th>狀態</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data) && $data != "" && is_array($data)) {
										foreach ($data as $k => $v) {
									?>
											<tr>
												<td style="text-align: center; vertical-align: middle;" width="20%" id="td_img">
													<div class="btn-group">
														<button data-toggle="dropdown" class="btn btn-xs btn-<?php echo $v[$status_name] == "1" ? "danger" : "info"; ?> dropdown-toggle" id="button_<?php echo $k; ?>"><?php echo $cms_lang[21][$language]; ?> <span class="caret"></span></button>
														<ul class="dropdown-menu dropdown-yellow">
															<li><a href="<?php echo $db_name; ?>_show.php?id=<?php echo $v[$id_name]; ?>">查看</a></li>
															<li class="divider"></li>
															<li><a href="#" onclick="del(<?php echo $v[$id_name]; ?>);return false;"><?php echo $cms_lang[24][$language]; ?></a></li>
														</ul>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<?php
													$v[$date_name] = str_replace(" ", "<br/>", $v[$date_name]);
													echo $v[$date_name];
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<?php
													echo $v[$name_name];
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<?php echo $v[$tel_name]; ?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<select onchange="select_check('<?php echo $v[$id_name]; ?>');" id="check_<?php echo $v[$id_name]; ?>">
														<?php
														foreach ($status_data as $k1 => $v1) {
														?>
															<option value="<?php echo $k1; ?>" <?php echo $v[$status_name] == $k1 ? "selected" : ""; ?>><?php echo $v1; ?></option>
														<?php
														}
														?>
													</select>
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
	<script type="text/javascript">
		function del(id) {
			bootbox.dialog({
				message: "<?php echo $cms_lang[30][$language]; ?>",
				title: "<?php echo $cms_lang[24][$language]; ?>",
				buttons: {
					danger: {
						label: "<?php echo $cms_lang[24][$language]; ?>",
						className: "btn-danger",
						callback: function() {
							location.href = "../control/dodel.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=" + id + "&page=<?php echo $page_name; ?>";
							alert("<?php echo $cms_lang[24][$language] . $cms_lang[41][$language]; ?>");
						}
					},
					main: {
						label: "<?php echo $cms_lang[29][$language]; ?>",
						className: "btn-default",
						callback: function() {
							console.log("Alert Callback");
						}
					}
				}
			});
		};

		function select_check(id) {
			$.ajax({
				type: "POST",
				async: true,
				url: "../control/check_doupdate.php",
				dataType: "text",
				data: {
					"db": "<?php echo $db_name; ?>",
					"id_name": "<?php echo $id_name; ?>",
					"status_name": "<?php echo $status_name; ?>",
					"id": id,
					"status": $("#check_" + id).val()
				},
				success: function(msg) {
					if (msg == 1) {
						if ($("#check_" + id).val() == 2) {
							$("#button_" + id).addClass("btn-info");
							$("#button_" + id).removeClass("btn-danger");
						} else {
							$("#button_" + id).addClass("btn-danger");
							$("#button_" + id).removeClass("btn-info");
						}
					}
				}
			});
		};
	</script>
</body>

</html>