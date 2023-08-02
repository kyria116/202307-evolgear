<?php
$page_name = "contact.php";
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

		if (!isset($id) || !is_numeric($id)) {
			header("location:" . $url_set . $_SESSION["dom_url"]); //導回頁面
			exit();
		}

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


		//資訊
		$query = "SELECT * FROM `$db_name` WHERE $id_name = '$id'";
		$data = sql_data($query, $link, 1);
		$link = null;

		$sex_data = array("1" => "先生", "2" => "小姐");
		$status_data = array("1" => "尚未處理", "2" => "已處理");
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1>查看<?php echo $title; ?></h1>
				<?php include '../quote/stats.php'; ?>
			</div>
			<div id="breadcrumb">
				<a href="index.php" title="返回首頁" class="tip-bottom"><i class="fa fa-home"></i> 首頁</a>
				<a href="<?php echo $db_name; ?>.php"><?php echo $title; ?></a>
				<a href="#" class="current">查看<?php echo $title; ?></a>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="fa fa-th"></i>
							</span>
							<h5>查看<?php echo $title; ?></h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover">
								<tbody>
									<tr>
										<th colspan="4">聯絡資訊</th>
									</tr>
									<tr>
										<th width="15%">訊息時間</th>
										<td width="35%" style="text-align: center; vertical-align: middle; word-break:break-all;"><?php echo $data[$date_name]; ?></td>
										<th width="15%">聯絡人</th>
										<td width="35%" style="text-align: center; vertical-align: middle; word-break:break-all;"><?php echo $data[$name_name]; ?></td>
									</tr>
									<tr>
										<th width="15%">電話</th>
										<td width="35%" style="text-align: center; vertical-align: middle; word-break:break-all;"><?php echo $data[$tel_name]; ?></td>
										<th width="15%">信箱</th>
										<td width="35%" style="text-align: center; vertical-align: middle; word-break:break-all;"><?php echo $data[$mail_name]; ?></td>
									</tr>
									<tr>
										<th width="15%">地址</th>
										<td width="35%" style="text-align: center; vertical-align: middle; word-break:break-all;"><?php echo $data[$addr_name]; ?></td>
										<th width="15%">公司行號</th>
										<td width="35%" style="text-align: center; vertical-align: middle; word-break:break-all;"><?php echo $data[$title_name]; ?></td>
									</tr>
									<tr>
										<th colspan="1">內容</th>
										<td colspan="3" style="text-align: center; vertical-align: middle; word-break:break-all;"><?php echo nl2br($data[$text_name]); ?></td>
									</tr>
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