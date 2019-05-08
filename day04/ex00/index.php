<?php
	session_start();
	if ($_GET['submit'] == 'OK' && $_GET['login'] && $_GET['passwd'])
	{
		$_SESSION['test']['login'] = $_GET['login'];
		$_SESSION['test']['passwd'] = $_GET['passwd'];
	}
?>
<html><body>
<form action="index.php" method="get">
	Username: <input type="text" name="login" value="<?php echo $_SESSION['test']['login']?>" />
	<br />
	Password: <input type="text" name="passwd" value="<?php echo $_SESSION['test']['passwd']?>" />
	<input type="submit" name="submit" value="OK"/>
</form>
</body></html>
