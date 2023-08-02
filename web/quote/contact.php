<?php
header("Content-Type: text/html; charset=utf-8");
include '../dominator/system/ready.mak';
include 'bg_include_data.php';

session_start();

$web_page = "https://" . $_SERVER['HTTP_HOST'];

if ($secret) {
	if (isset($_POST['g-recaptcha-response'])) {
		$secret_key = $secret;
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'];
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$data = curl_exec($curl);
		curl_close($curl);
		$responseCaptchaData = json_decode($data);
		if ($responseCaptchaData->success) {
			$temp["success"] = true;
		} else {
			$temp["success"] = false;
		}
	}
} else $temp["success"] = true;

if (!isset($_COOKIE["captcha"])) {
	header("Location:../");
	exit();
}
if ($temp["success"] &&  isset($_COOKIE["captcha"])) {
	if (!isset($name) || $name == '' || !isset($tel) || $tel == '' ||  !isset($ip) || $ip == '') {
		header("Location:../contact.php");
		exit();
	} else {
		require("../plug_in/PHPMailer/PHPMailerAutoload.php");

		$addr = $addr1 . $addr2;
		$link->prepare("INSERT INTO `contact` (c_date,c_name,c_tel,c_mail,c_addr,c_title,c_text,c_ip,c_status) 
								VALUES(NOW(),'$name','$tel','$mail','$addr','$title','$text','$ip',1)")->execute(); //執行sql語法

		//移除captcha						
		unset($_COOKIE['captcha']);
		setcookie("captcha", "", time() - 3600);

		//寄件信箱
		$query = "SELECT d_id,d_text FROM `document` WHERE d_id IN(1,7,8,11,12,13,14,15,16)";
		$mail_data = sql_data($query, $link, 2, "d_id");

		$mail_title = $mail_data[1]["d_text"];
		//收件信箱
		$result1 = $link->prepare("SELECT m_account FROM `mail`", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$result1->execute();

		$send_mail = new PHPMailer();
		$send_mail->isSMTP();
		$send_mail->From = $mail_data[11]["d_text"];
		$send_mail->Username = $mail_data[11]["d_text"]; //使用信箱的帳號
		$send_mail->Password = $mail_data[12]["d_text"]; //使用信箱的密碼
		$send_mail->Host = $mail_data[13]["d_text"];
		$send_mail->Port = $mail_data[14]["d_text"];
		if ($mail_data[15]["d_text"] == "1") $send_mail->SMTPSecure = "tls";
		elseif ($mail_data[15]["d_text"] == "2") $send_mail->SMTPSecure = "ssl";
		else $send_mail->SMTPSecure = false;
		if ($mail_data[16]["d_text"] == "1") $send_mail->SMTPAuth = true;
		else $send_mail->SMTPAuth = false;
		$send_mail->FromName =  $mail_title; // 寄件者名稱
		$send_mail->isHTML(true); // send as HTML
		while ($row1 = $result1->fetch(PDO::FETCH_NUM)) $send_mail->AddBCC($row1[0], $mail_title . "管理者"); //密件副本收件信箱

		$send_mail->Subject = "「" . $mail_title . "」聯絡訊息"; //信件標題			
		$send_mail->Body = '<!DOCTYPE html>
								<html lang="en">
									<head>
									    <meta charset="UTF-8">
									    <meta name="viewport" content="width=device-width, initial-scale=1.0">
									    <meta http-equiv="X-UA-Compatible" content="ie=edge">
									    <title>black_2</title>
									</head>
									<body>
									    <div style="width: 420px; background: #f2f2f2; padding: 30px;font-size: 14px; margin: 0 auto; font-family: Microsoft JhengHei;">
									        <h3>聯絡人訊息</h3>
									        <hr>
									        <p><b>留言時間：</b></p>
									        <p>' . date("Y-m-d H:i:s") . '</p>
									        <p><b>聯絡姓名：</b></p>
									        <p>' . $name . '</p>
									        <p><b>聯絡電話  </b></p>
									        <p>' . $tel . '</p>
											<p><b>公司行號  </b></p>
									        <p>' . $title . '</p>
									        <p><b>內容：</b></p>
									        <p>' . str_replace("\\r\\n", "<br/>", html_decode($text)) . '</p>
									    </div>
									</body>
								</html>';

		$send_mail->Send();
		echo $send_mail->ErrorInfo;
		$script = 'alert("您的聯絡訊息已送出，我們將會儘速處理，謝謝您的來信。");' . 'location.href = "' . $web_page . '";';
	}
} else $script = 'alert("操作流程錯誤，請照正常程序操作。");' . 'history.go(-1);';
$link = null; //關閉資料庫連結

// 	echo "<script>$script</script>";//執行導頁或輸出訊息後導頁
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<?php echo html_decode($mail_data[7]["d_text"]); ?>
</head>

<body>
	<?php echo html_decode($mail_data[8]["d_text"]); ?>
	Please wait....
	<script>
		function thx() {
			<?php echo $script; ?>
		}
		setTimeout("thx()", 100);
	</script>
</body>

</html>