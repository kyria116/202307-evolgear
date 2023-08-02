<?php
session_start();

$this_page = $url_set . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
setcookie("captcha", "", time() - 3600);

//TITLE資訊
$query = "SELECT d_id,d_text FROM `document` WHERE d_id IN(1,2,3,4,5,6,7,8,21,22,23,24,25,26,27,28,29,30,31,32,33,34)";
$meta_data = sql_data($query, $link, 2, "d_id");
$title_var = $meta_data[1]["d_text"];

//GOOGLE驗證碼
$sitekey = "";


//產品系列分類
$query = "SELECT a_id,a_title,a_title_en,a_img,a_keyword,a_desc FROM `article` WHERE a_id IN (1,2,3)";
$product_series_menu = sql_data($query, $link, 2, "a_id");

//產品次選單
$query = "SELECT pc_id,pc_title_tw,pc_title_en,ps_id FROM `p_class` ORDER BY pc_order";
$product_class_menu = sql_data($query, $link, 3, "pc_id", "ps_id");
