<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Vector.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/08 18:39:52 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/08 18:39:52 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

require_once '../ex01/Vertex.class.php';

class Vector
{
	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w = 0.0;
	public static	$verbose = FALSE;

	public static function doc()
	{
		return(file_get_contents('Vector.doc.txt'));
	}

	public function __construct(array $vector)
	{
		if (empty($vector['orig']) && isset($vector['dest']))
			$vector['orig'] = new Vertex(array('x' => 0.0,'y' => 0.0,'z' => 0.0));
		$this->_x = floatval($vector['dest']->getX() - $vector['orig']->getX());
		$this->_y = floatval($vector['dest']->getY() - $vector['orig']->getY());
		$this->_z = floatval($vector['dest']->getZ() - $vector['orig']->getZ());
		$this->_w = 0.0;
		if (self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function __destruct()
	{
		if (self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function __toString()
	{
		return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w));
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

	public function magnitude()
	{
		return (sqrt($this->_x * $this->_x +
			$this->_y * $this->_y + $this->_z * $this->_z));
	}

	public function normalize()
	{
		$norm = $this->magnitude();
		if ($norm == 1)
			return ($this);
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x / $norm,
			'y' => $this->_y / $norm, 'z' => $this->_z / $norm)))));
	}

	public function add($vector2)
	{
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x + $vector2->_x,
			'y' => $this->_y + $vector2->_y, 'z' => $this->_z + $vector2->_z)))));
	}

	public function sub($vector2)
	{
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x - $vector2->_x,
			'y' => $this->_y - $vector2->_y, 'z' => $this->_z - $vector2->_z)))));
	}

	public function opposite()
	{
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1,
			'y' => $this->_y * -1, 'z' => $this->_z * -1)))));
	}

	public function ScalarProduct($a)
	{
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $a,
			'y' => $this->_y * $a, 'z' => $this->_z * $a))));
	}

	public function dotProduct($vector2)
	{
			return (($this->_x * $vector2->_x) +
				($this->_y * $vector2->_y) + ($this->_z * $vector2->_z));
	}

	public function crossProduct($vector2)
	{
		return new Vector(array('dest' => new Vertex(array(
			'x' => $this->_y * $vector2->getZ() - $this->_z * $vector2->getY(),
			'y' => $this->_z * $vector2->getX() - $this->_x * $vector2->getZ(),
			'z' => $this->_x * $vector2->getY() - $this->_y * $vector2->getX()
		))));
	}

	public function cos($vector2)
	{
		return ((($this->_x * $vector2->_x) + ($this->_y * $vector2->_y) + ($this->_z * $vector2->_z)) /
			sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z))
			* (($vector2->_x * $vector2->_x) + ($vector2->_y * $vector2->_y) + ($vector2->_z * $vector2->_z))));
	}

}
?>