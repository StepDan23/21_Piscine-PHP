#! /usr/bin/php
<?php
	if ($argc > 1)
	{
		if (!preg_match("/(^\w+) (\d{1,2}) (\w+) (\d{4}) (\d{2}):(\d{2}):(\d{2})$/", $argv[1], $date))
			exit ("Wrong Format\n");
		else if (!preg_match("/([lL]undi|[mM]ardi|[mM]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche)/", $date[1]))
			exit ("Wrong Format\n");
		else if (!preg_match("/([Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]oût|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre)/", $date[3]))
			exit ("Wrong Format\n");
		// else if ($date[7] > 59 || $date[6] > 59 || $date[5] > 24)
		// 	exit ("Wrong Format\n");
		$month = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet",
										"août", "septembre", "octobre", "novembre", "décembre");
		$date[3] = strtolower($date[3]);
		$month_id = array_search($date[3], $month) + 1;
		// if ($month_id == 1 || $month_id == 3 || $month_id == 5 || $month_id == 7 || $month_id == 8 ||
		// 																		$month_id == 10 || $month_id == 12)
		// 	if ($date[2] > 31)
		// 		exit ("Wrong Format\n");
		// if ($month_id == 4 || $month_id == 6 || $month_id == 9 || $month_id == 11)
		// 	if ($date[2] > 31)
		// 		exit ("Wrong Format\n");
		// if ($month_id == 2 && $date[2] > 28)
		// 		exit ("Wrong Format\n");
		// checkdate
		// date flag n
		date_default_timezone_set("Europe/Paris");
		echo mktime($date[5], $date[6], $date[7], $month_id, $date[2], $date[4])."\n";
	}
?>