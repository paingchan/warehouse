<?php

require_once "int/header.php";
require_once "int/nav.php";
require_once "int/topbar.php";

$id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id = $id";
$query = mysqli_query($con, $sql);
while ($row=mysqli_fetch_assoc($query)) {
    $balance = $row['balance'];
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

        <!--  Start HERE -->

        <!--Start Card -->
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <div class="inv-title">
                                    <h5 class="">Instock Balance</h5>
                                </div>
                                <div class="inv-balance-info">
                                    <?php
                                    
                                    $sql="SELECT SUM(Total) From product";
$query = mysqli_query($con, $sql);

while ($row= mysqli_fetch_assoc($query)) {
    ?>
                                    <h3 class="inv-balance"><?php echo $row['SUM(Total)'] ?>
                                        Ks </h3>
                                    <?php } ?>

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

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">My Balance</h6>
                            </div>

                        </div>

                        <div class="w-content">
                            <div class="w-info">

                                <p class="value">
                                    <?php echo $balance; ?>
                                    Ks

                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <!-- End Card -->



            <!-- End Here -->
        </div>


        <?php

require_once "int/footer.php";
