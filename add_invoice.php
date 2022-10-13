<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";

$view = view_products();


$order_code = $_GET['order'];

$sql="SELECT SUM(o_qty_price) , order_item.discount , order_item.delivery , order_item.customer , order_item.payment , order_item.address From order_item WHERE order_code=$order_code ";
$query = mysqli_query($con, $sql);

while ($row= mysqli_fetch_assoc($query)) {
    $sub_total = $row['SUM(o_qty_price)'];
    $delivery = $row['delivery'];
    $discount = $row['discount'];
    $customer = $row['customer'];
    $payment = $row['payment'];
    $address = $row['address'];
    $total = $sub_total-$discount+$delivery;
}


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


        <div class="row invoice layout-spacing layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="doc-container">

                    <div class="row">
                        <div class="col-xl-9">

                            <div class="invoice-content">

                                <div class="invoice-detail-body">

                                    <div class="invoice-detail-title">

                                        <div class="invoice-title">
                                            <input type="text" class="form-control" placeholder="Invoice Label"
                                                value="Invoice Label">
                                        </div>
                                    </div>


                                    <form method="post">
                                        <?php
                                        
                                        item_cusinfo();
display_msg();
                                        
?>
                                        <div class="invoice-detail-header">

                                            <div class="row justify-content-between">


                                                <div class="col-xl-5 invoice-address-client">

                                                    <h4>Fill To info:-</h4>
                                                    <input name="order_id"
                                                        value="<?php echo $order_code; ?>"
                                                        type="hidden" class="form-control form-control-sm"
                                                        id="client-name" placeholder="Client Name">


                                                    <div class="invoice-address-client-fields">

                                                        <div class="form-group row">
                                                            <label for="client-name"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                            <div class="col-sm-9">
                                                                <input name="customer" type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="client-name" placeholder="Client Name">
                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="client-address"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                            <div class="col-sm-9">
                                                                <input name="address" type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="client-address" placeholder="XYZ Street">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="client-phone"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Payment</label>
                                                            <div class="col-sm-9">
                                                                <input name="payment" type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="client-phone" placeholder="(123) 456 789">
                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="client-phone"
                                                                class="col-sm-3 col-form-label col-form-label-sm"></label>
                                                            <div class="col-sm-9">
                                                                <input type="submit" name="item_cusinfo_btn"
                                                                    class="btn btn-primary">
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>




                                                <div class="col-xl-5 invoice-address-company">

                                                    <h4>Info Detail:-</h4>

                                                    <div class="invoice-address-company-fields">

                                                        <div class="form-group row">
                                                            <label for="company-name"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                            <label for="company-name"
                                                                class="col-sm-3 col-form-label col-form-label-sm"><?php echo $customer ?></label>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="company-email"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                            <label for="company-name"
                                                                class="col-sm-3 col-form-label col-form-label-sm"><?php echo $address ?></label>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="company-address"
                                                                class="col-sm-3 col-form-label col-form-label-sm">Payment</label>
                                                            <label for="company-name"
                                                                class="col-sm-3 col-form-label col-form-label-sm"><?php echo $payment ?></label>

                                                        </div>



                                                    </div>

                                                </div>











                                            </div>

                                        </div>

                                    </form>

                                    <form method="post">

                                        <?php
                                    
                                    add_order_item();
display_msg();
                                    
?>
                                        <div class="invoice-detail-terms">

                                            <div class="row justify-content-between">

                                                <div class="col-md-2">

                                                    <div class="form-group mb-4">

                                                        <input name="order_id" type="text"
                                                            value="<?php echo $order_code; ?>"
                                                            class="form-control form-control-sm" id="number"
                                                            placeholder="">
                                                    </div>

                                                </div>


                                                <div class="col-md-5">
                                                    <div class="form-group mb-4">

                                                        <select name="item_name" class="form-control basic">
                                                            <?php
while ($row=mysqli_fetch_assoc($view)) {
    ?>
                                                            <option
                                                                value="<?php echo $row['p_id'] ?>"
                                                                selected="selected"><?php  echo $row['p_name'];?>-<?php echo $row['color_name'];?>-<?php echo $row['size_name'] ?>
                                                            </option>


                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="col-md-2">

                                                    <div class="form-group mb-4">

                                                        <input name="qty" type="number"
                                                            class="form-control form-control-sm" id="number"
                                                            placeholder="qty">
                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group mb-4">

                                                        <input type="submit" name="item_btn" class="btn btn-primary">
                                                    </div>

                                                </div>


                                            </div>

                                        </div>
                                    </form>








                                    <div class="inv--product-table-section">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="">
                                                    <tr>
                                                        <th scope="col">S.No</th>
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
                                                        <td class='delete-item-row'>
                                                            <ul class="table-controls">
                                                                <li><a href="del.php?o_id=<?php echo $row['o_id'] ?>&code=<?php echo $order_code ?>"
                                                                        class="delete-item" data-toggle="tooltip"
                                                                        data-placement="top" title=""
                                                                        data-original-title="Delete"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-x-circle">
                                                                            <circle cx="12" cy="12" r="10"></circle>
                                                                            <line x1="15" y1="9" x2="9" y2="15">
                                                                            </line>
                                                                            <line x1="9" y1="9" x2="15" y2="15">
                                                                            </line>
                                                                        </svg></a></li>
                                                            </ul>
                                                        </td>
                                                        <td><?php echo $row['p_name']?>
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













                                    <form method="post">
                                        <div class="invoice-detail-total">

                                            <div class="row">


                                                <div class="col-md-6">


                                                    <?php

add_other_btn();
display_msg();

?>

                                                    <input type="hidden" name="order_id"
                                                        value="<?php echo $order_code ?>"
                                                        class="form-control form-control-sm"
                                                        id="payment-method-bank-name" placeholder="Fee">
                                                    <input type="hidden" name="subtotal"
                                                        value="<?php echo $sub_total ?>"
                                                        class="form-control form-control-sm"
                                                        id="payment-method-bank-name" placeholder="Fee">
                                                    <div class="form-group row invoice-created-by">
                                                        <label for="payment-method-bank-name"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Delivery</label>
                                                        <div class="col-sm-9">
                                                            <input name="delivery" type="text"
                                                                class="form-control form-control-sm"
                                                                id="payment-method-bank-name" placeholder="Fee">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row invoice-created-by">
                                                        <label for="payment-method-bank-name"
                                                            class="col-sm-3 col-form-label col-form-label-sm">Discount :
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input name="discount" type="text"
                                                                class="form-control form-control-sm"
                                                                id="payment-method-bank-name" placeholder="Discount">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row invoice-created-by">
                                                        <label for="payment-method-bank-name"
                                                            class="col-sm-3 col-form-label col-form-label-sm">
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="submit" name="item_other_btn"
                                                                class="btn btn-primary">
                                                        </div>
                                                    </div>


                                                </div>
                                    </form>

                                    <div class="col-md-6">
                                        <div class="totals-row">
                                            <div class="invoice-totals-row invoice-summary-subtotal">

                                                <div class="invoice-summary-label">Subtotal</div>

                                                <div class="invoice-summary-value">
                                                    <div class="subtotal-amount">

                                                        <span class="amount"><?php echo $sub_total; ?></span>
                                                        <span class="currency">Ks</span>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="invoice-totals-row invoice-summary-total">

                                                <div class="invoice-summary-label">Discount</div>

                                                <div class="invoice-summary-value">
                                                    <div class="total-amount">
                                                        <span><?php echo $discount; ?></span>
                                                        <span class="currency">Ks</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="invoice-totals-row invoice-summary-tax">

                                                <div class="invoice-summary-label">Delivery</div>

                                                <div class="invoice-summary-value">
                                                    <div class="tax-amount">
                                                        <span><?php echo $delivery ?></span>
                                                        <span class="currency">Ks</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="invoice-totals-row invoice-summary-balance-due">

                                                <div class="invoice-summary-label">Total</div>

                                                <div class="invoice-summary-value">
                                                    <div class="balance-due-amount">
                                                        <span><?php echo $total; ?></span>
                                                        <span class="currency">Ks</span>
                                                    </div>
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

                    <form method="post">
                        <?php

final_item();

?>

                        <input name="order_id"
                            value="<?php echo $order_code; ?>"
                            type="hidden" class="form-control form-control-sm" id="client-name"
                            placeholder="Client Name">
                        <input name="subtotal"
                            value="<?php echo $sub_total; ?>"
                            type="hidden" class="form-control form-control-sm" id="client-name"
                            placeholder="Client Name">
                        <input name="total"
                            value="<?php echo $total; ?>"
                            type="hidden" class="form-control form-control-sm" id="client-name"
                            placeholder="Client Name">

                        <div class="invoice-actions-btn">
                            <div class="invoice-action-btn">
                                <div class="row">
                                    <div class="col-xl-20 col-md-10">
                                        <input class="btn btn-success btn-download" type="submit" name="item_final_btn">
                                    </div>
                                </div>

                            </div>
                        </div>





                    </form>
                </div>
            </div>


        </div>

    </div>
</div>





<!-- End Here -->




<?php

require_once "int/footer.php";
