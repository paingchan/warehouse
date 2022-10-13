<?php

require_once  './config/config.php';

if (!isset($_SESSION['ADMIN'])) {
    header("location:login.php");
}
?>

<div class="card-body">
    <div class="row">
        <a href="today_receive.php">
            <button class="btn btn-primary mb-4 mr-2 btn-lg">Today Receive</button>
        </a>

        <a href="receive.php">
            <button class="btn btn-success mb-4 mr-2 btn-lg">Receive</button>
        </a>

    </div>


</div>