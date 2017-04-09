<?php 
	include "cart.php"; 
	include "incl/header.php";
	if ($_POST['submit'] == "Add to cart" || $_POST['submit'] == "Remove to cart")
    {
        if ($_POST['submit'] == "Add to cart")
            add_elem($_POST['id'], "");
        if ($_POST['submit'] == "Remove to cart")
            rm_elem($_POST['id'], "");
    }
?>
<input width=100% class="button" type="submit" name="submit" value="Checkout">
   <?php read_cart(); ?>
   