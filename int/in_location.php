<?php

require_once  './config/config.php';

if (!isset($_SESSION['ADMIN'])) {
    header("location:login.php");
}
$order_num = date("mhis");
?>

<div class="card-body">
    <div class="row">
        <a href="add_invoice.php?order=<?php echo $order_num; ?>">
            <button class="btn btn-primary mb-4 mr-2 btn-lg">New Invoice</button>
        </a>


    </div>


</div>