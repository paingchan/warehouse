<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";

$view = view_receive();

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


        <?php require_once "int/r_location.php"; ?>

        <!-- Start HERE -->
        <div class="card-body">
            <div>
                <h4>Today Receive</h4>
            </div>
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <table id="html5-extension" class="table table-hover non-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Avatar</th>
                                    <th>Date</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Supplier</th>
                                    <th class="dt-no-sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $query = "SELECT receive.r_id,  receive.r_name, supplier.s_id , supplier.s_name , color.color_id , color.color_name , size.size_id , size.size_name , receive.r_date , receive.r_qty , receive.r_img  from receive INNER JOIN supplier on receive.r_supplier = supplier.s_id INNER JOIN size on receive.r_size = size.size_id INNER JOIN color on receive.r_color = color.color_id WHERE date(r_date) = CURRENT_DATE()";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    ?>

                                <tr>
                                    <td><?php echo $row['r_name'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle"
                                                    src="img/product/<?php echo $row['r_img'] ?>" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php
                                    $date= $row['r_date'];
    $date_1=(date('d/m/Y', strtotime($date)));
    echo $date_1;
    ?>
                                    </td>
                                    <td><?php echo $row['color_name'] ?>
                                    </td>
                                    <td><?php echo $row['size_name'] ?>
                                    </td>
                                    <td><?php echo $row['r_qty'] ?>
                                    </td>

                                    <td><?php echo $row['s_name'] ?>
                                    </td>


                                    <td>
                                        <a
                                            href="del.php?r_id=<?php echo $row['r_id'] ?>">
                                            <button class="btn btn-outline-danger mb-2">Delete</button>
                                        </a>
                    </div>

                    </td>
                    </tr>

                    <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>




        </div>








        <!-- End Here -->








        <?php

require_once "int/footer.php";
