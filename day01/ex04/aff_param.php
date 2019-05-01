#! /usr/bin/php
<?php
	$arr = array_splice($argv, 1);
	foreach($arr as $elem)
		echo $elem."\n";
?>