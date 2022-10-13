<?php

require_once  './config/config.php';

if (!isset($_SESSION['ADMIN'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>Shin Shin Warehouse</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">



    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_miscellaneous.css">


    <link href="assets/css/apps/invoice-add.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">






</head>