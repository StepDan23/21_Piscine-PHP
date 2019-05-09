<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Targaryen.class.php                                :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 16:24:49 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 16:24:49 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class Targaryen
{
	public function getBurned()
	{
		if ($this->resistsFire())
			return ("emerges naked but unharmed");
		else
			return ("burns alive");
	}

	public function resistsFire()
	{
		return (false);
	}
}
?>