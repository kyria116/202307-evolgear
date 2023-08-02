<?php

/*
【權限判斷】
*/
if (isset($page_name)) {
	$query = "SELECT m_main_purview,m_sub_purview FROM menu WHERE m_url = '$page_name'";
	$data = sql_data($query, $link);

	if ($data) {
		$purview = 0;
		if (
			$data[1]["m_main_purview"] > $_SESSION["dominator_main"] ||
			($data[1]["m_main_purview"] == $_SESSION["dominator_main"] &&
				($data[1]["m_sub_purview"] == 0 || $_SESSION["dominator_sub"] == 0 || $data[1]["m_sub_purview"] == $_SESSION["dominator_sub"]))
		)
			$purview = 1;
		if (!$purview) header("Location:index.php");
	}
}
