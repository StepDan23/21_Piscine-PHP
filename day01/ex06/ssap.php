#! /usr/bin/php
<?php
	if ($argc > 1)
	{
		$args = array_splice($argv, 1);
		$arr = array();
		foreach($args as $elem)
		{
			$sub_arr = explode(" ", $elem);
			foreach($sub_arr as $sub_elem)
				$arr[] = $sub_elem;
		}
		$arr = array_filter($arr);
		sort($arr, SORT_STRING);
		foreach($arr as $p_elem)
			echo "$p_elem\n";
	}
?>