<?php
include '../system/ready.mak';
$page_name = basename(__FILE__);
include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/jquery.jscrollpane.css" />
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
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1>
					<?php
					date_default_timezone_set('Asia/Taipei');
					if (date("H") >= 5 && date("H") < 12) echo $cms_lang[6][$language] . " " . $_SESSION["dominator_name"];
					elseif (date("H") >= 12 && date("H") < 17) echo $cms_lang[7][$language] . " " . $_SESSION["dominator_name"];
					else echo $cms_lang[8][$language] . " " . $_SESSION["dominator_name"];
					?>
				</h1>
				<?php $link = null; ?>
			</div>
			<div id="breadcrumb">
				<a href="#" title="<?php echo $cms_lang[9][$language]; ?>" class="current"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 center" style="text-align: center;">
						<ul class="quick-actions">
							<?php
							$perv_type = "";
							if (isset($menu)) {
								foreach ($menu as $v) {
									$purview = 0;
									if ($v["m_main_purview"] > $_SESSION["dominator_main"] || ($v["m_main_purview"] == $_SESSION["dominator_main"] && ($v["m_sub_purview"] == 0 || $_SESSION["dominator_sub"] == 0 || $v["m_sub_purview"] == $_SESSION["dominator_sub"]))) $purview = 1;
									if ($purview) {
										if (($perv_type == "root" && $v["m_type"] != "leaf") || ($perv_type == "leaf" && $v["m_type"] == "root")) echo "<hr/>"; //輸出分隔線
										if ($v["m_type"] == "root") { //如為根目錄			
											if ($v["m_url"] == "-") echo "<h4>" . $v["m_name"] . "</h4>"; //如根目錄沒帶連結，則輸出根目錄名
											else { //如根目錄有帶連結
												echo "<h4>" . $v["m_name"] . "</h4>"; //則輸出根目錄名後，直接輸出連結、名稱及示意圖
							?>
												<li>
													<a href="<?php echo $v["m_url"] ?>">
														<i class="<?php echo $v["m_icon_index"]; ?>" style="font-size: 64px;margin: 5px;"></i><br />
														<?php echo $v["m_name"]; ?>
													</a>
												</li>
											<?php
											}
										} else {
											?>
											<li>
												<a href="<?php echo $v["m_url"] ?>">
													<i class="<?php echo $v["m_icon_index"]; ?>" style="font-size: 64px;margin: 5px;"></i><br />
													<?php echo $v["m_name"]; ?>
												</a>
											</li>
							<?php
										}
										$perv_type = $v["m_type"];
									}
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
		include '../quote/footer.php';
		?>
	</div>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.custom.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.sparkline.min.js"></script>

	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/unicorn.js"></script>
	<script src="../js/window_load.js"></script>
</body>

</html>