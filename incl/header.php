    <head>
        <meta charset="utf-8">
        <title>42 Shop</title>
        <link rel="stylesheet" href="style.css" />
        <meta content="width=device-width, initial-scale=1.0">
    </head>
	<div class="topnav" id="myTopnav">
  		<a href="index.php">Home</a>
  		<a href="women.php">Women</a>
  		<a href="men.php">Men</a>
        <a href=# id="print" onclick="window.print();" />Print</a>
  		<a href="#CheckOut">My Cart</a>
  		<a id=username href="#Login">
			  	<?php 
				include "auth.php";
				if (auth($_POST['login'], $_POST['passwd'], $_SERVER['REMOTE_ADDR']) == 1)
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