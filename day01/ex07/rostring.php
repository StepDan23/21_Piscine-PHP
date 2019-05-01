#! /usr/bin/php
<?php
	if ($argc > 1)
	{
		$arr = explode(" ", $argv[1]);
		$arr = array_filter($arr);
		$end = array_splice($arr, 1);
		foreach($end as $elem)
			echo "$elem ";
		foreach($arr as $elem1)
			echo "$elem1\n";
	}
?>