<?php
	include "database.php";

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