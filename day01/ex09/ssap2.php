#! /usr/bin/php
<?php

function my_cmp($a, $b)
{
	if ($a > $b)
		return (1);
	else if ($a < $b)
		return (-1);
	else
		return (0);
}

function get_prior($char)
{
	$prior = "abcdefghijklmnopqrstuvwxyz0123456789";
	$prior = str_split($prior);
	foreach($prior as $i => $char_pr)
		if ($char_pr == $char)
				return ($i + 1);
	return (0);
}

function cmp($str1, $str2)
{
	$str1 = strtolower($str1);
	$str2 = strtolower($str2);
	$str1 = str_split($str1);
	$str2 = str_split($str2);
	foreach ($str1 as $i => $char1)
	{
		$prior1 = get_prior($char1);
		$prior2 = get_prior($str2[$i]);
		if (!$prior1 && !$prior2)
		{
			if (my_cmp($char1, $str2[$i]))
				return (my_cmp($char1, $str2[$i]));
		}
		else if (!$prior1)
			return (1);
		else if (!$prior2)
			return (-1);
		else if ($prior1 != $prior2)
			return ($prior1 - $prior2);
	}
	return (-1);
}

	if ($argc > 1)
	{
		$arr = array();
		$args = array_splice($argv, 1);
		foreach($args as $elem)
		{
			$sub_arr = explode(" ", $elem);
			foreach($sub_arr as $sub_elem)
					$arr[] = $sub_elem;
		}
		$arr = array_filter($arr);
		usort($arr, "cmp");
		foreach($arr as $p_elem)
			echo "$p_elem\n";
	}
?>