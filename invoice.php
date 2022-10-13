<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";

$view = view_invoice();

?>



<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Dashboad</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="javascript:void(0);">Analytics</a>
                    </li>
                </ol>
            </nav>

        </div>

        <!-- Start HERE -->

        <?php require_once "int/in_location.php"; ?>



        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="html5-extension" class="table table-hover non-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>code</th>
                                <th>Customer</th>
                                <th>Item</th>
                                <th>Total</th>
                                <th>Date</th>


                                <th class="dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
 
    while ($row = mysqli_fetch_assoc($view)) {
        ?>

                            <tr>
                                <td><?php echo $row['order_code'] ?>
                                </td>


                                <td><?php echo $row['customer'] ?>
                                </td>
                                <td><?php echo $row['p_name'] ?>
                                </td>
                                <td><?php echo $row['total_price'] ?>
                                </td>
                                <td><?php echo $row['o_date'] ?>
                                </td>


                                <td>

                                    <a
                                        href="invoice_preview.php?order=<?php echo $row['order_code'] ?>">
                                        <button class="btn btn-outline-secondary mb-2">View</button>
                                    </a>
                                    <a
                                        href="del.php?order_code=<?php echo $row['order_code'] ?>">
                                        <button class="btn btn-outline-danger mb-2">Delete</button>
                                    </a>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>code</th>
                                <th>Customer</th>
                                <th>Item</th>
                                <th>Total</th>
                                <th>Date</th>

                                <th class="dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>



        <!-- End Here -->








        <?php

require_once "int/footer.php";
