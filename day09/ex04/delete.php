<?php
	if(file_exists('list.csv') && isset($_GET['id']))
	{
		$string;
		$cont = file("list.csv");
		foreach ($cont as $line)
		{
			$num = explode(";", $line);
			if ($num[0] != $_GET['id'])
				$string .= $num[0].";".$num[1];
		}
		file_put_contents("list.csv", $string);
	}
?>
