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

                        <h5 class="card-title">Supplier</h5>
                        <?php
                        
                        supplier();
display_msg();

?>
                        <form method="POST">

                            <div class="form-group">
                                <p>Supplier Name</p>
                                <label for="t-text" class="sr-only">Text</label>
                                <input id="t-text" type="text" name="s_name" placeholder="name of color"
                                    class="form-control" />

                            </div>
                            <div class=" field-wrapper">
                                <button type="submit" name="s_btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <div class="inv-title">
                                    <h5 class="">Total Balance</h5>
                                </div>
                                <div class="inv-balance-info">
                                    <p class="inv-balance">$ 41,741.42</p>

                                    <span class="inv-stats balance-credited">+ 2453</span>
                                </div>
                            </div>
                            <div class="acc-action">
                                <div class="">
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg></a>
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg></a>
                                </div>
                                <a href="javascript:void(0);">Upgrade</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
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

$sql = mysqli_query($con, "SELECT * FROM supplier order by s_id desc ");

while ($row = mysqli_fetch_assoc($sql)) {
    ?>

                                    <tr>
                                        <td><?php echo $row['s_name'] ?>
                                        </td>

                                        <td class="text-center">
                                            <span class="text-success">Complete</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="del.php?s_id=<?php echo $row['s_id'] ?>"
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


            <!-- End Here -->








            <?php

require_once "int/footer.php";
