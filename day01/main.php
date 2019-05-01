#! /usr/bin/php
<?php
	include("./ex03/ft_split.php");
	include("./ex08/ft_is_sort.php");

	print_r(ft_split("   Hello    World AAA aa"));
	$tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
	$tab[] = "What are we doing now ?";
	// $tab = array(1, 2, 3, 1);

	if (ft_is_sort($tab))
		echo "The array is sorted\n";
	else
		echo "The array is not sorted\n";
?>