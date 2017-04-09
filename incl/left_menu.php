<div class="nav-container">
  <form method="post" action="women.php">
    <select id="sel_id" name="category"  onchange="valuesOfAll(this.value)">
    <option value="All">All</option>
    <option value="Scarf">Scarves</option>
    <option value="Pull">Pulls</option> 
    <option value="Glasses">Glasses</option>
  <input type="submit" name="submit" value="filter" />
</select>
</div>

<ul class="main">
<?php 

    $link = connect(); 
  
    $result = mysqli_query($link, "SELECT * FROM products WHERE category = 'women'");
    if ($_POST['submit'] == "filter")
      $result = mysqli_query($link, "SELECT * FROM products WHERE category = 'women' AND sub_category = '".$_POST['category']."'");
    if (!$result)
      echo "no item found";
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
</ul>