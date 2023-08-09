<header>
	<div class="head-container">
		<div class="logo-area">
			<a href="./">
				<img src="dist/images/logo_white_tw.svg" alt="EVOLGEAR">
			</a>
		</div>

		<nav class="menu-area">
			<ul class="menu">
				<li class="mb_show first-menu active menu-index"><a href="./">HOME</a></li>
				<li class="menu-product first-menu menu-index">
					<a href="#">產品介紹</a>
				</li>
				<div class="product-dropdown">
					<ol class="dropdown">
						<li class="menu-product-2"><a href="./product.php?id=1">產品介紹</a></li>
						<ol class="series1 product-series">
							<li>
								<a href="./product.php?id=1">
									<img src="upload/<?php echo $product_series_menu[1]["a_img"]; ?>" alt="<?php echo $product_series_menu[1]["a_title"]; ?>">
									<p class="title"><?php echo $product_series_menu[1]["a_title_en"]; ?><span class="arrow-2"></span><br><span><?php echo $product_series_menu[1]["a_title"]; ?></span></p>
								</a>
							</li>
							<?php if (isset($product_class_menu[1])) {
								foreach ($product_class_menu[1] as $k => $v) { ?>
									<li class="product-series-2">
										<a href="./product-series.php?id=<?php echo $k; ?>" class="menu-h"><?php echo $v["pm_title_tw"]; ?></a>
										<?php if (isset($product_subClass_menu[$k])) { ?>
											<ol>
												<?php foreach ($product_subClass_menu[$k] as $k1 => $v1) { ?>
													<li><a href="./product-list.php?id=<?php echo $k1; ?>"><?php echo $v1["pc_title_tw"]; ?></a></li>
												<?php } ?>
											</ol>
										<?php } ?>
									</li>
							<?php }
							} ?>
						</ol>
						<ol class="series2 product-series">
							<li>
								<a href="./product.php?id=2">
									<img src="upload/<?php echo $product_series_menu[2]["a_img"]; ?>" alt="<?php echo $product_series_menu[2]["a_title"]; ?>">
									<p class="title"><?php echo $product_series_menu[2]["a_title_en"]; ?><span class="arrow-2"></span><br><span><?php echo $product_series_menu[1]["a_title"]; ?></span></p>
								</a>
							</li>
							<?php if (isset($product_class_menu[2])) {
								foreach ($product_class_menu[2] as $k => $v) { ?>
									<li class="product-series-2">
										<a href="./product-series.php?id=<?php echo $k; ?>" class="menu-h"><?php echo $v["pm_title_tw"]; ?></a>
										<?php if (isset($product_subClass_menu[$k])) { ?>
											<ol>
												<?php foreach ($product_subClass_menu[$k] as $k1 => $v1) { ?>
													<li><a href="./product-list.php?id=<?php echo $k1; ?>"><?php echo $v1["pc_title_tw"]; ?></a></li>
												<?php } ?>
											</ol>
										<?php } ?>
									</li>
							<?php }
							} ?>
						</ol>

						<ol class="series3 product-series">
							<li>
								<a href="product.php?id=3">
									<img src="upload/<?php echo $product_series_menu[3]["a_img"]; ?>" alt="<?php echo $product_series_menu[1]["a_title"]; ?>">
									<p class="title"><?php echo $product_series_menu[1]["a_title_en"]; ?><span class="arrow-2"></span><br><span><?php echo $product_series_menu[3]["a_title"]; ?></span></p>
								</a>
							</li>
							<?php if (isset($product_class_menu[3])) {
								foreach ($product_class_menu[3] as $k => $v) { ?>
									<li class="product-series-2">
										<a href="./product-series.php?id=<?php echo $k; ?>" class="menu-h"><?php echo $v["pm_title_tw"]; ?></a>
										<?php if (isset($product_subClass_menu[$k])) { ?>
											<ol>
												<?php foreach ($product_subClass_menu[$k] as $k1 => $v1) { ?>
													<li><a href="./product-list.php?id=<?php echo $k1; ?>"><?php echo $v1["pc_title_tw"]; ?></a></li>
												<?php } ?>
											</ol>
										<?php } ?>
									</li>
							<?php }
							} ?>
						</ol>


					</ol>
				</div>


				<li class="first-menu not-row1 menu-index"><a href="./sponsership.php">健身代言</a></li>
				<li class="first-menu not-row1 menu-index"><a href="./showroom.php">展廳資訊</a></li>
				<li class="first-menu not-row1 menu-index"><a href="./casestudy.php">客戶實績</a></li>
				<li class="first-menu not-row1 menu-index"><a href="./flow.php">購買流程</a></li>
				<li class="first-menu not-row1 menu-index"><a href="./download.php">下載型錄</a></li>
				<li class="first-menu not-row1 menu-index"><a href="./profile.php">公司介紹</a></li>
				<li class="menu-contact first-menu not-row1 menu-index"><a href="./contact.php">聯絡我們</a></li>
				<div class="social-media-wrapper ">
					<div class="social-media">
						<?php
						if ($meta_data[23]["d_text"] != "") echo '<a href="' . $meta_data[23]["d_text"] . '" target="_blank"><img src="dist/images/instagram_white.svg" alt=""></a>';
						if ($meta_data[24]["d_text"] != "") echo '<a href="' . $meta_data[24]["d_text"] . '" target="_blank"><img src="dist/images/facebook_white.svg" alt=""></a>';
						if ($meta_data[28]["d_text"] != "") echo '<a href="' . $meta_data[28]["d_text"] . '" target="_blank"><img src="dist/images/youtube_white.svg" alt=""></a>';
						?>
					</div>
				</div>
			</ul>
			<div class="arrow">
				<img src="dist/images/arrow_right_white.svg" alt="">
			</div>
			<div class="hamburger" id="hamburger-1">
				<span class="line"></span>
				<span class="line"></span>
				<span class="line"></span>
			</div>
		</nav>


	</div>

</header>