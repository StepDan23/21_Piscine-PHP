<?php
	function ft_is_sort($arr)
	{
		$temp = $arr;
		sort($arr);
		foreach($arr as $key=>$value)
			if($value != $temp[$key])
				return (false);
		return(true);
	}
?>