<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";

$supplier = view_supplier();
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


        <form method="POST" novalidate="novalidate" enctype="multipart/form-data">
            <?php
                
                add_product();
display_msg();

?>
            <div class="row mb-4">
                <div class="col">
                    <label for="formGroupExampleInput">Name</label>
                    <div class="input-group mb-4">


                        <input name="p_name" type="text" class="form-control" placeholder="Item" aria-label="Username">
                    </div>
                </div>

                <div class="col">
                    <label for="formGroupExampleInput">Price</label>
                    <div class="input-group mb-4">


                        <input type="text" name="i_price" class="form-control"
                            aria-label="Amount (to the nearest dollar)">

                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="formGroupExampleInput">Supplier</label>
                    <select class="form-control  basic " name="s_id">
                        <?php
            while ($row = mysqli_fetch_assoc($supplier)) {
                ?>
                        <option
                            value="<?php echo $row['s_id'] ?>"
                            selected="selected"><?php echo $row['s_name'] ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput">Supplier Price</label>
                    <div class="input-group mb-4">

                        <input type="text" name="s_price" class="form-control"
                            aria-label="Amount (to the nearest dollar)">

                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="formGroupExampleInput">Color</label>
                    <select class="form-control  basic" name="color_id">
                        <?php while ($row = mysqli_fetch_assoc($color)) {
                            ?>
                        <option
                            value="<?php echo $row['color_id']; ?>"
                            selected="selected"><?php echo $row['color_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput">Size</label>
                    <select class="form-control  basic" name="size_id">
                        <?php
while ($row = mysqli_fetch_assoc($size)) {
    ?>
                        <option
                            value="<?php echo $row['size_id']; ?>"
                            selected="selected"><?php echo $row['size_name'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label for="formGroupExampleInput">Qty</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon5">N</span>
                        </div>
                        <input name="qty" type="number" class="form-control" placeholder="qty" aria-label="Username">
                    </div>
                </div>
                <div class="col">
                    <fieldset disabled>
                        <label for="formGroupExampleInput">State</label>
                        <div class="input-group mb-4">

                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Active">
                        </div>
                    </fieldset>
                </div>
            </div>


            <div class="row layout-top-spacing">

                <div id="fuSingleFile" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Single File Upload</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label>Upload (Single File) <a href="javascript:void(0)"
                                        class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" name="img0"
                                        class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







            <input type="submit" name="add_btn" class="btn btn-primary">
        </form>






        <!-- End Here -->




        <script>
            var ss = $(".basic").select2({
                tags: true,
            });
            var firstUpload = new FileUploadWithPreview('myFirstImage')
        </script>



        <?php

                                                               require_once "int/footer.php";
