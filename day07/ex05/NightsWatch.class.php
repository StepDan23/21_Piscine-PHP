<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   NightsWatch.class.php                              :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 18:01:48 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 18:01:48 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class NightsWatch
{
	private $roars = array();

	public function recruit($fighter)
	{
		$this->roars[] = $fighter;
	}

	public function fight()
	{
		foreach ($this->roars as $elem)
		{
			if(method_exists(get_class($elem), 'fight'))
				$elem->fight();
		}
	}
}
?>