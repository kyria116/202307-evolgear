<?php
/*
	 * 來源頁面必需以get傳送：
	* 1、db：資料表名。
	* 2、page：來源頁面名稱。
	* 3、id_name：索引值欄位名稱。
	* 4、id：欲修改的索引值。
	*/
header("Content-Type: text/html; charset=utf-8"); //告知編碼
include '../system/ready.mak';
include '../system/session.php';

if ($Authenticate == true) {
	$img = [];
	$file_dir = "../../upload/";
	foreach ($imgcode as $k => $v) {
		if ($v) {
			$str = explode(";base64,", $v);
			$str1 = explode("data:image/", $str[0]);
			$data = base64_decode($str[1]);
			$time = date("Y_m_d_His") . $k; //設定字串為日期加時間，用於檔案名稱
			$img_name = $time . "." . $str1[1];
			file_put_contents($file_dir . $img_name, $data);
			$img[$k] = $img_name;
		}
	}
	$result["status"] = true;
	$result["msg"] = $img;
	echo json($result);
} else exit();
$link = null;//關閉資料庫
