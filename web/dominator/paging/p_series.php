<?php
include '../system/ready.mak';
$page_name = "p_series.php";
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

		$title = "系列介紹";
		$db_name = "article";
		$id_name = "a_id";
		$title_name = "a_title";
		$title_name_en = "a_title_en";
		$keyword_name = "a_keyword";
		$desc_name = "a_desc";
		$img_name = "a_img";
		$ctext_name = "a_ctext";
		$mtext_name = "a_mtext";
		$order_name = "a_order";
		$status_name = "a_status";

		$paging = false; //如果不使用php分頁，請改為：false
		$paging_where = "WHERE a_id IN (1,2,3)";

		//資訊
		$query = "SELECT * FROM $db_name $paging_where ORDER BY $order_name";
		if ($paging) $query .= $paging_limit; //分頁用limit
		$data = sql_data($query, $link);
		if ($data) $count = count($data); //排序使用
		$link = null;
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $title; ?></h1>

			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<a class="current"><?php echo $title; ?></a>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="fa fa-th"></i>
							</span>
							<h5><?php echo $title; ?></h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover data-table">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th>系列介紹編修</th>
										<th>標題</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data) && $data != "") {
										foreach ($data as $k => $v) {
									?>
											<tr>
												<td style="text-align: center; vertical-align: middle;" width="15%" id="td_img">
													<div class="btn-group">
														<button style="margin-right: 10px;" class="btn btn-xs btn-info" onclick="location.href='p_class.php?id=<?php echo (int) $v[$id_name]; ?>'">下層資料</button>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle;" width="20%" id="td_img">
													<div class="btn-group">
														<button style="margin-right: 10px;" class="btn btn-xs btn-info" onclick="location.href='<?php echo $db_name; ?>_update.php?id=<?php echo (int) $v[$id_name]; ?>'">SEO編修</button>
														<button style="margin-right: 10px;" class="btn btn-xs btn-info" onclick=" javascript:location.href='essay.php?id=<?php echo $v[$id_name]; ?>' ;">內容編輯</button>
														<button class="btn btn-xs btn-info" onclick=" javascript:location.href='image.php?page_id=2&id=<?php echo $v[$id_name]; ?>' ;">BANNER輪播</button>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="65%">
													<?php echo html_decode($v[$title_name_en] . ' / ' . $v[$title_name]); ?>
												</td>
											</tr>
									<?php }
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
		<?php include '../quote/del_box.php'; //刪除功能
		?>
	</script>
	<?php
	include '../control/status_check.php'; //文章狀態
	include '../quote/order_send.php'; //排序from表
	?>
</body>

</html>