<?php include "auth.php"; ?>

<?php

function		checker($data, $login, $oldpw)
{
	$i = 0;
	while ($data[$i] != NULL)
	{
		if ($data[$i]['login'] == $login && $data[$i]['passwd'] == $oldpw)
			return (true);
		$i++;
	}
	return (false);
}

if ($_POST['reset'] == 'OK'
	&& $_POST['login']
	&& $_POST['oldpw']
	&& $_POST['newpw']
	&& ($_POST['oldpw'] != $_POST['newpw'])
	&& (file_exists("../htdocs/private/passwd")))
{
	$data = unserialize(file_get_contents("../htdocs/private/passwd"));
	$oldpasswd = hash('whirlpool', $_POST['oldpw']);
	if (!(checker($data, $_POST['login'], $oldpasswd)))
		echo "ERROR\n";
	else
	{
		$i = 0;
		while ($data[$i] != NULL)
		{
			if ($data[$i]['login'] == $_POST['login'])
			{
				$data[$i]['passwd'] = hash('whirlpool', $_POST['newpw']);
				break ;
			}
			$i++;
		}
		file_put_contents("../htdocs/private/passwd", serialize($data));
		echo "OK\n";
	}
}
else
	echo "ERROR\n";
?>
<!DOCTYPE html>
<?php
function		connect_2()
{
	$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL database : " . mysqli_connect_error();
	return ($link);
}
?>

<?php
    $link = connect();
	if ($_POST['submit'] == "reset")
	{
		$login = htmlspecialchars($_POST['login']);
		$passwd = htmlspecialchars($_POST['newpw']);
		if (checker($link, $login, $passwd) == true)
		{
			$passwd = hash('whirlpool', $passwd);
			if (mysqli_query($link, "UPDATE users SET password = '" . $passwd . "' WHERE login = '" . $login . "'"))
			{
				$_SESSION['loggued_on_user'] = $_POST['login'];
				echo '<div>Password successfully reset</div>';
			}
			else
				echo '<div>Could not reset password</div>';
		}
	}
?>

<html>
   <?php include "incl/header.php"; ?>
	

	<body>
		<form action="modif.php" method="post">
			username: <input type="text" name="login"><br />
			old password: <input type="password" name="oldpw"><br />
			new password: <input type="password" name="newpw"><br />
			<input type="submit" name="reset" value="OK">
		</form>
	</body>
</html>


