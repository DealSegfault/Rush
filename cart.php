<?php
	include "auth.php";
	function init_cart()
	{
		$con = connect();
			if (!mysqli_select_db($con, "db_test"))
				return (0);
		$elements = mysqli_num_rows(mysqli_query($con, "SELECT * FROM products"));
		for ($i=0; $i < $elements; $i++) { 
			if (!$_SESSION[$i])
				$_SESSION[$i] = 0;
		}
	}

	function read_cart()
	{
		foreach ($_SESSION as $key => $value) {
			if ($value > 0)
				echo $key.": ".$value."\n";
		}
	}

	function add_elem($id, $q)
	{
		if ($q > 0)
			$_SESSION[$id] += $q;
		else
			$_SESSION[$id]++;
	}

	function rm_elem($id, $q)
	{
		if ($q > 0)
			$_SESSION[$id] -= $q;
		else
			$_SESSION[$id]--;
	}
?>


<?php 
	if ($_POST['submit'] == "add")
		add_elem($_POST['id']);
	if ($_POST['submit'] == "remove")
		rm_elem($_POST['id']);

	read_cart();

?>
