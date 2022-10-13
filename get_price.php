<?php

require_once 'int/header.php';

if (!empty($_POST["p_id"])) {
    $id=intval($_POST['p_id']);
    $query=mysqli_query($con, "SELECT * FROM product WHERE p_id=$id");
    //$row=mysqli_fetch_array($query);
    ?>

<?php

while ($row=mysqli_fetch_assoc($query)) {
    ?>

<input type="text" class="form-control form-control-sm"
    value="<?php echo htmlentities($row['p_o_price']); ?>"
    placeholder="Price">
<?php } ?>

<?php }
