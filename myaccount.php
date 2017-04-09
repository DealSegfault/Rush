<?php include "auth.php"; ?>
<!DOCTYPE html>
<?php
function		connect_4()
{
	$link = mysqli_connect("localhost", "root", "root", "db_test", "8080");
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL database : " . mysqli_connect_error();
	return ($link);
}
?>

<?php
    if ($_POST['submit'] == "Remove this Product")
        rm_element($_POST['id']);
?>

<html>
   <?php include "incl/header.php"; ?>
	
<body class="product">

<ul class="main">

    <?php echo "<span font-size=10vmin>    Greetings, " . $_SESSION['user'] .".</br>" ?>
    
</br>
    <a href="modif.php"> Change Password</a>
    <span> ~</span>
   <a href="delete.php"> Delete Account</a></p>

   <?php
   if (is_admin($_SESSION['user']))
   { ?>
   <span>Admin Panel</span></br></br>
   <a href="add_product.php">-> Add Product</a></p>

<?php 

    $link = connect_4(); 
    
    $selectedcategory = "men";
    $filter = "category = '".$selectedcategory."'";
    $result = mysqli_query($link, "SELECT * FROM products");
    if ($_POST['submit'] == "filter" && $_POST['category'] != "All")
      $result = mysqli_query($link, "SELECT * FROM products");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
    ?>
        <div id="addprod">
        <form method="post" action="<?= $new_url_get ?>">
        <li>
            <div class="item">
                <div><img width="290px" height="400px" src="<?= $row['img_url']; ?>"></div>
                <div><span><?= $row['title']; ?></span></div>
                <div><span><?= $row['price']; ?>€</span></div>
                <div><input type="hidden" name="id" value="<?= $row['id_product']; ?>"></div>
                <div><input type="hidden" name="price" value="<?= $row['price']; ?>"></div>
                <div><input class="button" type="submit" name="submit" value="Remove this Product"></div>
            </div>
        </li>
        </form>
        </div>
    <?php 
    }
    ?>
</ul>
   <?php } ?>

</body>
</html>

