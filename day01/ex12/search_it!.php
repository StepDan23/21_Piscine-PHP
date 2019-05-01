#! /usr/bin/php
<?php
	if ($argc > 2)
	{
		$arr = array();
		$key = array_splice($argv, 1);
		$args = array_splice($key, 1);
		foreach($args as $elem)
		{
			$tmp = explode(":", $elem);
			if (count($tmp) != 2)
				return (print("oops\n"));
			$arr[$tmp[1]] = $tmp[0];
		}
		$out = false;
		foreach ($arr as $i => $elem)
		{
			if ($elem == $key[0])
				$out = $i;
		}
			if ($out != false)
			echo "$out\n";
	}
?>