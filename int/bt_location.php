<?php

require_once  './config/config.php';

if (!isset($_SESSION['ADMIN'])) {
    header("location:login.php");
}
?>

<div class="card-body">
    <div class="row">
        <a href="add_products.php">
            <button class="btn btn-primary mb-4 mr-2 btn-lg">New Product</button>
        </a>

        <a href="products.php">
            <button class="btn btn-success mb-4 mr-2 btn-lg">In Stock</button>
        </a>
        <a href="out_products.php">
            <button class="btn btn-danger mb-4 mr-2 btn-lg">Out of Stock</button>
        </a>
    </div>


</div>