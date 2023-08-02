<?php
/*
	 * 來源頁面必需以get傳送：
	* 1、db：資料表名。
	* 2、page：來源頁面名稱。
	* 3、id_name：索引值欄位名稱。
	* 4、id：欲刪除的索引值。
	*/
include '../system/ready.mak';
include '../system/session.php';

if ($Authenticate == true) {
	$search_query = "SELECT * FROM $db WHERE $id_name = '$id'"; //查詢需刪除檔案名稱的sql語法
	$search_result = $link->prepare($search_query); //執行sql語法
	$search_result->execute();
	$search_row = $search_result->setFetchMode(PDO::FETCH_OBJ);
	$search_row = $search_result->fetch(PDO::FETCH_OBJ); //取出需刪除檔案的名稱

	$order_name = "";
	foreach ($search_row as $key => $value) { //取出欄位名及其內容
		$check = explode("_", $key); //分解欄位名
		if ($check[1] == "file" || $check[1] == "img" || $check[1] == "image") { //確認欄位是否為檔案或圖片
			@unlink("../../upload/$value"); //刪除檔案
		} elseif ($check[1] == "order") {
			$order_name = $key;

			$check_result = $link->prepare("SELECT $order_name FROM $db WHERE $id_name = $id", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL)); //執行sql語法
			$check_result->execute();
			$row = $check_result->fetch(PDO::FETCH_ASSOC);
		}
	}

	$link->prepare("DELETE FROM $db WHERE $id_name = $id")->execute(); //執行sql語法

	if ($order_name) { //確認是否有需要確認排序的必要
		$check_value = $row[$order_name];
		$link->prepare("UPDATE $db SET $order_name = $order_name-1 WHERE $order_name >= $check_value")->execute(); //執行sql語法
	}


	$link->prepare("INSERT INTO record (r_date,r_text,r_name,r_account,r_ip) VALUES(NOW(),'$db 資料刪除：$id','" . $_SESSION["dominator_name"] . "','" . $_SESSION["dominator_account"] . "','" . $_SESSION["dominator_ip"] . "')")->execute(); //執行sql語法
} else {
	exit();
}
$link = null; //關閉資料庫
header("location:" . $url_set . $_SESSION["dom_url"]);//導回頁面
