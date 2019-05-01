#! /usr/bin/php
<?php
function operation($a, $opp, $b)
{
	switch($opp)
	{
		case('+'):
			return ($a + $b);
		case('-'):
			return ($a - $b);
		case('*'):
			return ($a * $b);
		case('/'):
			if ($b == 0)
				exit (print("Error: division by 0 detected\n"));
			return ($a / $b);
		case('%'):
			if ($b == 0)
				exit (print("Error: division by 0 detected\n"));
			return ($a % $b);
	}
}

	if ($argc == 2)
	{
		if (strpos($argv[1], "+"))
		{
			$opp = "+";
			$nums = explode("+", $argv[1]);
		}
		else if (strpos($argv[1], "-"))
		{
			$opp = "-";
			$nums = explode("-", $argv[1]);
		}
		else if (strpos($argv[1], "*"))
		{
			$opp = "*";
			$nums = explode("*", $argv[1]);
		}
		else if (strpos($argv[1], "/"))
		{
			$opp = "/";
			$nums = explode("/", $argv[1]);
		}
		else if (strpos($argv[1], "%"))
		{
			$opp = "%";
			$nums = explode("%", $argv[1]);
		}
		else
			return (print("Syntax Error\n"));
		if (count($nums) != 2)
			return (print("Syntax Error\n"));
		$a = trim($nums[0]);
		$b = trim($nums[1]);
		if (!is_numeric($a) ||!is_numeric($b))
			return (print("Syntax Error\n"));
		$result = operation($a, $opp, $b);
		echo "$result\n";
	}
	else
		echo "Incorrect Parameters\n"
?>