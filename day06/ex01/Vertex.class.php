<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Vertex.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/08 17:06:43 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/08 17:06:43 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

require_once '../ex00/Color.class.php';

class Vertex
{
	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w = 1.0;
	private			$_color;
	public static	$verbose = FALSE;

	public static function doc()
	{
		return(file_get_contents('Vertex.doc.txt'));
	}

	public function __construct(array $vertex)
	{
		if (isset($vertex['x']) && isset($vertex['y']) && isset($vertex['z']))
		{
			$this->_x = floatval($vertex['x']);
			$this->_y = floatval($vertex['y']);
			$this->_z = floatval($vertex['z']);
		}
		if (isset($vertex['color']))
			$this->_color = $vertex['color'];
		else
			$this->_color = new Color(array('red' => 255,'green' => 255,'blue' => 255));
		if (isset($vertex['w']))
			$this->_w = floatval($vertex['w']);
		if (self::$verbose)
		{
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f,", $this->_x, $this->_y, $this->_z, $this->_w);
			printf(" Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	public function __destruct()
	{
		if (self::$verbose)
		{
			printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f,", $this->_x, $this->_y, $this->_z, $this->_w);
			printf(" Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", 
				$this->_color->red, $this->_color->green, $this->_color->blue);
		}
	}

	public function __toString()
	{
		if (self::$verbose)
			return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
				$this->_x, $this->_y, $this->_z, $this->_w,
					$this->_color->red, $this->_color->green, $this->_color->blue));
		else
			return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function getX()
	{
		return ($this->_x);
	}

	public function getY()
	{
		return ($this->_y);
	}

	public function getZ()
	{
		return ($this->_z);
	}

	public function getW()
	{
		return ($this->_w);
	}

	public function getColor()
	{
		return ($this->_color);
	}
}
?>