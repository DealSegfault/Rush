<?php include "auth.php"; ?>
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

<html>
   <?php include "incl/header.php"; ?>
	
<body class="product">

<?php include ("incl/left_menu.php"); ?>


<ul class="main">
<?php 

    $link = connect_2(); 
  
    $result = mysqli_query($link, "SELECT * FROM products WHERE category = '".basename($_SERVER['PHP_SELF'], ".php")."'");
    if ($_POST['submit'] == "filter" && $_POST['category'] != "All")
      $result = mysqli_query($link, "SELECT * FROM products WHERE category = '".basename($_SERVER['PHP_SELF'], ".php")."' AND sub_category = '".$_POST['category']."'");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
    ?>
        <form method="post" action="<?= $new_url_get ?>">
        <li>
            <div class="item">
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
</ul>


</body>
</html>

