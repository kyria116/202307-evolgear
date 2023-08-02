<?php
include '../system/ready.mak';
if (!isset($id) || !is_numeric($id) || !isset($page_id) || !is_numeric($page_id)) {
	header("location:../../dominator/paging/index.php"); //導回頁面
	exit();
}

if ($page_id == 5) {
	$page_name = "image.php?page_id=5&id=0";
	$row[0] = "展廳資訊";
	$row[1] = 0;
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

		$link = null;
		$title_current = "圖片";

		// 1、型態：input、date、textarea、img、file、select
		// 2、ALL：標題
		// 3、ALL：欄位名
		// 4、input、date、textarea：描述，可不填	 / 	img、file：共用id，請編流水號 	/ 	select：下拉式選單資料陣列
		// 5、img：寬度 	/ 	textarea：HTML編輯器開關，0 or 1 	/ 	select：陣列如為二維，請加第二維key值	 / 	input：限數字值為1
		// 6、img：高度 	/ 	textarea：無HTML編輯器時，為textarea行數
		if ($page_id == 2) {
			$group_array = array(
				array("input", "連結", $url_name, "", "", ""),
				array("img", "圖片《電腦版》", $img_name_c, "1", "1920", "864"),
				array("img", "圖片《手機版》", $img_name_m, "2", "768", "1452"),
			);
		} else if ($page_id == 3) {
			$group_array = array(
				array("img", "圖片", $img_name_c, "1", "800", "800"),
			);
		} else if ($page_id == 4) {
			$group_array = array(
				array("img", "圖片", $img_name_c, "1", "600", "600"),
			);
		} else if ($page_id == 5) {
			$group_array = array(
				array("img", "圖片", $img_name_c, "1", "1920", "1080"),
			);
		} else if ($page_id == 6) {
			$group_array = array(
				array("img", "圖片", $img_name_c, "1", "1200", "800"),
			);
		}
		$group_array = g_array($group_array, $data);
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $cms_lang[22][$language]; ?> <?php echo $title; ?></h1>
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
				<a href="<?php echo $db_name; ?>.php?page_id=<?php echo $page_id; ?>&id=<?php echo $row[1]; ?>"><?php echo $title; ?></a>
				<a class="current"><?php echo $cms_lang[22][$language]; ?> <?php echo $title_current; ?></a>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-align-justify"></i>
								</span>
								<h5><?php echo $cms_lang[22][$language]; ?> <?php echo $title; ?></h5>
							</div>
							<div class="widget-content nopadding">
								<form action="../control/doadd.php?db=<?php echo $db_name; ?>" method="post" class="form-horizontal" id="form_add" name="form_add" enctype="multipart/form-data">
									<input type="hidden" name="<?php echo $order_name; ?>" value="0" />
									<input type="hidden" name="<?php echo $related_name; ?>" value="<?php echo $id; ?>" />
									<input type="hidden" name="<?php echo $page_name; ?>" value="<?php echo $page_id; ?>" />
									<?php foreach ($group_array as $v)	group($v[0], $v[1], $v[2], $v[3], $v[4], $v[5], $v[6]); ?>
									<div class="form-actions">
										<button type="button" class="btn btn-primary btn-sm" onclick="doadd();"><?php echo $cms_lang[22][$language]; ?></button>
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
		//	     		新增
		function doadd() {
			if (cropper.length) {
				var img = [];
				for (var i in cropper) img[i] = cropper[i].getCroppedCanvas({
					width: img_w[i],
					height: img_h[i],
					fillColor: "rgba(0,0,0,0)"
				}).toDataURL('image/jpeg');
				$.post("../control/imgupload.php", {
					imgcode: img
				}, function(data) {
					for (var i in data.msg) $("#img_name" + i).val(data.msg[i]);
					$("#form_add").submit();
				}, "json");
			} else {
				$("#form_add").submit();
			}
		};
	</script>
</body>

</html>