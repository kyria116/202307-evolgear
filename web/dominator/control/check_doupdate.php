<?php
include '../system/ready.mak';
include '../system/session.php';

if ($Authenticate == true) {
	$link->prepare("UPDATE $db SET $status_name = '$status' WHERE $id_name = $id")->execute();;
	$link->prepare("INSERT INTO record (r_date,r_text,r_name,r_account,r_ip) VALUES(NOW(),'$db 資料狀態修改','" . $_SESSION["dominator_name"] . "','" . $_SESSION["dominator_account"] . "','" . $_SESSION["dominator_ip"] . "')")->execute();; //執行sql語法
	$link = null; //關閉資料庫
	echo "1";
	exit();
} else {
	exit();
}
