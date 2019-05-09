<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   UnholyFactory.class.php                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: mmcclure <mmcclure@student.42.fr>          +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/09 18:44:58 by mmcclure          #+#    #+#             */
/*   Updated: 2019/05/09 18:44:58 by mmcclure         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */


class UnholyFactory
{
	private $factory = array();

	public function absorb($fighter)
	{
		if (!($fighter instanceof Fighter))
		{
			echo "(Factory can't absorb this, it's not a fighter)\n";
			return NULL;
		}
		$name = $fighter->getName();
		if (isset($this->factory[$name]))
			echo "(Factory already absorbed a fighter of type $name)\n";
		else
		{
			$this->factory[$name] = $fighter;
			echo "(Factory absorbed a fighter of type $name)\n";
		}
	}

	public function fabricate($rf)
	{
		if (isset($this->factory[$rf]))
		{
			echo "(Factory fabricates a fighter of type $rf)\n";
			return ($this->factory[$rf]);
		}
		else
		{
			echo "(Factory hasn't absorbed any fighter of type $rf)\n";
			return (NULL);
		}
	}
}
?>