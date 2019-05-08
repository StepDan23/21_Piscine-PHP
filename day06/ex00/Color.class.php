<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Color.class.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/08 17:05:46 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/08 17:05:46 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */


class Color
{
	public			$red;
	public			$green;
	public			$blue;
	public static	$verbose = FALSE;

	public static function doc()
	{
		return(file_get_contents('Color.doc.txt'));
	}

	public function __construct(array $color)
	{
		if (isset($color['red']) && isset($color['green']) && isset($color['blue']))
		{
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
		}
		else if (isset($color['rgb']))
		{
			$this->red = ($color['rgb'] & 0xff0000) >> 16;
			$this->green = ($color['rgb'] & 0x00ff00) >> 8;
			$this->blue = $color['rgb'] & 0x0000ff;
		}
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	public function __destruct()
	{
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	public function __toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}

	public function add($add_col_class)
	{
		return(new Color(array(	'red' => $this->red + $add_col_class->red,
								'green' => $this->green + $add_col_class->green,
								'blue' => $this->blue + $add_col_class->blue)));
	}

	public function sub($sub_col_class)
	{
		return(new Color(array(	'red' => $this->red - $sub_col_class->red,
								'green' => $this->green - $sub_col_class->green,
								'blue' => $this->blue - $sub_col_class->blue)));
	}

	public function mult($value)
	{
		return(new Color(array(	'red' => $this->red * $value,
								'green' => $this->green * $value,
								'blue' => $this->blue * $value)));
	}
}
?>