<div class="corner">
    <ul>
        <li>
            <ul>
                <li>
                    <a href="tel:<?php echo $meta_data[21]["d_text"]; ?>">
                        <div class="sidebar-circle contact"><i class="fa-solid fa-phone"></i></div>
                    </a>
                    <div class="sidebar-content tel">TEL:<?php echo $meta_data[21]["d_text"]; ?></div>
                </li>
                <?php
                if ($meta_data[26]["d_text"] != "" && $meta_data[27]["d_text"] != "") {
                    echo '<li>
                            <a href="' . $meta_data[26]["d_text"] . '" target="_blank">
                                <div class="sidebar-circle contact"><i class="fa-brands fa-line"></i></div>
                            </a>
                            <div class="sidebar-content line">LINE ID:' . $meta_data[27]["d_text"] . '</div>
                        </li>';
                }
                if ($meta_data[25]["d_text"] != "") {
                    echo '<li>
                            <a href="' . $meta_data[25]["d_text"] . '" target="_blank">
                                <div class="sidebar-circle contact"><i class="fa-brands fa-facebook-messenger"></i></div>
                            </a>
                            <div class="sidebar-content fb">Facebook Messenger</div>
                        </li>';
                }
                ?>


                <li>
                    <a href="">
                        <div class="sidebar-circle contact"><i class="fa-brands fa-facebook-messenger"></i></div>
                    </a>
                    <div class="sidebar-content fb">Facebook Messenger</div>
                </li>
            </ul>
            <a href="">
                <div class="sidebar-circle main"><i class="fa-regular fa-comment"></i></div>
            </a>
        </li>
    </ul>
</div>