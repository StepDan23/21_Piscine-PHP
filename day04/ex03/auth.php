<?php
	function auth($login, $passwd)
	{
		if ($login && $passwd)
		{
			$accs = unserialize(file_get_contents("../private/passwd"));
			if ($accs)
				foreach ($accs as $user)
				{
					if ($user['login'] == $login)
					{
						$passwd = hash('sha512', $passwd);
						if ($passwd == $user['passwd'])
							return true;
						else
							return false;
					}
				}
		}
		return false;
	}
?>