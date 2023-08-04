<footer>
    <p class="footer_title"><?php echo $meta_data[29]["d_text"]; ?></p>
    <span class="title_line">_</span>
    <p class="footer_read">
        <?php echo nl2br($meta_data[30]["d_text"]); ?>
    </p>
    <a class="btn" href="contact.php" btn_click_track="bottom_contact">聯絡我們</a>
    <div class="footer_tel">
        <a href="tel:<?php echo $meta_data[21]["d_text"]; ?>"><p>TEL. <?php echo $meta_data[21]["d_text"]; ?></p></a>
        <span>營業時間：<?php echo $meta_data[22]["d_text"]; ?></span>
    </div>

    <div class="footer-2">
        <div class="sns_area">
            <?php
            if ($meta_data[23]["d_text"] != "") echo '<a href="' . $meta_data[23]["d_text"] . '" target="_blank"><img src="dist/images/instagram.svg" alt=""></a>';
            if ($meta_data[24]["d_text"] != "") echo '<a href="' . $meta_data[24]["d_text"] . '" target="_blank"><img src="dist/images/facebook.svg" alt=""></a>';
            if ($meta_data[26]["d_text"] != "") echo '<a href="' . $meta_data[26]["d_text"] . '" target="_blank"><img src="dist/images/line.svg" alt=""></a>';
            if ($meta_data[28]["d_text"] != "") echo '<a href="' . $meta_data[28]["d_text"] . '" target="_blank"><img src="dist/images/youtube.svg" alt=""></a>';
            ?>
        </div>
        <ul class="directory_area">
            <li><a href="profile.php">公司介紹</a></li>
        </ul>
        <p><small><?php echo $meta_data[6]["d_text"]; ?></small></p>
    </div>

</footer>