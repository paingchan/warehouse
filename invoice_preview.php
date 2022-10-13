<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";



$order_code = $_GET['order'];

$sql="SELECT * From order_item WHERE order_code=$order_code ";
$query = mysqli_query($con, $sql);

while ($row= mysqli_fetch_assoc($query)) {
    $delivery = $row['delivery'];
    $discount = $row['discount'];
    $customer = $row['customer'];
    $payment = $row['payment'];
    $address = $row['address'];
    $date = $row['o_date'];

    $subtotal = $row['subtotal_price'];
    $total = $row['total_price'];
}

?>



<!--  BEGIN CONTENT PART  -->
<link href="assets/css/apps/invoice-preview.css" rel="stylesheet" type="text/css" />
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

        <div class="row invoice layout-spacing layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="doc-container">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="invoice-container">
                                <div class="invoice-inbox">
                                    <div id="ct" class="">
                                        <div class="invoice-00001">
                                            <div class="content-section">
                                                <div class="inv--head-section inv--detail-section">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <div class="d-flex">
                                                                <img class="company-logo" src="assets/img/cork-logo.png"
                                                                    alt="company" />
                                                                <h3 class="in-heading align-self-center">
                                                                    Shin Shin
                                                                </h3>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 text-sm-right">
                                                            <p class="inv-list-number">
                                                                <span class="inv-title">Invoice : </span>
                                                                <span class="inv-number"><?php echo $order_code ?></span>
                                                            </p>
                                                        </div>

                                                        <div class="col-sm-6 align-self-center mt-3">
                                                            <p class="inv-street-addr">
                                                                Shin Shin YGN Warehouse
                                                            </p>
                                                            <p class="inv-email-address">
                                                                Online Store
                                                            </p>
                                                            <p class="inv-email-address">
                                                                09761863862
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                            <p class="inv-created-date">
                                                                <span class="inv-title">Invoice Date :
                                                                </span>
                                                                <span class="inv-date"><?php echo $date ?></span>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--detail-section inv--customer-detail-section">
                                                    <div class="row">
                                                        <div
                                                            class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                            <p class="inv-to">Invoice To</p>
                                                        </div>

                                                        <div
                                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">
                                                            <h6 class="inv-title">Payment Info:</h6>
                                                        </div>

                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                            <p class="inv-customer-name"><?php echo $customer ?>
                                                            </p>
                                                            <p class="inv-street-addr">
                                                                <?php echo $address ?>
                                                            </p>

                                                        </div>

                                                        <div
                                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                            <div class="inv--payment-info">
                                                                <p>
                                                                    <span class="inv-subtitle">Bank:</span>
                                                                    <span><?php echo $payment ?></span>
                                                                </p>

                                                                <p>
                                                                    <span class="inv-subtitle">Country:
                                                                    </span>
                                                                    <span>Myanmar</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>













                                                <div class="inv--product-table-section">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>

                                                                    <th scope="col">Items</th>
                                                                    <th class="text-right" scope="col">
                                                                        Qty
                                                                    </th>
                                                                    <th class="text-right" scope="col">
                                                                        Price
                                                                    </th>
                                                                    <th class="text-right" scope="col">
                                                                        Amount
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php

if (isset($_GET['order'])) {
    $order = $_GET['order'];
    $query = "SELECT order_item.o_id , order_item.order_code , product.p_id , product.p_name , order_item.o_qty , order_item.o_price , order_item.o_qty_price , order_item.subtotal_price , order_item.discount , order_item.delivery , order_item.total_price , order_item.customer , order_item.payment , order_item.address  from order_item INNER JOIN product on order_item.o_item = product.p_id WHERE order_code = $order_code ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

                                                                <tr>

                                                                    <td><?php echo $row['p_name'] ?>
                                                                    </td>
                                                                    <td class="text-right"><?php echo $row['o_qty'] ?>
                                                                    </td>
                                                                    <td class="text-right"><?php echo $row['o_price'] ?><span
                                                                            class="currency">Ks</span>
                                                                    </td>
                                                                    <td class="text-right"><?php echo $row['o_qty_price'] ?><span
                                                                            class="currency">Ks</span>
                                                                    </td>
                                                                </tr>

                                                                <?php
    }
    ?>

                                                                <?php
}
?>

                                                            </tbody>




                                                        </table>
                                                    </div>
                                                </div>








                                                <div class="inv--total-amounts">
                                                    <div class="row mt-4">
                                                        <div class="col-sm-5 col-12 order-sm-0 order-1"></div>
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                            <div class="text-sm-right">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Sub Total:</p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class=""><?php echo $subtotal ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Discount:</p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class=""><?php echo $discount; ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="discount-rate">
                                                                            Delivery :
                                                                            <span class="discount-percentage"></span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class=""><?php echo $delivery ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7 grand-total-title">
                                                                        <h4 class="">Grand Total :</h4>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5 grand-total-amount">
                                                                        <h4 class=""><?php echo $total ?>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--note">
                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                            <p>
                                                                Note: Thank you for doing Business with
                                                                us.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="invoice-actions-btn">
                                <div class="invoice-action-btn">
                                    <div class="row">

                                        <div class="col-xl-12 col-md-3 col-sm-6">
                                            <a href="javascript:void(0);"
                                                class="btn btn-secondary btn-print action-print">Print</a>
                                        </div>
                                        <div class="col-xl-12 col-md-3 col-sm-6">
                                            <a href="invoice.php" class="btn btn-success btn-print ">Back</a>
                                        </div>

                                        <div class="col-xl-12 col-md-3 col-sm-6">
                                            <a href="#" class="btn btn-dark btn-edit">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Here -->








        <?php

require_once "int/footer.php";
?>
        <script src="assets/js/apps/invoice-preview.js"></script>