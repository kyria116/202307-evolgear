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
	$sqlstr = ""; //用來存放需變更sql語法
	$check_name = ""; //用來存放需重新排序的欄位名
	$check_value = ""; //用來存放需重新排序的號碼
	$file_count = 0; //用於檔名上，避免檔名重覆

	foreach ($_POST as $key => $value) { //將post過來的參數取出
		$check = explode("-", $key);
		if (!isset($check[1])) {
			if ($sqlstr != "") $sqlstr .= ","; //確認是否是第一個參數，如果不是就在字串中加上逗號
			$order = explode("_", $key); //用來確認是否為排序欄位的陣列
			if ($order[1] == "order") { //確認是否為排序欄位
				$check_name = $key; //用來存放排序欄位名
				$check_value = $value; //用來存放需排序的號碼
			}
			$sqlstr .= "$key = '" . filtration($value, $link) . "'"; //將參數放入字串中
		}
	}
	foreach ($_FILES as $key => $value) { //將post過來的參數取出
		if ($value["name"] != "") { //確認是否有檔案傳入
			if ($sqlstr != "") $sqlstr .= ","; //確認是不是第一個參數，如果不是就在字串中加上逗號
			$time = date("Y_m_d_His") . $file_count; //設定字串為日期加時間，用於檔案名稱
			$file_dir = "../../upload/"; //設定檔案儲存位址
			$file_url = $value["tmp_name"]; //建立檔案傳入連結
			if ($file_url != "") { //確認是否有檔案傳入
				$name_array = explode(".", $value["name"]);
				$sub_name = "." . strtolower($name_array[count($name_array) - 1]);

				if ($sub_name == ".jpg" || $sub_name == ".jpeg" || $sub_name == ".png") {
					$src = imageStart($file_url, $sub_name);
					$src_w = imagesx($src);
					$src_h = imagesy($src);
					$need_w = isset($_POST["w-$key"]) ? ($_POST["w-$key"] == "" ? 10000 : $_POST["w-$key"]) : 10000;
					$need_h = isset($_POST["h-$key"]) ? ($_POST["h-$key"] == "" ? 10000 : $_POST["h-$key"]) : 10000;
					if ((!isset($_POST["w-$key"]) && !isset($_POST["h-$key"])) || ($_POST["w-$key"] == "" && $_POST["h-$key"] == "") || ($src_w <= $_POST["w-$key"] && $src_h <= $_POST["h-$key"])) {
						goto no_change;
					} else {
						if (($src_w / $src_h) <= ($need_w / $need_h)) {
							$thumb_h = $need_h;
							$thumb_w = intval($need_h / $src_h * $src_w);
						} else {
							$thumb_w = $need_w;
							$thumb_h = intval($need_w / $src_w * $src_h);
						}
					}
					$thumb = imagecreatetruecolor($thumb_w, $thumb_h);
					imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
					if (imageEnd($thumb, $file_dir . $value, $sub_name)) {
						$search_row = $link->prepare("SELECT $key FROM `$db` WHERE $id_name = $id"); //執行sql語法
						$search_row->execute();
						$row = $search_row->fetch(PDO::FETCH_NUM);
						@unlink("../../upload/$search_row[0]"); //刪除檔案
					}
				} elseif ($sub_name == ".pdf") {
					if (file_exists("../../pdfdownload/" . $value["name"])) {
						echo "<script>alert('檔案已存在，請勿重複上傳相同檔案');history.go(-1);</script>"; //執行導頁或輸出訊息後導頁
						exit();
					}
					if (move_uploaded_file($file_url, "../../pdfdownload/" . $value["name"])) { //確認上傳檔案是否成功

						$search_row = $link->prepare("SELECT $key FROM `$db` WHERE $id_name = $id"); //執行sql語法
						$search_row->execute();
						$row = $search_row->fetch(PDO::FETCH_NUM);
						if ($row) @unlink("../../pdfdownload/$row[0]"); //刪除檔案

						$size = $value["size"];
						//將參數放入字串中
						if ($db == "d_mclass") $sqlstr .= "dm_size = '{$size}',";
						else if ($db == "download") $sqlstr .= "d_size = '{$size}',";
						$value = $value["name"];
					}
				} elseif ($sub_name == ".doc" || $sub_name == ".docx" || $sub_name == ".xls" || $sub_name == ".xlsx" || $sub_name == ".csv" || $sub_name == ".webp" || $sub_name == ".svg") {
					no_change:
					$value = $time . $sub_name; //重新為檔案命名
					if (move_uploaded_file($file_url, $file_dir . $value)) { //確認上傳檔案是否成功
						$search_row = $link->prepare("SELECT $key FROM `$db` WHERE $id_name = $id"); //執行sql語法
						$search_row->execute();
						$row = $search_row->fetch(PDO::FETCH_NUM);
						echo $row[0];
						@unlink("../../upload/$row[0]"); //刪除檔案
					}
				} else {
					echo "<script>alert('檔案過大無法上傳成功，請確認檔案大小');history.go(-1);</script>"; //執行導頁或輸出訊息後導頁
					exit();
				}
			} else {
				echo "<script>alert('檔案過大無法上傳成功，請確認檔案大小');history.go(-1);</script>"; //執行導頁或輸出訊息後導頁
				exit();
			}
			$sqlstr .= "$key = '{$value}'"; //將參數放入字串中
		}
		$file_count++; //將檔名末碼加1，避免檔名重覆
	}
	if ($check_name != "" && is_numeric($check_value)) { //確認是否有需要確認排序的必要
		$check_result = $link->prepare("SELECT $check_name FROM $db WHERE $id_name = $id", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  //執行sql語法
		$check_result->execute();
		$row = $check_result->fetch(PDO::FETCH_ASSOC);
		if ($row[$check_name] > $check_value) {
			$link->prepare("UPDATE $db SET $check_name = $check_name+1 WHERE $check_name < $row[$check_name] AND $check_name >= $check_value")->execute();
		} else {
			$link->prepare("UPDATE $db SET $check_name = $check_name-1 WHERE $check_name > $row[$check_name] AND $check_name <= $check_value")->execute();
		}
	}


	$link->prepare("UPDATE $db SET $sqlstr WHERE $id_name = $id")->execute(); //執行sql語法
	$link->prepare("INSERT INTO record (r_date,r_text,r_name,r_account,r_ip) VALUES(NOW(),'$db 資料修改：$id','" . $_SESSION["dominator_name"] . "','" . $_SESSION["dominator_account"] . "','" . $_SESSION["dominator_ip"] . "')")->execute(); //執行sql語法

	echo "<script>alert('" . $cms_lang[23][$language] . $cms_lang[41][$language] . "');location.href='" . $url_set . $_SESSION["dom_url"] . "';</script>"; //執行導頁或輸出訊息後導頁
} else exit();
$link = null;//關閉資料庫
