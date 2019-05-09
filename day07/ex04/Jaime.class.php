<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Jaime.class.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 17:30:19 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 17:30:19 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

class Jaime
{
	public function sleepWith($class)
	{
		if ($class instanceof Tyrion)
			echo "Not even if I'm drunk !\n";
		else if ($class instanceof Sansa)
			echo "Let's do this.\n";
		else if ($class instanceof Cersei)
			echo "With pleasure, but only in a tower in Winterfell, then.\n";
	}
}
?>