<?php
	include "cart.php";
	init_cart();
	if ($_POST['login'] != "")
	{
		$_SESSION['user'] = $_POST['login'];
	}
?>

<!DOCTYPE html>
<html>

<?php include 'incl/header.php'; ?>
     <body>
	
    	<section class="sidenav">
			<article class="active" id="Home" s style="background-image:url('https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf_new.jpg');color:white;">
				<p>Spring Collection !</p>
				<div >
				</div>
			</article>
			<article id="Women" style="background-image:url('https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf2.jpg');color:white;">
				<p><a href="women.php">Women</p>
				</div>
			</article>
			<article id="Men" style="background-image:url('https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf1.jpg');color:white;">
				<p><a href="men.php">Men</p>
			</article>
			<article style="background-image:url('https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf3.jpg');color:white;">
				<p><a href="auth.php">Login</p><p><a href="create.php">Register</p>
				<div id="Login">
				</div>
			</article>
		</section>		
	</body>
</html>
