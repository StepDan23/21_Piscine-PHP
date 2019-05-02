#! /usr/bin/php
<?php
	if ($argc > 1)
	{
		if (!($fd = fopen($argv[1], r)))
			return (0);
		fclose($fd);
		$str = file_get_contents($argv[1]);
		$str = preg_replace_callback(
			'/<a.*?title[ \t]*=[ \t]*"(.*?)".*?>/i', function ($match)
			{
				return (str_replace($match[1], strtoupper($match[1]), $match[0])); 
			}, $str);
		$str = preg_replace_callback(
			'/<a.*?>(.*?)</i', function ($match)
			{
				return (str_replace($match[1], strtoupper($match[1]), $match[0])); 
			}, $str);
		echo "$str\n";
	}
?>