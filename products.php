<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";

$view = view_products();



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



        <div class="card-body">

            <h1>In Stock Item</h1>

        </div>


        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="html5-extension" class="table table-hover non-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Name
                                </th>
                                <th>Avatar</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Stock</th>
                                <th>I Price</th>

                                <th>Supplier</th>

                                <th class="dt-no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
 
    while ($row = mysqli_fetch_assoc($view)) {
        ?>

                            <tr>
                                <td><?php echo $row['p_name'] ?>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="usr-img-frame mr-2 rounded-circle">
                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                src="img/product/<?php echo $row['p_img'] ?>" />
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $row['color_name'] ?>
                                </td>
                                <td><?php echo $row['size_name'] ?>
                                </td>
                                <td><?php echo $row['p_stock'] ?>
                                </td>
                                <td><?php echo $row['p_o_price'] ?>
                                </td>
                                <td><?php echo $row['s_name'] ?>
                                </td>


                                <td>
                                    <a
                                        href="change_price.php?p_id=<?php echo $row['p_id'] ?>">
                                        <button class="btn btn-outline-primary mb-2">Price</button>
                                    </a>
                                    <a
                                        href="supplier_item.php?p_id=<?php echo $row['p_id'] ?>">
                                        <button class="btn btn-outline-secondary mb-2">Supplier</button>
                                    </a>
                                    <a
                                        href="del.php?p_id=<?php echo $row['p_id'] ?>">
                                        <button class="btn btn-outline-danger mb-2">Delete</button>
                                    </a>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Name
                                </th>
                                <th>Avatar</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Stock</th>
                                <th>I Price</th>

                                <th>Supplier</th>

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
