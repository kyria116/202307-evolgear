<?php
/*
	 * 這是用來將查詢結果轉存excel檔。
	 * 產生的檔案將存放在"../excel_download/"內。
	 * 如在欄位標題需以中文呈現，則需在SQL語法內另定義欄位中文名稱。
	 */
include '../system/ready.mak';
include '../system/session.php';

if ($Authenticate == true) {
	if (!isset($id) || $id == "" || !is_numeric($id)) {
		header("Location:../paging/index.php");
		exit();
	}
	$i = 0; //不顯示索引值(就是不顯示第一個欄位)
	switch ($id) {
		case 1:
			$sql = "SELECT c_id,c_date AS '訊息時間',c_name AS '聯絡人',c_tel AS '聯絡電話',c_title AS '服務項目',c_text AS '內容' 
						FROM `contact` WHERE " . $_GET["search"] . " ORDER BY c_date DESC";
			// 				echo $sql;
			break;
			// 			case 2:
			// 				$sql = "SELECT o_id,o_date AS '報名時間',o_no AS '報名單號',o_sum AS '總金額',o_fname AS '英文姓',o_gname AS '英文名',o_cname AS '中文姓名',o_title1 AS '稱謂',
			// 						o_unit AS '服務單位',o_title2 AS '職稱',o_tel AS '電話',o_mail AS '電子信箱',o_meal AS '餐飲需求',o_nationality AS '國籍',o_addr AS '地址',
			// 						(CASE WHEN o_iastam = '1' THEN '是' WHEN o_iastam = '2' THEN '否' END) AS 'IASTAM 會員',(CASE WHEN o_ashm = '1' THEN '是' WHEN o_ashm = '2' THEN '否' END) AS 'ASHM 會員',
			// 						(CASE WHEN o_student = '1' THEN '是' WHEN o_student = '2' THEN '否' END) AS '研究生',o_file AS '證明文件檔名',
			// 						(CASE WHEN o_mode = '1' THEN '信用卡' END) AS '付款方式',(CASE WHEN o_status = '1' THEN '交易完成' WHEN o_status = '2' THEN '交易取消' END) AS '報名狀態' 
			// 						FROM `orders` WHERE 1 ".$_GET["search"]." ORDER BY o_date DESC";
			// 				echo $sql;
			// 				break;
		default:
			error:
			header("Location:../paging/index.php");
			exit();
	}

	$result = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$result->execute();

	$str = ""; //用來儲存稍後要寫進xls檔的字串
	$j = $i;

	while ($field_data = $result->fetch(PDO::FETCH_ASSOC)) {
		if ($j != 0) { //連結資料表的欄位名稱
			$field_name = array_keys($field_data);
			$str .= $field_name[$j]; //取得欄位名稱並寫入字串
			$str .= ","; //換欄位
		}
		$j++;
	}

	$result->execute();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //連結資料表的內容
		$str .= "\n"; //換行
		$j = $i;
		$row["聯絡電話"] =  "\t" . $row['聯絡電話'];
		foreach ($row as $data) { //取得內容
			if ($j != 0) $str .= html_decode(str_replace(array(",", "\n", "\\n", "\n\r", "\\n\\r", "\r", "\\r"), "，", $data)) . ","; //寫入字串並換欄位
			$j++;
		}
	}
	$link = null;

	$file_name = "../../excel_download/export_results.csv"; //定義檔名及儲存位址
	$utf8_big5 = mb_convert_encoding($str, "big5", "UTF-8"); //將字串轉換為big5編碼
	$fp = fopen($file_name, "w+"); //開啟檔案，給予清空後寫入的權限
	fwrite($fp, $utf8_big5); //寫入檔案
	fclose($fp); //關閉檔案

	header("location:$file_name?" . strtotime("now")); //下載csv檔
} else exit();
