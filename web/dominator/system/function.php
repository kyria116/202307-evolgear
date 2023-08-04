<?php
/*
 【建立資料庫連結】
	使用前需設定資料庫連線內容

TRUE：回傳陣列。
FALSE：回傳false。
*/
$project_name = "evolgear"; //資料庫&使用者名稱
function db_conn($project_name)
{
	$host = "192.168.0.169";	//資料庫主機位置
	$user = $project_name;	//資料庫的使用者帳號
	$password = "evolgear";	//資料庫的使用者密碼
	$database = $project_name;	//資料庫名稱

	//連結資料庫後告知編碼
	try {
		$link = new PDO("mysql:host=$host;dbname=$project_name;charset=UTF8", $user, $password);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$link->setAttribute(PDO::ATTR_TIMEOUT, 1);
	} catch (PDOException $e) {
		echo $e->getMessage();
		$link = null;
	}

	return $link;
}

/*
【將SQL查詢出的資料轉為陣列】
	$query：SQL語法
	$link：資料庫連線

TRUE：回傳陣列。
FALSE：回傳false。
*/
function sql_data($query, $link, $mode = 0, $idname = "", $classname = "")
{
	$result = $link->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$result->execute();

	$data = array();
	if ($result->rowCount() > 0) {
		if ($mode == "0") {
			$i = 1;
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				foreach ($row as $k => $v) $data[$i][$k] = html_decode($v);
				$i++;
			}
		} elseif ($mode == "1") while ($row = $result->fetch(PDO::FETCH_ASSOC)) foreach ($row as $k => $v) $data[$k] = html_decode($v);
		elseif ($mode == "2") while ($row = $result->fetch(PDO::FETCH_ASSOC)) foreach ($row as $k => $v) $data[$row[$idname]][$k] = html_decode($v);
		elseif ($mode == "3") while ($row = $result->fetch(PDO::FETCH_ASSOC)) foreach ($row as $k => $v) $data[$row[$classname]][$row[$idname]][$k] = html_decode($v);
	}
	return $data;
}

/*
【將變數進行htmlentities及mysqli_real_escape_string過濾】
	$variable：變數
	$link：資料庫連線
*/

function filtration($variable, $link)
{
	$variable = htmlentities(substr($link->quote(preg_replace('/[Jj][Aa][Vv][Aa][Ss][Cc][Rr][Ii][Pp][Tt]/', "", $variable)), 1, -1), ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
	return $variable;
}

/*
【將過濾過的文章進行htmlspecialchars_decode轉換符號】
	$variable：變數
*/
function html_decode($variable)
{
	$variable = htmlspecialchars_decode($variable, ENT_QUOTES);
	return $variable;
}

/*
【將陣列轉換成json格式】
	$variable：變數
*/
function json($variable)
{
	$variable = isset($variable) ? json_encode($variable, JSON_UNESCAPED_UNICODE) : "";
	return $variable;
}

/*
【判斷是否為行動裝置】
*/
function check_mobile()
{
	$regex_match = "/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
	$regex_match .= "htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
	$regex_match .= "blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
	$regex_match .= "symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
	$regex_match .= "jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
	$regex_match .= ")/i";
	return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}

/*
【後台新增/修改欄位配置】

範例：
				// 1、型態：input、date、textarea、img、file、select
				// 2、ALL：標題
				// 3、ALL：欄位名
				// 4、ALL：資料，新增請留空
				// 5、input、date、textarea：描述，可不填 / img、file：共用id，請編流水號 / select：下拉式選單資料陣列
				// 6、img：寬度 / textarea：HTML編輯器開關，0 or 1 / select：陣列如為二維，請加第二維key值 / input：限數字值為1
				// 7、img：高度 / textarea：無HTML編輯器時，為textarea行數
				$group_array =array(	//修改
					1 => array("","","",$data[],"","",""),
					2 => array("","","",$data[],"","","")
				);
				$group_array =array(	//新增
					1 => array("","","",'',"","",""),
					2 => array("","","",'',"","","")
				);
*/
function group($class, $field_title, $field_name, $field_data = "", $field_placeholder = "", $field_width = "", $field_height = "")
{
	switch ($class) {
		case "input":
			$field_placeholder = $field_placeholder == "" ? "請輸入$field_title" : $field_placeholder;
			echo "<div class='form-group $field_name'>
						<label class='col-sm-3 col-md-3 col-lg-2 control-label'>$field_title</label>
						<div class='col-sm-9 col-md-9 col-lg-10'>";
			if ($field_width == 1) {
				echo "<input type='text' class='form-control input-sm' name='$field_name'  value='$field_data' placeholder='$field_placeholder' onkeyup=";
				echo '"';
				echo "value=value.replace(/[^0-9]/g,'');";
				echo '"';
				echo "/>";
			} elseif ($field_width == 2) {
				echo "<input type='text' class='form-control input-sm' name='$field_name'  value='$field_data' placeholder='$field_placeholder' onkeyup=";
				echo '"';
				echo "value=value.replace(/[^0-9.]/g,'');";
				echo '"';
				echo "/>";
			} elseif ($field_width == 3) {
				echo "<input type='text' class='form-control input-sm' name='$field_name'  value='$field_data' placeholder='$field_placeholder' onkeyup=";
				echo '"';
				echo "value=value.replace(/[^0-9.-]/g,'');";
				echo '"';
				echo "/>";
			} else {
				echo "<input type='text' class='form-control input-sm' name='$field_name'  value='$field_data' placeholder='$field_placeholder'/>";
			}
			echo "	</div>
					</div>";
			break;
		case "file":
			if ($field_data != "") {
				if ($field_width == 'img') {
					echo "<div class='form-group $field_name'>
								<label class='col-sm-3 col-md-3 col-lg-2 control-label'>$field_title</label>
								<div class='col-sm-9 col-md-9 col-lg-10'>
									<a href='../../upload/$field_data' target='_blank'><img src='../../upload/$field_data' style='max-width:200px;'></a>
									<br/><a href='javascript:delfile(" . '"' . $field_name . '"' . ");' class='btn btn-danger btn-xs'><i class='fa fa-times'></i> 刪除檔案《刪除後將無法回復》</a>
								</div>
							</div>";
				} else {
					echo "<div class='form-group $field_name'>
								<label class='col-sm-3 col-md-3 col-lg-2 control-label'>$field_title</label>
								<div class='col-sm-9 col-md-9 col-lg-10'>
									<a href='../../upload/$field_data' target='_blank'><img src='../img/download.png'></a>
									<br/><a href='javascript:delfile(" . '"' . $field_name . '"' . ");' class='btn btn-danger btn-xs'><i class='fa fa-times'></i> 刪除檔案《刪除後將無法回復》</a>
								</div>
							</div>";
				}
			}
			$type = 1;
			echo "<div class='form-group $field_name'>
							<label class='col-sm-3 col-md-3 col-lg-2 control-label'>選擇【 $field_title 】</label>
							<div class='col-sm-9 col-md-9 col-lg-10'>
								<a class='btn_addPic' href='javascript:void(0);'>
									<span class='filebn'><em>+</em>選擇 $field_title</span> 
									<input class='filePrew' tabindex='3' type='file' name='$field_name' id='file_id$field_placeholder' size='3' accept='$field_width' onchange='file_upload($type,$field_placeholder);'>
								</a>
								<span id='filename$field_placeholder'>尚未選擇 $field_title 【檔案上傳限制大小為16M，檔案過大時檔案將無法更換】</span>
							</div>
						</div>";
			break;
		case "img":
			if ($field_data != "") {
				echo "<div class='form-group $field_name'>
							<label class='col-sm-3 col-md-3 col-lg-2 control-label'>$field_title</label>
							<div class='col-sm-9 col-md-9 col-lg-10'>
								<img src='../../upload/$field_data' style='max-width:100%;max-height:500px;'>
								<br/><a href='javascript:delfile(" . '"' . $field_name . '"' . ");' class='btn btn-danger btn-xs'><i class='fa fa-times'></i> 刪除圖片《刪除後將無法回復》</a>
							</div>
						</div>";
			}
			$type = 2;
			echo "<div class='form-group $field_name'>
						<label class='col-sm-3 col-md-3 col-lg-2 control-label'>選擇【 $field_title 】</label>
						<div class='col-sm-9 col-md-9 col-lg-10'>
							<input type='hidden' name='$field_name' id='img_name$field_placeholder' value='$field_data'>
							<a class='btn_addPic' href='javascript:void(0);'>
								<span class='filebn'><em>+</em>選擇 $field_title</span> 
								<input class='filePrew' tabindex='3' type='file' id='file_id$field_placeholder' size='3' onchange='file_upload($type,$field_placeholder,$field_width,$field_height);'>
								<input type='hidden' name='w-$field_name' value=''>
								<input type='hidden' name='h-$field_name' value=''>
							</a>
							<span id='filename$field_placeholder'>尚未選擇 $field_title ";
			if ($field_width != "" && $field_height != "") echo "建議尺寸：$field_width*$field_height<span style='color:red;font-weight:bold;'>【圖檔上傳限制大小為4M，圖檔過大時圖片將無法更換】</span>";
			elseif ($field_width != "") echo "<span style='color:red;font-weight:bold;'>(圖片寬度為：$field_width )【圖檔上傳限制大小為4M，圖檔過大時圖片將無法更換】</span>";
			elseif ($field_height != "") echo "<span style='color:red;font-weight:bold;'>(圖片高度為：$field_height )【圖檔上傳限制大小為4M，圖檔過大時圖片將無法更換】</span>";
			else echo "建議尺寸：$field_text<span style='color:red;font-weight:bold;'>【圖檔上傳限制大小為4M，圖檔過大時圖片將無法更換】</span>";
			echo "		</span>
							<div width='100%'>
								<img id='preview$field_placeholder' style='max-width: 600px; max-height: 600px;'>
							</div>
						</div>
					</div>";
			break;
		case "textarea":
			$field_placeholder = $field_placeholder == "" ? "請輸入$field_title" : $field_placeholder;
			$field_width = $field_width == 1 ? "class='ckeditor'" : "";
			echo "<div class='form-group $field_name'>
						<label class='col-sm-3 col-md-3 col-lg-2 control-label'>$field_title</label>
						<div class='col-sm-9 col-md-9 col-lg-10'>
							<textarea name='$field_name' rows='$field_height' style='width: 100%;' placeholder='$field_placeholder' $field_width>$field_data</textarea>
						</div>
					</div>";
			break;
		case "date":
			$field_placeholder = $field_placeholder == "" ? "請選擇$field_title" : $field_placeholder;
			$field_today = $field_data == "" ? ($field_width == 1 ? "" : date('Y-m-d')) : $field_data;
			echo "<div class='form-group $field_name'>
						<label class='col-sm-3 col-md-3 col-lg-2 control-label'>$field_title</label>
						<div class='col-sm-9 col-md-9 col-lg-10'>
							<input type='date' name='$field_name' value='$field_today' class='form-control input-sm' placeholder='$field_placeholder'/>
						</div>
					</div>";
			break;
		case "select":
			if ($field_data) {
				$tag_array = explode(",", $field_data);
				foreach ($tag_array as $v) $tag[$v] = $v;
			}
			echo "<div class='form-group $field_name'>
						<label class='col-sm-3 col-md-3 col-lg-2 control-label'>$field_title</label>
						<div class='col-sm-9 col-md-9 col-lg-10'>
							<select ";
			echo $field_height == 1 ? "multiple='multiple' onchange='$(" . '"#' . $field_name . '_input"' . ").val($(this).val());'>" : "name='$field_name'>";
			if ($field_placeholder != '') {
				foreach ($field_placeholder as $k => $v) {
					echo "<option value='$k' ";
					echo $field_data == "" ? "" : ($field_height != 1 ? ($k == $field_data ? "selected" : "") : (isset($tag[$k]) ? "selected" : ""));
					if ($field_width == "")	echo ">$v</option>";
					else echo ">$v[$field_width]</option>";
				}
			}
			echo "			</select>";
			echo $field_height != 1 ? "" : "<input type='hidden' name='$field_name' id='" . $field_name . "_input' value='$field_data'>";
			echo "		</div>
					</div>";
			break;
	}
}

/*
【判斷$group_array為新增或修改】
*/
function g_array($g_array, $data = "")
{
	foreach ($g_array as $k => $v) {
		if (@isset($data[$v[2]]))	$group_array[$k] = array($v[0], $v[1], $v[2], $data[$v[2]], $v[3], $v[4], $v[5]);
		else	$group_array[$k] = array($v[0], $v[1], $v[2], "", $v[3], $v[4], $v[5]);
	}
	return $group_array;
}

/*
【將日期轉換為國字星期】
$date => 需轉換的日期
*/
function get_chinese_weekday($date)
{
	$w = date("w", strtotime($date));
	$week = array(0 => "日", 1 => "一", 2 => "二", 3 => "三", 4 => "四", 5 => "五", 6 => "六");
	return $week[$w];
}

/*
【縮圖使用function】
*/
function imageStart($file_url, $sub_name)
{
	if ($sub_name == ".png") return imagecreatefrompng($file_url);
	else return imagecreatefromjpeg($file_url);
}
function imageEnd($thumb, $newName, $sub_name)
{
	if ($sub_name == ".png") return imagepng($thumb, $newName);
	else return imagejpeg($thumb, $newName);
}

/*
 【驗證身份證字號】
	$idno：身份證字號

 	TRUE：驗證成功。
 	FALSE：驗證失敗。
 */
function idno($idno)
{
	$idno = strtoupper($idno);
	$idno = str_split($idno);
	if (count($idno) > 10) goto error;
	if ($idno[1] != 1 && $idno[1] != 2) goto error;
	$city = array("A" => 10, "B" => 11, "C" => 12, "D" => 13, "E" => 14, "F" => 15, "G" => 16, "H" => 17, "I" => 34, "J" => 18, "K" => 19, "L" => 20, "M" => 21, "N" => 22, "O" => 35, "P" => 23, "Q" => 24, "R" => 25, "S" => 26, "T" => 27, "U" => 28, "V" => 29, "W" => 32, "X" => 30, "Y" => 31, "Z" => 33);
	$city_no = str_split($city[$idno[0]]);
	$idno[0] = $city_no[1];
	$j = 0;
	$var = 0;
	for ($i = 9; $i >= 1; $i--) {
		$var = $var + ($idno[$j] * $i);
		$j++;
	}
	$var = ($var + $city_no[0]) % 10;
	if ($idno[9] == (10 - $var) || ($idno[9] == 0 && $var == 0)) return true;
	else {
		error:
		return false;
	}
}

/*
 * 【非同步傳送】
 *	傳入參數：
 *	$url：呼叫網址
 * 	$data：傳送參數，
 * 		如使用get方式傳送，請直接將參數帶入網址中，
 * 		此變數僅為post方式傳送時使用，
 * 		並請以一維陣列帶入，key值為參數名稱。
 * 	$json：傳送格式
 * 		0 => 純文字
 * 		1 => json
 * 	$type：傳送型態
 * 		0 => post
 * 		1 => get
 */
function curl($url, $data = "", $json = "", $type = "")
{
	$ch = curl_init();
	if ($data) {
		if ($type) {
			$GetData = "";
			foreach ($data as $k => $v) {
				if ($GetData == "") $GetData = "?";
				else $GetData .= "&";
				$GetData .= $k . "=" . $v;
			}
			$url .= $GetData;
		} else {
			$PostData = "";
			if ($json) {
				$PostData = json_encode($data);
				curl_setopt(
					$ch,
					CURLOPT_HTTPHEADER,
					array(
						'Content-Type: application/json',
						'Content-Length: ' . strlen($PostData)
					)
				);
			} else {
				foreach ($data as $k => $v) {
					if ($PostData != "") $PostData .= "&";
					$PostData .= $k . "=" . $v;
				}
			}
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $PostData);
		}
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$temp = json_decode(curl_exec($ch));
	curl_close($ch);
	return $temp;
}

/*
 * 【二維陣列正向排序】
 * 	可配合usort(ARRAY, build_sorter('KEY'));使用
 */
function build_sorter($key)
{
	return function ($a, $b) use ($key) {
		if ($a[$key] == $b[$key]) return 0;
		return ($a[$key] > $b[$key]) ? 1 : -1;
	};
}

/*
 * 【二維陣列反向排序】
 * 	可配合usort(ARRAY, build_rsorter('KEY'));使用
 */
function build_rsorter($key)
{
	return function ($a, $b) use ($key) {
		if ($a[$key] == $b[$key]) return 0;
		return ($a[$key] > $b[$key]) ? -1 : 1;
	};
}

/*
 * 【優化var_dump】
 */
function pre_var_dump($key)
{
	echo '<pre>', var_dump($key), '</pre>';
}
function pre_var_export($data, $control = '')
{
	if ($control) echo '<pre>', var_dump($data), '</pre>';
	else echo '<pre>', var_export($data), '</pre>';
}

/*
 * 【產生新密碼 / 數字】
 * $count：碼數
 * $type：產生型態
 * 		0 -> 英文大小寫+數字
 * 		1 -> 純數字
 */
function rand_pw($count = 6, $type = 0)
{
	$temp = "";
	for ($i = 1; $i <= $count; $i = $i + 1) {
		$c = $type == 0 ? rand(1, 3) : 1;
		$temp .= $c == 1 ? rand(0, 9) : ($c == 2 ? chr(rand(65, 90)) : chr(rand(97, 122)));
	}
	return $temp;
}
