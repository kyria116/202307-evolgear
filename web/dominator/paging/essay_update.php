<?php
include '../system/ready.mak';
if (!isset($id) || !is_numeric($id)) {
	header("location:" . $url_set . $_SESSION["dom_url"]); //導回頁面
	exit();
}
$page_name = "essay_update.php?id=$id";
if ($id <= 6 && $id >= 3)  $page_name = "quicklink.php";
else if ($id > 10) {
	$page_name = "p_series.php";

	$sql = "SELECT a_title,a_id FROM article INNER JOIN essay on article.a_id = essay.id WHERE e_id = :id";
	$stmt = $link->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_NUM);
	$parents_id = $row[1];
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
<link rel="stylesheet" href="../css/cropper.min.css">
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

		$title = "";
		$db_name = "essay";
		$id_name = "e_id";
		$title_name = "e_title";
		$img_name = "e_img";
		$ctext_name = "e_ctext";
		$mtext_name = "e_mtext";
		$page_name = "e_page";
		$related_name = "id";
		$status_name = "e_status";
		$order_name = "e_order";


		//資訊
		$query = "SELECT * FROM `$db_name` WHERE $id_name = '$id'";
		$data = sql_data($query, $link, 1);
		$link = null;
		$title_current = "區塊資訊";

		// 1、型態：input、date、textarea、img、file、select
		// 2、ALL：標題
		// 3、ALL：欄位名
		// 4、input、date、textarea：描述，可不填	 / 	img、file：共用id，請編流水號 	/ 	select：下拉式選單資料陣列
		// 5、img：寬度 	/ 	textarea：HTML編輯器開關，0 or 1 	/ 	select：陣列如為二維，請加第二維key值	 / 	input：限數字值為1
		// 6、img：高度 	/ 	textarea：無HTML編輯器時，為textarea行數

		if ($id == 1) {
			$title_current = "黑色區塊內容";
			$title = $title_current;
			$group_array = array(
				array("input", "標題", $title_name, "", "", ""),
				array("textarea", "內文《電腦版》", $ctext_name, "", "1", ""),
				array("textarea", "內文《手機版》", $mtext_name, "", "1", ""),
			);
		} else if ($id == 2) {
			$title_current = "白色區塊內容";
			$title = $title_current;
			$group_array = array(
				array("textarea", "內文《電腦版》", $ctext_name, "", "1", ""),
				array("textarea", "內文《手機版》", $mtext_name, "", "1", ""),
			);
		} else if ($id <= 6 && $id >= 3) {
			$title_current = "快速連結";
			$group_array = array(
				array("input", "標題《顯示於後台》", $title_name, "", "", ""),
				array("input", "連結", $ctext_name, "", "", ""),
				array("img", "圖片", $img_name, "1", "480", "480"),
			);
		} else if ($id == 7 || $id == 8 || $id == 9) {
			$title_current = ($id == 7) ? "詳細資訊" : "前言";
			$title = $title_current;
			$group_array = array(
				array("textarea", "內文《電腦版》", $ctext_name, "", "1", ""),
				array("textarea", "內文《手機版》", $mtext_name, "", "1", ""),
			);
		} else {
			$title = "《" . $row[0] . "》" . "區塊資訊管理";
			//顯示狀態
			$status_arr = array("隱藏", "顯示");
			//版面配置
			$layout_arr = array("窄版", "滿版");

			$group_array = array(
				array("input", "標題《顯示於後台》", $title_name, "", "", ""),
				array("select", "顯示狀態", $status_name, $status_arr, "", ""),
				array("select", "版面配置", $img_name, $layout_arr, "", ""),
				array("textarea", "內文《電腦版》", $ctext_name, "", "1", ""),
				array("textarea", "內文《手機版》", $mtext_name, "", "1", ""),
			);
		}

		$group_array = g_array($group_array, $data);
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $cms_lang[23][$language]; ?> <?php echo $title_current; ?></h1>
				<?php include '../quote/stats.php'; ?>
			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<?php if ($id <= 6 && $id >= 3) { ?>
					<a href="quicklink.php">快速連結設定</a>
				<?php } else if ($id > 10) { ?>
					<a href="p_series.php">系列介紹</a>
					<a href="essay.php?id=<?php echo $parents_id; ?>"><?php echo $title; ?></a>
				<?php } ?>
				<a class="current"><?php echo $cms_lang[23][$language]; ?> <?php echo $title_current; ?></a>
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
									<?php if ($id <= 2) { ?>
										<div class='form-group <?php echo $status_name; ?>'>
											<label class='col-sm-3 col-md-3 col-lg-2 control-label'>顯示狀態</label>
											<div class='col-sm-9 col-md-9 col-lg-10'>
												<select name='<?php echo $status_name; ?>'>
													<option value='0' <?php echo ($data[$status_name] == 0) ? "selected" : ""; ?>>隱藏</option>
													<option value='1' <?php echo ($data[$status_name] == 1) ? "selected" : ""; ?>>顯示</option>
												</select>
											</div>
										</div>
									<?php } ?>
									<!-- <div class='form-group <?php echo $status_name; ?>'>
										<label class='col-sm-3 col-md-3 col-lg-2 control-label'>文章狀態</label>
										<div class='col-sm-9 col-md-9 col-lg-10'>
											<select name='<?php echo $status_name; ?>'>
												<option value='0' <?php echo ($data[$status_name] == 0) ? "selected" : ""; ?>>草稿</option>
												<option value='1' <?php echo ($data[$status_name] == 1) ? "selected" : ""; ?>>發布中</option>
											</select>
											<button data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle" style="margin-right:5px;" onclick="window.open('<?php echo $url_set . $_SERVER['HTTP_HOST'] . '/news-detail.php?id=' . $data[$id_name]; ?>')">查看 </button>
										</div>
									</div> -->
									<?php foreach ($group_array as $v)	group($v[0], $v[1], $v[2], $v[3], $v[4], $v[5], $v[6]); ?>
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
	<script src="../js/cropper.min.js"></script>
	<script type="text/javascript">
		var cropper = [];
		var img_w = [];
		var img_h = [];

		function file_upload(type, id, img_width = '', img_height = '') {
			if (type == 1) {
				$("#filename" + id).html($("#file_id" + id).val());
			} else {
				$("#filename" + id).html("<span style='color:red;font-weight:bold;'>請確認圖片剪裁區域。<span>");
				var input = document.querySelector('input[id=file_id' + id + ']');
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#preview' + id).attr('src', e.target.result);
						if (cropper[id] != undefined) cropper[id].destroy();
						var $image = $('#preview' + id),
							image = $image[0];
						var croppable = false;
						cropper[id] = new Cropper(image, {
							touchDragZoom: false,
							mouseWheelZoom: false,
							zoomable: true,
							dragMode: "none",
							viewMode: 0,
							autoCropArea: 1,
							aspectRatio: img_width / img_height
						});
						img_w[id] = img_width;
						img_h[id] = img_height;
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
		};

		function doupdate() {
			if (cropper.length) {
				var img = [];
				for (var i in cropper) img[i] = cropper[i].getCroppedCanvas({
					width: img_w[i],
					height: img_h[i],
					fillColor: "#ffffff"
				}).toDataURL('image/jpeg');
				$.post("../control/imgupload.php", {
					imgcode: img
				}, function(data) {
					for (var i in data.msg) $("#img_name" + i).val(data.msg[i]);
					$("#form_update").submit();
				}, "json");
			} else {
				$("#form_update").submit();
			}
		};
	</script>
</body>

</html>