<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Matrix.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/08 20:16:42 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/08 20:16:42 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

require_once '../ex02/Vector.class.php';

class Matrix
{
	private			$_preset;
	private			$_scale;
	private			$_angle;
	private			$_vtc;
	private			$_fov;
	private			$_ratio;
	private			$_near;
	private			$_far;
	protected		$matrix = array();
	public static	$verbose = FALSE;

	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const RX = "Ox ROTATION";
	const RY = "Oy ROTATION";
	const RZ = "Oz ROTATION";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";

	public static function doc()
	{
		return(file_get_contents('Matrix.doc.txt'));
	}

	public function __construct($matrix)
	{
		if (isset($matrix))
		{
			if (isset($matrix['preset']))
				$this->_preset = $matrix['preset'];
			if (isset($matrix['scale']))
				$this->_scale = $matrix['scale'];
			if (isset($matrix['angle']))
				$this->_angle = $matrix['angle'];
			if (isset($matrix['vtc']))
				$this->_vtc = $matrix['vtc'];
			if (isset($matrix['fov']))
				$this->_fov = floatval($matrix['fov']);
			if (isset($matrix['ratio']))
				$this->_ratio = floatval($matrix['ratio']);
			if (isset($matrix['near']))
				$this->_near = floatval($matrix['near']);
			if (isset($matrix['far']))
				$this->_far = floatval($matrix['far']);
			if (empty($this->_preset))
				exit ("Error: No type opperation\n");
			if ($this->_preset == self::SCALE && empty($this->_scale))
				exit ("Error: Type scale, scale empty\n");
			if (($this->_preset == self::RX || $this->_preset == self::RY ||
								$this->_preset == self::RZ) && empty($this->_angle))
				exit ("Error: Type rotation, angle empty\n");
			if ($this->_preset == self::TRANSLATION && empty($this->_vtc))
				exit ("Error: Type translation, vector empty\n");
			if ($this->_preset == self::PROJECTION && (empty($this->_fov) ||
					empty($this->_ratio) || empty($this->_near) || empty($this->_far)))
					{
						print_r($matrix);
						exit ("Error: Type projection, projection plane empty\n");
					}
			$this->do_op();
			if (self::$verbose)
			{
				if ($this->_preset == Self::IDENTITY)
					printf("Matrix $this->_preset instance constructed\n");
				else
					printf("Matrix $this->_preset preset instance constructed\n");
			}
		}
	}

	private function do_op()
	{
		$i = 0;
		while ($i < 16)
		{
			$this->matrix[$i++] = 0;
		}
		switch ($this->_preset)
		{
			case (self::IDENTITY):
				$this->identity(1);
				break;
			case (self::SCALE):
				$this->identity($this->_scale);
				break;
			case (self::RX):
				$this->rot_x();
				break;
			case (self::RY):
				$this->rot_y();
				break;
			case (self::RZ):
				$this->rot_z();
				break;
			case (self::TRANSLATION):
				$this->translation();
				break;
			case (self::PROJECTION):
				$this->projection();
				break;
		}
	}

	public function __destruct()
	{
		if (self::$verbose)
			printf("Matrix instance destructed\n");
	}

	public function __toString()
	{
		return (sprintf("M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %0.2f | %0.2f | %0.2f | %0.2f\ny | %0.2f | %0.2f | %0.2f | %0.2f\nz | %0.2f | %0.2f | %0.2f | %0.2f\nw | %0.2f | %0.2f | %0.2f | %0.2f",
		$this->matrix[0], $this->matrix[1], $this->matrix[2], $this->matrix[3], $this->matrix[4], $this->matrix[5], $this->matrix[6], $this->matrix[7], $this->matrix[8], $this->matrix[9], $this->matrix[10], $this->matrix[11],
		$this->matrix[12], $this->matrix[13], $this->matrix[14], $this->matrix[15]));
	}

	private function identity($scale)
	{
		$this->matrix[0] = $scale;
		$this->matrix[5] = $scale;
		$this->matrix[10] = $scale;
		$this->matrix[15] = 1;
	}

	private function translation()
	{
		$this->identity(1);
		$this->matrix[3] = $this->_vtc->getX();
		$this->matrix[7] = $this->_vtc->getY();
		$this->matrix[11] = $this->_vtc->getZ();
	}

	private function rot_x()
	{
		$this->identity(1);
		$this->matrix[0] = 1;
		$this->matrix[5] = cos($this->_angle);
		$this->matrix[6] = -sin($this->_angle);
		$this->matrix[9] = sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}

	private function rot_y()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[2] = sin($this->_angle);
		$this->matrix[5] = 1;
		$this->matrix[8] = -sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}

	private function rot_z()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[1] = -sin($this->_angle);
		$this->matrix[4] = sin($this->_angle);
		$this->matrix[5] = cos($this->_angle);
		$this->matrix[10] = 1;
	}

	private function projection()
	{
		$this->identity(1);
		$this->matrix[5] = 1 / tan(0.5 * deg2rad($this->_fov));
		$this->matrix[0] = $this->matrix[5] / $this->_ratio;
		$this->matrix[10] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
		$this->matrix[14] = -1;
		$this->matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
		$this->matrix[15] = 0;
	}

	public function mult($multip)
	{
		$res_matrix = array();
		$i = 0;
		while ($i < 16)
		{
			$j = 0;
			while ($j < 4)
			{
				$res_matrix[$i + $j] = 0;
				$res_matrix[$i + $j] += $this->matrix[$i + 0] * $multip->matrix[$j + 0];
				$res_matrix[$i + $j] += $this->matrix[$i + 1] * $multip->matrix[$j + 4];
				$res_matrix[$i + $j] += $this->matrix[$i + 2] * $multip->matrix[$j + 8];
				$res_matrix[$i + $j] += $this->matrix[$i + 3] * $multip->matrix[$j + 12];
				$j++;
			}
			$i += 4;
		}
		$out = new Matrix(NULL);
		$out->matrix = $res_matrix;
		return $out;
	}

	public function transformVertex(Vertex $vtx)
	{
		$vert = array();
		$vert['x'] = ($vtx->getX() * $this->matrix[0]) + ($vtx->getY() * $this->matrix[1]) + ($vtx->getZ() * $this->matrix[2]) + ($vtx->getW() * $this->matrix[3]);
		$vert['y'] = ($vtx->getX() * $this->matrix[4]) + ($vtx->getY() * $this->matrix[5]) + ($vtx->getZ() * $this->matrix[6]) + ($vtx->getW() * $this->matrix[7]);
		$vert['z'] = ($vtx->getX() * $this->matrix[8]) + ($vtx->getY() * $this->matrix[9]) + ($vtx->getZ() * $this->matrix[10]) + ($vtx->getW() * $this->matrix[11]);
		$vert['w'] = ($vtx->getX() * $this->matrix[11]) + ($vtx->getY() * $this->matrix[13]) + ($vtx->getZ() * $this->matrix[14]) + ($vtx->getW() * $this->matrix[15]);
		$vertex = new Vertex($vert);
		return $vertex;
	}
}
?>