<?php 
	//ini_set('session.cookie_secure','off');
	header("X-Frame-Options: SAMEORIGIN");
	$project_title = "EVOLGEAR";//專案名稱	
	
	/*
	【後台語言包】
	 */
	$language = "tw";//tw => 中文  , en => 英文
	$cms_title = array("tw" => "【".$project_title."】","en" => "【".$project_title."】");//管理後台名
	$cms_lang = array(
		1 => array("tw" => "歡迎，","en" => "Welcome,"),
		2 => array("tw" => "請輸入您的帳號、密碼","en" => "Type your user account and password"),
		3 => array("tw" => "帳號","en" => "Account"),
		4 => array("tw" => "密碼","en" => "Password"),
		5 => array("tw" => "登入","en" => "Sign in"),
		6 => array("tw" => "早安！","en" => "Good morning,"),
		7 => array("tw" => "午安！","en" => "Good afternoon,"),
		8 => array("tw" => "晚安！","en" => "Good evening,"),
		9 => array("tw" => "返回首頁","en" => "Go To INDEX"),
		10 => array("tw" => "首頁","en" => "INDEX"),
		11 => array("tw" => "源做視覺整合設計","en" => "M.A.K. Integrated Design"),
		12 => array("tw" => "觀看前台","en" => "View Website"),
		13 => array("tw" => "使用者帳戶管理","en" => "UAC"),
		14 => array("tw" => "修改密碼","en" => "Change Password"),
		15 => array("tw" => "登出","en" => "Sign out"),
		16 => array("tw" => "帳號、密碼錯誤。","en" => "Account password is incorrect."),
		17 => array("tw" => "帳號鎖定，請聯絡管理人員。","en" => "The account is invalid."),
		18 => array("tw" => "列表","en" => "List"),
		19 => array("tw" => "正常","en" => "Normal"),
		20 => array("tw" => "停權","en" => "Halt"),
		21 => array("tw" => "操作","en" => "Options"),
		22 => array("tw" => "新增","en" => "Added"),
		23 => array("tw" => "修改","en" => "Modify"),
		24 => array("tw" => "刪除","en" => "Delete"),
		25 => array("tw" => "帳戶","en" => "Account"),
		26 => array("tw" => "使用者","en" => "User name"),
		27 => array("tw" => "權限","en" => "Purview"),
		28 => array("tw" => "狀態","en" => "Status"),
		29 => array("tw" => "返回","en" => "Cancel"),
		30 => array("tw" => "請確認是否刪除？","en" => "Are you sure?"),
		31 => array("tw" => "已新增","en" => "is added."),
		32 => array("tw" => "已修改","en" => "is modify."),
		33 => array("tw" => "新密碼","en" => "New Password"),
		34 => array("tw" => "確認密碼","en" => "Confirm Password"),
		35 => array("tw" => "「原密碼」為必填資訊，請確認欄位內容是否正確！","en" => "The password is required."),
		36 => array("tw" => "「原密碼」輸入錯誤，請確認欄位內容是否正確！","en" => "Password incorrect."),
		37 => array("tw" => "「新密碼」為必填資訊，請確認欄位內容是否正確！","en" => "The new password is required."),
		38 => array("tw" => "「新密碼」至少六碼，請確認欄位內容是否正確！","en" => "The new password must contain 6 digits, consisting of numbers and alphabet letters. Please confirm that the inputs are correct."),
		39 => array("tw" => "「確認密碼」必需與「新密碼」相同，請確認欄位內容是否正確！","en" => "Please enter the same value again."),
		40 => array("tw" => "已為您修改密碼！","en" => "Password is change."),
		41 => array("tw" => "已完成。","en" => " is done."),
		42 => array("tw" => "排序","en" => "Sort order"),
		43 => array("tw" => "移動至","en" => "Move to"),
		44 => array("tw" => "編號：","en" => "NO. ")
	);

	/*文章狀態*/
	$status_data = array("0" => "草稿", "1" => "發布中");
	
	/*
	【錯誤訊息】
	 */
	//ini_set("display_errors", "Off"); // 顯示錯誤是否打開( On=開, Off=關 )
	//error_reporting(E_ALL & ~E_NOTICE);
	
	include 'function.php';
	
	$link = db_conn($project_name);//建立資料庫連線

	
	/*
	【將GET、POST轉換為同名變數】
		使用前需先建立資料庫連線
	 */
	if(count($_GET) > 0){
		foreach($_GET as $k => $v){
			if(is_array($v)) foreach($v as $vk => $vv) ${$k}[$vk] = filtration($vv,$link);
			else $$k = filtration($v,$link);
		}	
	}
	if(count($_POST) > 0){
		foreach($_POST as $k => $v){
			if(is_array($v)) foreach($v as $vk => $vv) ${$k}[$vk] = filtration($vv,$link);
			else $$k = filtration($v,$link);
		}
	}
	
	$url_set = "http://";
?>