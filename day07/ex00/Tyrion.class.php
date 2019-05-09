<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Tyrion.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 15:55:18 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 15:55:18 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

require_once 'test.php';

class Tyrion extends Lannister
{
	public function __construct()
	{
		$Lannister = new Lannister();
	}

	public function getSize()
	{
		echo "My name is Tyrion\n";
		echo "Short";
	}
}
?>