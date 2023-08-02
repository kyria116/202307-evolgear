<?php
include '../system/ready.mak';
if (!isset($id) || !is_numeric($id)) {
	header("location:../../dominator/paging/p_series.php"); //導回頁面
	exit();
}
$page_name = "p_series.php";
$sql = "SELECT a_title,a_id,ps_id,pc_title_tw,pc_id FROM article INNER JOIN `p_class` on article.a_id = p_class.ps_id WHERE pc_id = :id";
$stmt = $link->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_NUM);
$parents_id = $row[4];

include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="stylesheet" href="../css/icheck/flat/blue.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/unicorn.css" />
<link rel="stylesheet" href="../css/overwrite.css">
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

		$title = "《" . $row[3] . "》產品列表";
		$db_name = "product";
		$id_name = "p_id";
		$title_name = "p_title";
		$stitle_name = "p_stitle";
		$keyword_name = "p_keyword";
		$desc_name = "p_desc";
		$img_name = "p_img";
		$news_name = "p_news";
		$ctext1_name = "p_ctext1";
		$mtext1_name = "p_mtext1";
		$ctext2_name = "p_ctext2";
		$mtext2_name = "p_mtext2";
		$order_name = "p_order";
		$status_name = "p_status";
		$m_id_name = "pc_id";

		$paging = false; //如果不使用php分頁，請改為：false
		if ($paging) {
			$paging_where = "";
			$paging_where1 = "";
			if (isset($search) && $search != "") { //搜尋使用
				$paging_where = "WHERE $title_name LIKE '%$search%'";
				$paging_where1 = $paging_where;
			} else {
				$paging_where1 = "";
				$search = "";
			}
			include '../quote/page_count.php'; //分頁計算
		} else {
			$paging_where = "";
		}

		//資訊
		$query = "SELECT * FROM `$db_name` WHERE $m_id_name = $parents_id $paging_where ORDER BY $order_name";
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
				<a href="p_series.php">系列介紹</a>
				<a href="<?php echo "p_class.php?id=" . $row[1]; ?>"><?php echo "《" . $row[0] . "》系列分類"; ?></a>
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
								<a href="<?php echo $db_name; ?>_add.php?id=<?php echo $id; ?>" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> <?php echo $cms_lang[22][$language]; ?></a>
							</div>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover data-table">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th><?php echo $cms_lang[42][$language]; ?></th>
										<th>標題</th>
										<th>圖片</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data) && $data != "") {
										foreach ($data as $k => $v) {
									?>
											<tr>
												<td style="text-align: center; vertical-align: middle;" width="20%" id="td_img">
													<div class="btn-group">
														<button class="btn btn-xs btn-<?php echo $v[$status_name] == "0" ? "danger" : "info"; ?> button_<?php echo $v[$id_name]; ?>" style="margin-right: 10px;" onclick=" javascript:location.href='image.php?page_id=3&id=<?php echo $v[$id_name]; ?>' ;">圖片管理</button>
														<button data-toggle="dropdown" class="btn btn-xs btn-<?php echo $v[$status_name] == "0" ? "danger" : "info"; ?>  dropdown-toggle button_<?php echo $v[$id_name]; ?>"><span class="caret"></span></button>
														<ul class="dropdown-menu dropdown-yellow">
															<li><a href="<?php echo $db_name; ?>_update.php?id=<?php echo $v[$id_name]; ?>"><?php echo $cms_lang[23][$language]; ?></a></li>
															<li class="divider"></li>
															<li><a href="#" onclick="del(<?php echo $v[$id_name]; ?>);return false;"><?php echo $cms_lang[24][$language]; ?></a></li>
														</ul>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<?php include '../quote/order_select.php'; //排序功能
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="40%">
													<?php echo $v[$title_name]; ?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<button data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle" style="margin-right:5px;" onclick="window.open('<?php echo $url_set . $_SERVER['HTTP_HOST'] . '/news-detail.php?id=' . $v[$id_name]; ?>')">查看 </button>
													<select onchange="select_check('<?php echo $v[$id_name]; ?>');" id="check_<?php echo $v[$id_name]; ?>">
														<?php
														foreach ($status_data as $k1 => $v1) {
														?>
															<option value="<?php echo $k1; ?>" <?php echo $v[$status_name] == $k1 ? "selected" : ""; ?>><?php echo $v1; ?></option>
														<?php
														}
														?>
													</select>
													<img src="../../upload/<?php echo $v[$img_name]; ?>" style="max-width:200px">
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
	<?php
	include '../control/status_check.php'; //文章狀態
	include '../quote/order_send.php'; //排序from表
	?>
</body>

</html>