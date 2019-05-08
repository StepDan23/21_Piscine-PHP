<?php
	if ($_POST['submit'] != 'OK' || !$_POST['login'] || !$_POST['passwd'])
		echo "Error\n";
	else
	{
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists("../private/passwd"))
			file_put_contents("../private/passwd", "");
		$accs = unserialize(file_get_contents("../private/passwd"));
		if ($accs)
			foreach ($accs as $id)
			{
				if ($id['login'] == $_POST['login'])
					{
						echo "Error\n";
						return ;
					}
			}
		$user = array('login' => $_POST['login'], 'passwd' => hash('sha512', $_POST['passwd']));
		$accs[] = $user;
		file_put_contents("../private/passwd", serialize($accs));
		echo "OK\n";
	}
?>
