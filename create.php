<?php
function		check($info, $login)
{
	for ($i = 0; $info[$i] != NULL; $i++)
		if ($info[$i]['login'] == $login)
			return(false);
	return(true);
}

function		check_alrd_registered_users($link, $login, $passwd)
{
	$result = mysqli_query($link, "SELECT login  FROM users WHERE login = '" . mysqli_real_escape_string($link, $login) . "'");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);	
	if ($row['login'] === $login)
		return false;
	#if (mysqli_num_rows(mysqli_query($link, "SELECT login  FROM users WHERE login = '" . mysqli_real_escape_string($link, $login) . "'")) == 0)
		#return true;
	return true;		
}

if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['passwd'])
{

	$link = connect_to_database();
	check_alrd_registered_users($link, $_POST['login'], $_POST['passwd']);
	if ((check($info, $_POST['login'])) == false)
		echo "ERROR\n";
	else
	{
		$data[] = ['login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd'])];
		file_put_contents($pw_folder . "passwd", serialize($data));
		echo "OK\n";
	}
}
else
	echo "ERROR\n";
?>

<html>

<head>
        <meta charset="utf-8">
        <title>Register</title>
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