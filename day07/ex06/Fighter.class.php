<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Fighter.class.php                                  :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 18:45:27 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 18:45:27 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class Fighter
{
	private $fighter_name;

	public function __construct($name)
	{
		$this->fighter_name = $name;
	}

	public function getName()
	{
		return ($this->fighter_name);
	}
}
?>