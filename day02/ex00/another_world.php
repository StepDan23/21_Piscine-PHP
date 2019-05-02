#! /usr/bin/php
<?php
	if ($argc > 1)
	{
		$words = preg_replace("/[\t ]+/", " ", $argv[1]);
		$words = preg_replace("/^[\t ]|[\t ]$/", "", $words);
		echo "$words\n";
	}
?>