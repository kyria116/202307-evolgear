<?php
/*
	使用者資料表名：$db_set
	需建立的必要資料欄：
	1、$id_set：int(3) 索引值。
	2、$account_set：varchar(255) 使用者帳號。
	3、$password_set：varchar(255) 使用者密碼。
	4、$name_set：varchar(255) 使用者名稱。
	5、$check_set：varchar(5) 儲存'Y'或'N'。
	6、$error_set：int(3) 儲存登入錯誤的次數。
	*/

include 'ready.mak';
header("Content-Type: text/html; charset=utf-8"); //告知編碼

$username = str_replace("'", "", $username);
$username = str_replace('"', "", $username);
$password = str_replace("'", "", $password);
$password = str_replace('"', "", $password);

// 	資料庫資訊
$db_set = "user";
$id_set = "u_id";
$name_set = "u_name";
$account_set = "u_account";
$password_set = "u_password";
$main_purview_set = "u_main_purview";
$sub_purview_set = "u_sub_purview";
$check_set = "u_check";
$error_set = "u_error";

//用來確認帳號是否正常可使用的sql
$check_query = "SELECT $check_set,$error_set,$id_set FROM $db_set WHERE $account_set = :username";
$check_result = $link->prepare($check_query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$check_result->bindParam(':username', $username, PDO::PARAM_STR);
$check_result->execute();
$check_row = $check_result->fetch(PDO::FETCH_OBJ);

$script = '';	//用來儲存對話框訊息

if (@$check_result->rowCount() == 1) { //確認是否只有抓到一筆帳號紀錄，如不只一筆或沒資料，則應並非以正常程序登入或帳號錯誤，所以直接錯誤。

	if ($check_row->$check_set == "Y") { //確認帳號是否正常可使用
		//用以比對帳號密碼是否正確的sql
		$password = md5($password);
		$user_result = $link->prepare("SELECT $id_set,$name_set,$main_purview_set,$sub_purview_set FROM $db_set WHERE $account_set = :user AND $password_set = :pass", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$user_result->bindParam(':user', $username, PDO::PARAM_STR);
		$user_result->bindParam(':pass', $password, PDO::PARAM_STR);
		$user_result->execute();
		$user_row = $user_result->fetch(PDO::FETCH_OBJ);

		if (@$user_result->rowCount() == 1) { //判斷帳號密碼是否正確
			//登入成功後，將錯誤次數歸零的sql
			$link->prepare("UPDATE $db_set SET $error_set = 0 WHERE $id_set=" . $user_row->$id_set)->execute();

			if (!empty($_SERVER['HTTP_CLIENT_IP'])) $myip = $_SERVER['HTTP_CLIENT_IP'];
			else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else $myip = $_SERVER['REMOTE_ADDR'];

			//並寫入登入紀錄
			$u_name = $user_row->$name_set;
			$sql = "INSERT INTO record (r_date,r_text,r_name,r_account,r_ip) VALUES(NOW(),'登入',:r_name,:r_account,:myip)";
			$stmt = $link->prepare($sql);
			$stmt->bindParam(':r_name', $user_row->$name_set, PDO::PARAM_STR);
			$stmt->bindParam(':r_account', $username, PDO::PARAM_STR);
			$stmt->bindParam(':myip', $myip, PDO::PARAM_STR);
			$stmt->execute();

			//開啟session暫存需要的資料
			session_start();
			$credentials = md5(date("Y") . $project_name . date("md"));
			$_SESSION[$credentials] = true;
			$_SESSION["dominator_id"] = $user_row->$id_set;
			$_SESSION["dominator_account"] = $username;
			$_SESSION["dominator_name"] = $user_row->$name_set;
			$_SESSION["dominator_main"] = $user_row->$main_purview_set;
			$_SESSION["dominator_sub"] = $user_row->$sub_purview_set;
			$_SESSION["dominator_ip"] = $myip;

			$script = 'location.href="../paging/index.php"'; //導頁到首頁
		} else { //帳號密碼錯誤
			$error = ""; //如需鎖帳號時使用
			if ($check_row->$error_set == 2) { //判斷先前是否已錯誤2次，此次錯為第3次，即將鎖帳號
				$error = ",$check_set = 'N'";
			}

			//用於增加錯誤次數或鎖帳號的sql
			$error_query = "UPDATE $db_set SET $error_set = $error_set + 1 $error WHERE $id_set =" . $check_row->$id_set;
			$link->prepare($error_query)->execute();

			$script = 'alert("' . $cms_lang[16][$language] . '");' . 'location.href = "../index.php";'; //告知錯誤後導回登入頁
		}
	} else { //如果帳號已鎖定
		$script = 'alert("' . $cms_lang[17][$language] . '");' . 'location.href = "../index.php";'; //告知錯誤後導回登入頁
	}
} else { //如帳號錯誤或抓到的資料不只一筆
	$script = 'alert("' . $cms_lang[16][$language] . '");' . 'location.href = "../index.php";'; //告知錯誤後導回登入頁
}

$link = null;
echo "<script>$script</script>";//執行導頁或輸出訊息後導頁
