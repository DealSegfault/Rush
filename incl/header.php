    <head>
        <meta charset="utf-8">
        <title>42 Shop</title>
        <link rel="stylesheet" href="style.css" />
        <meta content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    </head>
	<div class="topnav" id="myTopnav">
  		<a href="index.php">Home</a>
        <a href="spring_collection.php">Spring Collection</a>
  		<a href="women.php">Women</a>
  		<a href="men.php">Men</a>
        <a href=# id="print" onclick="window.print();" />Print</a>
  		<a href="mycart.php">My Cart</a>
  		<a id=username href="#Login">
    

<?php
if (auth($_POST['login'], $_POST['passwd'], $_SERVER['REMOTE_ADDR']) != 1 && $_SESSION['user'] == "")
	{	
?>
			<form method="post" action="index.php">
				Username: <input type="text" name="login" <?php echo 'value="' . $_SESSION['login'] . '"'?> />
				<br />
				Password: <input type="password" name="passwd" <?php echo 'value="' . $_SESSION['passwd'] . '"'?> />
				<input type="submit" name="submit" value="OK" />
			</form>
<?php } ?>

			  	<?php

				if (auth($_POST['login'], $_POST['passwd'], $_SERVER['REMOTE_ADDR']) == 1 || $_SESSION['user'] != "")
				{
					echo "         Welcome " . $_POST['login'];
					echo '<a id=username href="logout.php"><span>Logout</span></a></li>';
				}
				else
				echo '<a id=username href="#">Login / Register</a></li>';
				?>
		  </a>
	</div>
    <header class="header"><img class="banner" src="resources/banner.jpg" width="100%"></header>