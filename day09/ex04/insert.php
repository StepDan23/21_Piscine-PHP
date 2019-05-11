<?php
	$arr = array();
	if (isset($_GET['todo']))
	{
		$max = 0;
		$cont = file("list.csv");
		foreach ($cont as $line)
		{
			$num = explode(";", $line);
			if ($num[0] >= $max)
				$max = $num[0] + 1;
		}
		file_put_contents("list.csv", $max.";".$_GET['todo'].PHP_EOL , FILE_APPEND);
		echo $max;
	}
?>