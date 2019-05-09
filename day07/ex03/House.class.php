<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   House.class.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 16:38:12 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 16:38:12 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class House
{
	public function introduce()
	{
		echo "House ".$this->getHouseName()." of ".$this->getHouseSeat().
			' : "'.$this->getHouseMotto().'"'.PHP_EOL;
	}
}
?>