<?php
	if (file_exists('list.csv'))
	{
		$list = array();
		$cont = file("list.csv");
		foreach ($cont as $line)
		{
			$num = explode(";", $line);
			$list[$num[0]] = $num[1];
		}
		echo json_encode($list);
	}
?>