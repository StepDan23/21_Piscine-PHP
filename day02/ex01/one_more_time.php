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
		if ($date[7] > 59)
			exit ("Wrong Format\n");
		$month = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet",
										"août", "septembre", "octobre", "novembre", "décembre");
		$day = array("lundi", "mardi","mercredi","jeudi","vendredi","samedi","dimanche");
		$date[1] = strtolower($date[1]);
		$date[3] = strtolower($date[3]);
		$month_id = array_search($date[3], $month) + 1;
		$date_id = array_search($date[1], $day) + 1;
		if (!checkdate($month_id, $date[2], $date[4]))
			exit ("Wrong Format\n");
		date_default_timezone_set("Europe/Paris");
		$time = mktime($date[5], $date[6], $date[7], $month_id, $date[2], $date[4]);
		$day_cal = date('N', $time);
		if ($day_cal == $date_id)
			echo "$time\n";
		else
			exit ("Wrong Format\n");
	}
?>