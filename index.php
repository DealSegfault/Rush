<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>42 Shop</title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
	<div class="topnav" id="myTopnav">
  		<a href="#Home">Home</a>
  		<a href="#Women">Women</a>
  		<a href="#Men">Men</a>
  		<a href="#CheckOut">My Cart</a>
  		<a id=username href="#Login">
			  	<?php 
				include "auth.php";
				if (auth($_POST['login'], $_POST['passwd'], $_SERVER['REMOTE_ADDR']) == 1)
				{
					echo "         Welcome " . $_POST['login'];
					echo '<a href="logout.php"><span>Logout</span></a></li>';
				}
				else
				echo '<a href="#">Login / Register</a></li>';
				?>
		  </a>
	</div>
    <header class="header"><img class="banner" src="resources/banner.jpg" width="100%"></header>

     <body>
	
    	<section class="sidenav">
			<article class="active" id="Home" s style="background-image:url('resources/scarf_new.jpg');color:white;">
				<p>Spring Collection !</p>
				<div >
				</div>
			</article>
			<article id="Women" style="background-image:url('resources/scarf2.jpg');color:white;">
				<p><a href="women.php">Women</p>
				</div>
			</article>
			<article id="Men" style="background-image:url('resources/scarf1.jpg');color:white;">
				<p><a href="men.php">Men</p>
			</article>
			<article style="background-image:url('resources/scarf3.jpg');color:white;">
				<p><a href="auth.php">Login</p><p><a href="create.php">Register</p>
				<div id="Login">
				</div>
			</article>
		</section>		
	</body>
</html>
