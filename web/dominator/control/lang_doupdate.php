<?php
	include '../system/ready.mak';
	include '../system/session.php';
	
	if($Authenticate == true){	
		$link -> query("UPDATE `language` SET $field_name = '$value' WHERE l_id = $id");
		$link -> query("INSERT INTO `record` (r_date,r_text,r_name,r_account,r_ip) VALUES(NOW(),'language 資料狀態修改','".$_SESSION["dominator_name"]."','".$_SESSION["dominator_account"]."','".$_SESSION["dominator_ip"]."')");//執行sql語法
		$link -> close();//關閉資料庫
		exit();
	}else{
		exit();
	}
?>