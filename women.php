<!DOCTYPE html>
<?php
function		connect()
{
	$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL database : " . mysqli_connect_error();
	return ($link);
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Men Products</title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <div class="topnav" id="myTopnav">
  		    <a href="index.php">Home</a>
            <a href=# id="print" onclick="window.print();" />Print</a>
	    </div>
        <header class="header"><img class="banner" src="resources/banner.jpg" width="100%"></header>
    </head>
	
<body class="product">

<?php include ("incl/left_menu.php"); ?>

</body>
</html>

