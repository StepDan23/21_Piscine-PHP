<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Tyrion.class.php                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 17:42:59 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 17:42:59 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class Tyrion
{
	public function sleepWith($class)
	{
		if ($class instanceof Jaime)
			echo "Not even if I'm drunk !\n";
		else if ($class instanceof Sansa)
			echo "Let's do this.\n";
		else if ($class instanceof Cersei)
			echo "Not even if I'm drunk !\n";
	}
}
?>