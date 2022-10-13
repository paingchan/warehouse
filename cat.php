<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";



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


        <div class="row">

            <div class="card-body">

                <div class="card component-card_1">
                    <div class="card-body">

                        <h5 class="card-title">Color</h5>
                        <?php
                        
                        col_cat();
display_msg();

?>
                        <form method="POST">

                            <div class="form-group">
                                <p>Color Name</p>
                                <label for="t-text" class="sr-only">Text</label>
                                <input id="t-text" type="text" name="col_name" placeholder="name of color"
                                    class="form-control" />

                            </div>
                            <div class=" field-wrapper">
                                <button type="submit" name="col_btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="card component-card_1">
                    <div class="card-body">

                        <h5 class="card-title">Size</h5>
                        <?php
                        
siz_cat();
display_msg();

?>
                        <form method="POST">
                            <div class="form-group">
                                <p>Size Number</p>
                                <label for="t-text" class="sr-only">Text</label>
                                <input id="t-text" type="text" name="siz_name" placeholder="size number"
                                    class="form-control" />

                            </div>
                            <div class=" field-wrapper">
                                <button name="siz_btn" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>



        <div class="row">


            <div class="card-body">


                <div class="row layout-top-spacing">
                    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Color Table</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-4">
                                        <thead>
                                            <tr>
                                                <th>Name</th>

                                                <th class="text-center">Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

$sql = mysqli_query($con, "SELECT * FROM color order by color_id desc ");

while ($row = mysqli_fetch_assoc($sql)) {
    ?>

                                            <tr>
                                                <td><?php echo $row['color_name'] ?>
                                                </td>

                                                <td class="text-center">
                                                    <span class="text-success">Complete</span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="del.php?col_id=<?php echo $row['color_id'] ?>"
                                                        class="btn btn-outline-danger mb-2">Delete</a>
                                                </td>
                                            </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>


                    </div>



                    <div class="card-body">

                        <div class="row layout-top-spacing">
                            <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Size Table</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-4">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>

                                                        <th class="text-center">Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                
                                                $sql = mysqli_query($con, "SELECT * FROM size order by size_id desc");
while ($row = mysqli_fetch_assoc($sql)) {
    ?>
                                                    <tr>
                                                        <td><?php echo $row['size_name'] ?>
                                                        </td>

                                                        <td class="text-center">
                                                            <span class="text-success">Complete</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="del.php?siz_id=<?php echo $row['size_id'] ?>"
                                                                class="btn btn-outline-danger mb-2">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>



                            </div>



                        </div>






                        <!-- End Here -->








                        <?php

require_once "int/footer.php";
