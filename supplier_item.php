<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";

$color = view_color();
$size = view_size();


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
        <?php require_once "int/bt_location.php"; ?>


        <?php
        

        $edit_product =view_product_record();

while ($row=mysqli_fetch_assoc($edit_product)) {
    $p_id = $row['p_id'];
    $name = $row['p_name'];
    $o_qty= $row['p_stock'];
    $o_price = $row['p_o_price'];
    $color = $row['color_name'];
    $size = $row['size_name'];
    $color_id = $row['p_col'];
    $size_id = $row['p_siz'];
    $img = $row['p_img'];
    $supplier = $row['p_supplier'];
}

        
?>

        <form method="POST" novalidate="novalidate" enctype="multipart/form-data">
            <?php

add_supplier_item();
display_msg();

?>
            <div class="row mb-4">
                <div class="col">
                    <fieldset disabled>
                        <label for="formGroupExampleInput">Item</label>
                        <div class="input-group mb-4">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">@</span>
                            </div>

                            <input id="disabledTextInput"
                                value="<?php echo $name ?>"
                                type="text" class="form-control" placeholder="Item" aria-label="Username">

                        </div>
                    </fieldset>
                    <input type="hidden" class="form-control" name="p_name"
                        value="<?php echo $name; ?>"
                        placeholder="Item" aria-label="Username">
                    <input type="hidden" class="form-control" placeholder="Item" name="p_id"
                        value="<?php echo $p_id; ?>"
                        aria-label="Username">
                    <input type="hidden" name="o_qty"
                        value="<?php echo $o_qty; ?>"
                        class="form-control" placeholder="Item" aria-label="Username">
                    <input type="hidden" class="form-control" name="o_price"
                        value="<?php echo $o_price; ?>"
                        placeholder="Item" aria-label="Username">
                    <input type="hidden" class="form-control" name="p_color"
                        value="<?php echo $color_id; ?>"
                        placeholder="Item" aria-label="Username">
                    <input type="hidden" class="form-control" name="p_size"
                        value="<?php echo $size_id; ?>"
                        placeholder="Item" aria-label="Username">
                    <input type="hidden" class="form-control" name="p_img"
                        value="<?php echo $img; ?>"
                        placeholder="Item" aria-label="Username">
                    <input type="hidden" class="form-control" name="p_supplier"
                        value="<?php echo $supplier; ?>"
                        placeholder="Item" aria-label="Username">
                </div>

                <div class="col">
                    <fieldset disabled>
                        <label for="formGroupExampleInput">Color</label>
                        <div class="input-group mb-4">


                            <input type="text"
                                value="<?php echo $color ?>"
                                class="form-control">

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <fieldset disabled>
                        <label for="formGroupExampleInput">Size</label>
                        <div class="input-group mb-4">

                            <input value="<?php echo $size ?>"
                                type="text" class="form-control" placeholder="Item" aria-label="Username">
                        </div>
                    </fieldset>
                </div>

                <div class="col">
                    <label for="formGroupExampleInput">Qty</label>
                    <div class="input-group mb-4">


                        <input type="number" name="qty" class="form-control"
                            aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-prepend">
                            <span class="input-group-text">N</span>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="add_btn" class="btn btn-primary">
        </form>
        <!-- End Here -->
        <?php

require_once "int/footer.php";
