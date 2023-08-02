<?php
include '../system/ready.mak';
include 'session.php'; //確認是否已登入

//寫入登出紀錄
$link->exec("INSERT INTO record (r_date,r_text,r_name,r_account,r_ip) VALUES(NOW(),'登出','" . $_SESSION["dominator_name"] . "','" . $_SESSION["dominator_account"] . "','" . $_SESSION["dominator_ip"] . "')"); //執行sql語法	
$link = null;

session_destroy(); //清空session
header("location:../index.php"); //導回登入頁
