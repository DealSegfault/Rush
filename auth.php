<?php
	include "database.php";
	session_start();
	function auth($login, $passwd, $ip)
	{
		$login = secure($login);
		$passwd = hash("sha256", secure($passwd));
		if ($login == "" || $passwd == "" || $ip == "")
			return (0);
		$connection = connect();
		mysqli_select_db($connection, "db_test");
		$query = mysqli_query($connection, "SELECT * FROM users WHERE login='".$login."' AND password='".$passwd."'");
		if (mysqli_num_rows($query) > 0)
		{
			mysqli_query($connection, "UPDATE users SET ip='".$ip."'");
			return (1);
		}
		else
		{ 
			return (0);
		}
	}
	function create($login, $auth, $ip)
	{
		if ($login == "" || $passwd == "" || $ip == "")
			return (0);
		$login = secure($login);
		$passwd = hash("sha256", secure($auth));
		$ip = secure($ip);
		$connection = connect();
		mysqli_select_db($connection, "db_test");
		$query = mysqli_query($connection, "SELECT * FROM users WHERE login='".$login."'");
		if (mysqli_num_rows($query) > 0)
			return (0);
		else
		{
			$result = mysqli_query($connection, "INSERT INTO users VALUES(NULL, '".$login."', '".$passwd."', '".$ip."', 0)");
			return (1);
		}
	}
	function modif($login, $oldpass, $newpass)
	{
		if ($login == "" || $oldpass == "" || $newpass == "")
			return (0);
		$login = secure($login);
		$passwd = hash("sha256", secure($oldpass));
		$new = hash("sha256", secure($newpass));
		$ip = secure($ip);
		$connection = connect();
			
		mysqli_select_db($connection, "db_test");
		$query = mysqli_query($connection, "SELECT * FROM users WHERE login='".$login."' AND password='".$passwd."'");
		if (mysqli_num_rows($query) > 0)
		{
			mysqli_query($connection, "UPDATE users SET password='".$new."'");
			return (1);
		}
		else
		{
			return (0);
		}
	}


?>
<html>

<head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>

<?php if (auth($_POST['login'], $_POST['passwd'], $_SERVER['REMOTE_ADDR']) != 1)
				{	?>
<form method="post" action="index.php">
	Username: <input type="text" name="login" <?php echo 'value="' . $_SESSION['login'] . '"'?> />
	<br />
	Password: <input type="password" name="passwd" <?php echo 'value="' . $_SESSION['passwd'] . '"'?> />
	<input type="submit" name="submit" value="OK" />
</form>
<?php } ?>
</body>
</html>
