#! /usr/bin/php
<?php
	if ($argc > 3)
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
		$opp = next($arr);
		switch($opp)
		{
			case('+'):
				$result = reset($arr) + end($arr);
				break ;
			case('-'):
				$result = reset($arr) - end($arr);
				break ;
			case('*'):
				$result = reset($arr) * end($arr);
				break ;
			case('/'):
				if (end($arr) == 0)
					return (print("Error: division by 0 detected\n"));
				$result = reset($arr) / end($arr);
				break ;
			case('%'):
				if (end($arr) == 0)
					return (print("Error: division by 0 detected\n"));
				$result = reset($arr) % end($arr);
				break ;
		}
		echo "$result\n";
	}
?>