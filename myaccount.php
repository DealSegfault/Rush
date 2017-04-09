<?php include "cart.php"; ?>
<!DOCTYPE html>


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
   <a href="delete.php"> Delete Account</a>

   <?php
   if (is_admin($_SESSION['user']))
   { ?>
   </br></br><span>Admin Panel</span>
   <a href="add_product.php">-> Add Product</a>

<?php read_cart_admin(); ?>
   <?php } ?>

</ul>
</body>
</html>