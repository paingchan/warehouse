<?php

require_once "config/config.php";


if (isset($_GET['siz_id'])) {
    $siz_id = $_GET['siz_id'];
    $query = "DELETE FROM size WHERE size_id = '$siz_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:cat.php");
    }
}


if (isset($_GET['col_id'])) {
    $col_id = $_GET['col_id'];
    $query = "DELETE FROM color WHERE color_id = '$col_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:cat.php");
    }
}

if (isset($_GET['s_id'])) {
    $s_id = $_GET['s_id'];
    $query = "DELETE FROM supplier WHERE s_id = '$s_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:supplier.php");
    }
}


if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
    $query = "DELETE FROM product WHERE p_id = '$p_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:products.php");
    }
}

if (isset($_GET['r_id'])) {
    $r_id = $_GET['r_id'];
    $query = "DELETE FROM receive WHERE r_id = '$r_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:receive.php");
    }
}


if (isset($_GET['o_id'])) {
    $o_id = $_GET['o_id'];
    $code = $_GET['code'];
    //$p_id = $_GET['p_id'];
    //$o_qty = $_GET['o_qty'];
   
    if ($o_id!=0) {
        $sql = "SELECT order_item.o_id , order_item.order_code , order_item.o_item , product.p_id , product.p_name , product.p_stock , product.p_o_price , product.Total , order_item.o_qty , order_item.o_price , order_item.o_qty_price , order_item.subtotal_price , order_item.discount , order_item.delivery , order_item.total_price , order_item.customer , order_item.payment , order_item.address  from order_item INNER JOIN product on order_item.o_item = product.p_id WHERE o_id = $o_id ";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        $p_id = $row['o_item'];
        $o_qty = $row['o_qty'];
        $o_price = $row['o_price'];
        $o_p_id = $row['p_id'];
        $o_p_qty = $row['p_stock'];
        $o_p_price= $row['p_o_price'];
        $o_p_total = $row['Total'];
        
        $final_qty = $o_qty+$o_p_qty;
        $final_total= $final_qty*$o_p_price;

        //echo $final_qty.$final_total;

        if ($row) {
            $sql_1="UPDATE product set p_stock = '$final_qty' , Total = '$final_total' WHERE p_id='$p_id'";
            $result_1=mysqli_query($con, $sql_1);
            if ($result_1) {
                //set_message(display_success("success"));
                $query = "DELETE FROM order_item WHERE o_id = '$o_id'";
                $result = mysqli_query($con, $query);
                if ($result) {
                    header("location:add_invoice.php?order=$code");
                }
            }
        }
    }
}

if (isset($_GET['order_code'])) {
    $o_code = $_GET['order_code'];
    $query = "DELETE FROM order_item WHERE order_code = '$o_code'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:invoice.php");
    }
}
