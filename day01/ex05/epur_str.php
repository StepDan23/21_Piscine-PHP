#! /usr/bin/php
<?php
	if ($argc > 1)
	{
		$arr =  explode(" ", $argv[1]);
		$arr = array_filter($arr);
		$end = array_splice($arr, count($arr) - 1);
		foreach($arr as $elem)
			echo "$elem ";
		echo current($end)."\n";
	}
?>