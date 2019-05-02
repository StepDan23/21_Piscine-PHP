#! /usr/bin/php
<?php
	if ($argc > 1)
	{
		if (!preg_match("/(^[a-zA-Z]+) (\d{1,2}) ([a-zA-Zéû]+) (\d{4}) (\d{2}):(\d{2}):(\d{2})$/", $argv[1], $date))
			return (print("Wrong Format\n"));
		else if (!preg_match("/([lL]undi|[mM]ardi|[mM]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche)/", $date[1]))
			return (print("Wrong Format\n"));
		else if (!preg_match("/([Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]oût|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre)/", $date[3]))
			return (print("Wrong Format\n"));
		$month = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet",
										"août", "septembre", "octobre", "novembre", "décembre");
		$date[3] = strtolower($date[3]);
		$month_id = array_search($date[3], $month) + 1;
		date_default_timezone_set("Europe/Paris");
		echo mktime($date[5], $date[6], $date[7], $month_id, $date[2], $date[4])."\n";
	}
?>