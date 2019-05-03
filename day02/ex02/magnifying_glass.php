#! /usr/bin/php
<?php
	function change_case($first_match)
	{
		$first_match = preg_replace_callback(
			'/title[ \t]*=[ \t]*"(.*?)"/si', function ($match)//
			{
				return (str_replace($match[1], strtoupper($match[1]), $match[0])); 
			}, $first_match);
		$first_match = preg_replace_callback(
			"'.*?>(.*?)<'si", function ($match)
			{
				return (str_replace($match[1], strtoupper($match[1]), $match[0])); 
			}, $first_match);
		return ($first_match[0]);
	}

	if ($argc > 1)
	{
		if (!(file_exists($argv[1])))
			exit ("Couldn't open $argv[1] file.\n");
		$str = file_get_contents($argv[1]);
		$str = preg_replace_callback("'<a.*?>.*?<[/]a>'si", "change_case", $str);
		echo "$str";
	}
?>