<?php
	if ($_POST['submit'] != 'OK' || !$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'])
		echo "Error\n";
	else
	{
		if (!file_exists("../private/passwd"))
		{
			echo "Error\n";
			return ;
		}
		$accs = unserialize(file_get_contents("../private/passwd"));
		if ($accs)
			foreach ($accs as $id => $user)
			{
				if ($user['login'] == $_POST['login'])
				{
					$oldpas = hash('sha512', $_POST['oldpw']);
					if ($oldpas == $user['passwd'])
					{
						$accs[$id]['passwd'] = hash('sha512', $_POST['newpw']);
						file_put_contents("../private/passwd", serialize($accs));
						echo "OK\n";
					}
					else
						echo "Error\n";
					return ;
				}
			}
		echo "Error\n";
	}
?>
