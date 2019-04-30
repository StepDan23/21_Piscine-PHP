#!/usr/bin/php
<?php
	while (!feof(STDIN))
	{
		echo "Enter a number: ";
		$nbr = trim(fgets(STDIN));
		if(is_numeric($nbr))
		{
			if($nbr % 2 == 0)
				echo "The number $nbr is even\n";
			else
				echo "The number $nbr is odd\n";
		}
		else if (!feof(STDIN))
			echo "'$nbr' is not a number\n";
	}
	echo "\n";
?>