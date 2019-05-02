#! /usr/bin/php
<?php
	if (!($fd = fopen("/var/run/utmpx", r)))
		return (0);
	date_default_timezone_set("Europe/Moscow");
	while ($buf = fread($fd, 628))
	{
		$data = unpack("a256u_name/a4u_pid/a32p_name/ipid/itype/iunix_time", $buf);
		if ($data[type] == 7)
			echo $data[u_name]." ".$data[p_name]."  ".date("M  j H:i", $data[unix_time])."\n";
	}
?>