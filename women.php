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
<?php 

    $link = connect(); 
    $result = mysqli_query($link, "SELECT * FROM products WHERE category = 'women'");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
    ?>
        <form method="post" action="<?= $new_url_get ?>">
        <li>
            <div style="display:inline-block;">
                <div><img width="290px" height="400px" src="<?= $row['img_url']; ?>"></div>
                <div><span><?= $row['title']; ?></span></div>
                <div><span><?= $row['price']; ?>€</span></div>
                <div><input type="hidden" name="id" value="<?= $row['id_product']; ?>"></div>
                <div><input type="hidden" name="price" value="<?= $row['price']; ?>"></div>
                <div><input class="button" type="submit" name="submit" value="Add to cart"></div>
            </div>
        </li>
        </form>
    <?php 
    }
    ?>
</body>
</html>