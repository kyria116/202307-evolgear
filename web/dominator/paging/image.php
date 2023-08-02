<?php
include '../system/ready.mak';
if (!isset($id) || !is_numeric($id) || !isset($page_id) || !is_numeric($page_id)) {
	header("location:../../dominator/paging/index.php"); //導回頁面
	exit();
}

if ($page_id == 5) {
	$page_name = "image.php?page_id=5&id=0";
	$row[0] = "展廳資訊";
} else {
	switch ($page_id) {
		case 2:
			$page_name = "p_series.php";
			$sql = "SELECT a_title,a_id FROM article WHERE a_id = :id";
			break;
		case 3:
			$page_name = "p_series.php";
			$sql = "SELECT p_title,p_id,a_title,a_id,ps_id,pc_title_tw,pc_id FROM `p_class` JOIN `product` USING (pc_id) INNER JOIN `article` ON article.a_id = p_class.ps_id WHERE p_id = :id";
			break;
		case 4:
			$page_name = "sponsor.php";
			$sql = "SELECT s_title_tw,s_id FROM sponsor WHERE s_id = :id";
			break;
		case 6:
			$page_name = "casestudy.php";
			$sql = "SELECT c_title,c_id FROM casestudy WHERE c_id = :id";
			break;
	}
	$stmt = $link->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_NUM);
}
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

		$title = "《" . $row[0] . "》" . "圖片管理";
		$db_name = "image";
		$id_name = "i_id";
		$title_name = "i_title";
		$img_name_c = "i_img_c";
		$img_name_m = "i_img_m";
		$url_name = "i_url";
		$page_name = "i_page";
		$related_name = "related_id";
		$order_name = "i_order";

		$paging = false; //如果不使用php分頁，請改為：false
		if ($paging) {
			$paging_where = "";
			$paging_where1 = "";
			if (isset($search) && $search != "") { //搜尋使用
				$paging_where = "WHERE $name_name LIKE '%$search%'";
				$paging_where1 = $paging_where;
			} else {
				$paging_where1 = "";
				$search = "";
			}
			include '../quote/page_count.php'; //分頁計算
		} else {
			$paging_where = "WHERE $related_name = $id AND $page_name = $page_id";
		}

		//資訊
		$query = "SELECT * FROM `$db_name` $paging_where ORDER BY $order_name";
		if ($paging) $query .= $paging_limit; //分頁用limit
		$data = sql_data($query, $link);
		if ($data) $count = count($data); //排序使用
		$link = null;
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $title; ?></h1>
				<?php include '../quote/stats.php'; ?>
			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<?php if ($page_id == 2) { ?>
					<a href="p_series.php">系列介紹</a>
				<?php } else if ($page_id == 3) { ?>
					<a href="p_series.php">系列介紹</a>
					<a href="<?php echo "p_class.php?id=" . $row[3]; ?>"><?php echo "《" . $row[2] . "》系列分類"; ?></a>
					<a href="<?php echo "product.php?id=$row[6]"; ?>"><?php echo "《" . $row[5] . "》產品列表"; ?></a>
				<?php } else if ($page_id == 4) { ?>
					<a href="sponsor.php">人員介紹管理</a>
				<?php } else if ($page_id == 6) { ?>
					<a href="casestudy.php">客戶實績列表</a>
				<?php } ?>
				<a class="current"><?php echo $title; ?></a>
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
								<a href="<?php echo $db_name; ?>_add.php?page_id=<?php echo $page_id; ?>&id=<?php echo $id; ?>" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> <?php echo $cms_lang[22][$language]; ?></a>
							</div>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover data-table">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th><?php echo $cms_lang[42][$language]; ?></th>
										<th>圖片</th>
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
														<button data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle" id="button_<?php echo $v[$id_name]; ?>">操作 <span class="caret"></span></button>
														<ul class="dropdown-menu dropdown-yellow">
															<li><a href="<?php echo $db_name; ?>_update.php?page_id=<?php echo $page_id; ?>&id=<?php echo $v[$id_name]; ?>"><?php echo $cms_lang[23][$language]; ?></a></li>
															<li class="divider"></li>
															<li><a href="#" onclick="del(<?php echo $v[$id_name]; ?>);return false;"><?php echo $cms_lang[24][$language]; ?></a></li>
														</ul>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="15%">
													<?php include '../quote/order_select.php'; //排序功能
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="70%">
													<img src="../../upload/<?php echo $v[$img_name_c]; ?>" style="width:400px">
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
							<?php if ($paging) include '../quote/page_code.php'; //頁籤
							?>
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
	<?php include '../control/status_check.php'; //文章狀態
	?>
	<?php include '../quote/order_send.php'; //排序from表
	?>
</body>

</html>