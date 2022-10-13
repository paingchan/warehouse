<?php

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['MESSAGE']=$msg;
    } else {
        $msg = "";
    }
}

//Display Message

function display_msg()
{
    if (isset($_SESSION['MESSAGE'])) {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}

//error message
function display_error($error)
{
    return "<span class='alert alert-danger text-center'>$error</span>";
}

//success message
function display_success($success)
{
    return "<span class='alert alert-success  text-center'>$success</span>";
}

//get safe  value
function safe_value($con, $value)
{
    return mysqli_real_escape_string($con, $value);
}


# login

function login_sys()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        global $con;
        $name = safe_value($con, $_POST['name']);



        if (empty($name)) {
            set_message(display_error("Please fill in the blank"));
        } else {
            $user_check = "SELECT * FROM user WHERE name = '$name'";
            $result = mysqli_query($con, $user_check);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                $_SESSION ['ADMIN']=$user;
                $_SESSION ['id']=$user['id'];
                $_SESSION ['name']=$user['name'];
                $_SESSION ['balance']=$user['balance'];
                header("location:index.php");
            } else {
                set_message(display_error("You have enter wrong username"));
            }
        }
    }
}




# Color cat and Size


function col_cat()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['col_btn'])) {
        global $con;
        $name = safe_value($con, $_POST['col_name']);

        if (empty($name)) {
            set_message(display_error("Please Fill the color"));
        } else {
            $exit = "SELECT * FROM color WHERE color_name = '$name' ";
            $sql = mysqli_query($con, $exit);
            if (mysqli_fetch_assoc($sql)) {
                set_message(display_error("Sorry Color name alread exit"));
            } else {
                $query = "INSERT INTO color ( color_name , state ) VALUE ( '$name' , '1' ) ";
                $result = mysqli_query($con, $query);

                if ($result) {
                    set_message(display_success("Color name successfully added"));
                }
            }
        }
    }
}



function siz_cat()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['siz_btn'])) {
        global $con;
        $name = safe_value($con, $_POST['siz_name']);

        if (empty($name)) {
            set_message(display_msg("Please Fill the size number"));
        } else {
            $exit = "SELECT * FROM size WHERE size_name='$name'";
            $sql = mysqli_query($con, $exit);
            if (mysqli_fetch_assoc($sql)) {
                set_message(display_msg("Sorry Size number alread exit"));
            } else {
                $query = "INSERT INTO size ( size_name , state ) VALUE ( '$name' , '1' ) ";
                $result = mysqli_query($con, $query);

                if ($result) {
                    set_message(display_success("Size number successfully added"));
                }
            }
        }
    }
}


function supplier()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['s_btn'])) {
        global $con;
        $name = safe_value($con, $_POST['s_name']);

        if (empty($name)) {
            set_message(display_error("Please Fill the name"));
        } else {
            $exit = "SELECT * FROM supplier WHERE s_name= '$name'";
            $sql = mysqli_query($con, $exit);
            if (mysqli_fetch_assoc($sql)) {
                set_message(display_error('Name alread exit'));
            } else {
                $query = "INSERT INTO supplier ( s_name ) VALUE ( '$name')";
                $result=mysqli_query($con, $query);
                if ($result) {
                    set_message(display_success('Supplier added successfully'));
                }
            }
        }
    }
}



function view_supplier()
{
    global $con;
    $sql = "SELECT * FROM supplier";
    return mysqli_query($con, $sql);
}

function view_color()
{
    global $con;
    $sql = "SELECT * FROM color";
    return mysqli_query($con, $sql);
}

function view_size()
{
    global $con;
    $sql = "SELECT * FROM size";
    return mysqli_query($con, $sql);
}


function add_product()
{
    global $con;

    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_btn'])) {
        $p_name = safe_value($con, $_POST['p_name']);
        $s_id = safe_value($con, $_POST['s_id']);
        $color_id = safe_value($con, $_POST['color_id']);
        $size_id = safe_value($con, $_POST['size_id']);
        $i_price = safe_value($con, $_POST['i_price']);
        $s_price = safe_value($con, $_POST['s_price']);
        $qty = safe_value($con, $_POST['qty']);
        $img0 = $_FILES['img0']['name'];

        $total = $qty * $i_price;
      
    
        $type0 = $_FILES['img0']['type'];
        $tmp_name0 = $_FILES['img0']['tmp_name'];
        $size0 = $_FILES['img0']['size'];
        $img_ext = explode('.', $img0);
        $img_correct_ext= strtolower(end($img_ext));
        $allow = array('jpg' , 'jpeg' , 'png' , 'gif');
        $path0  = "img/product/".$img0;

        if (empty($p_name) || empty($s_id) ||  empty($color_id) ||  empty($size_id) || empty($i_price) || empty($s_price) || empty($qty) || empty($img0)) {
            set_message(display_error("Please Fill in the blanks"));
        } else {
            if (in_array($img_correct_ext, $allow)) {
                //image size only <5MB
                if ($size0<5000000) {
                    if ($s_id == 0 ||  $color_id == 0 || $size_id == 0) {
                        set_message(display_error("Please select  Category"));
                    } else {
                        $query = "INSERT INTO product ( p_name , p_supplier , p_stock , p_s_price  , p_o_price , Total , p_siz , p_col ,  p_img  , p_state  ) values ( '$p_name' , '$s_id' , '$qty' , '$s_price'  ,  '$i_price' , '$total' , '$size_id' , '$color_id'  , '$img0'  , '1'  )";
                        $result = mysqli_query($con, $query);
                        $query_r = "INSERT INTO receive ( r_name , r_supplier , r_color , r_size , r_qty , r_img  ) values ( '$p_name' , '$s_id' , '$color_id' , '$size_id'  , '$qty', '$img0'  )";
                        $result_r = mysqli_query($con, $query_r);
                    
                        if ($result || $result_r) {
                            set_message(display_success("Product has been save in the database"));
                            move_uploaded_file($tmp_name0, $path0);
                        }
                    }
                } else {
                    set_message(display_error("You image size too large "));
                }
            } else {
                set_message(display_error("You can't store this file :("));
            }
        }
    }
}

function view_products()
{
    global $con;
    $query = "SELECT product.p_id,  product.p_name, supplier.s_id , supplier.s_name , product.p_stock , product.p_s_price  , product.p_o_price , product.total , color.color_id , color.color_name , size.size_id , size.size_name , product.p_date , product.p_img , product.p_state  from product INNER JOIN supplier on product.p_supplier = supplier.s_id INNER JOIN size on product.p_siz = size.size_id INNER JOIN color on product.p_col = color.color_id WHERE p_stock>0 order by p_id  ";
    return $result = mysqli_query($con, $query);
}


function view_products_0()
{
    global $con;
    $query = "SELECT product.p_id,  product.p_name, supplier.s_id , supplier.s_name , product.p_stock , product.p_s_price , product.p_o_price , color.color_id , color.color_name , size.size_id , size.size_name , product.p_date , product.p_img , product.p_state  from product INNER JOIN supplier on product.p_supplier = supplier.s_id INNER JOIN size on product.p_siz = size.size_id INNER JOIN color on product.p_col = color.color_id WHERE p_stock<=0 order by p_id  ";
    return $result = mysqli_query($con, $query);
}


function view_receive()
{
    global $con;
    $query = "SELECT  receive.r_id,  receive.r_name, supplier.s_id , supplier.s_name , color.color_id , color.color_name , size.size_id , size.size_name , receive.r_date , receive.r_qty , receive.r_img , DATE_FORMAT(r_date, '%Y-%m-%d') encoded_date from receive INNER JOIN supplier on receive.r_supplier = supplier.s_id INNER JOIN size on receive.r_size = size.size_id INNER JOIN color on receive.r_color = color.color_id  order by r_date desc";
    return $result = mysqli_query($con, $query);
}


function view_product_record()
{
    global $con;
    if (isset($_GET['p_id'])) {
        $edit_id = safe_value($con, $_GET['p_id']);
        $sql = "SELECT product.p_id,  product.p_name, product.p_supplier , product.p_stock , product.p_s_price  , product.p_o_price , product.Total , product.p_siz , product.p_col , color.color_id , color.color_name , size.size_id , size.size_name , product.p_date , product.p_img , product.p_state  from product  INNER JOIN size on product.p_siz = size.size_id INNER JOIN color on product.p_col = color.color_id where p_id='$edit_id'";
        $res = mysqli_query($con, $sql);
        return  $res;
    }
}


function add_supplier_item()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['add_btn'])) {
        global $con;
        $id = safe_value($con, $_POST['p_id']);
        $name = safe_value($con, $_POST['p_name']);
        $supplier = safe_value($con, $_POST['p_supplier']);
        $color = safe_value($con, $_POST['p_color']);
        $size = safe_value($con, $_POST['p_size']);
        $img = safe_value($con, $_POST['p_img']);
        $qty = safe_value($con, $_POST['qty']);
        $o_qty = safe_value($con, $_POST['o_qty']);
        $o_price = safe_value($con, $_POST['o_price']);

        

        if (empty($qty)) {
            set_message(display_error("Please Fill the Qty"));
        } else {
            $total_qty = $qty+$o_qty;
            $final_total = $total_qty*$o_price;
            $query = "UPDATE product set  p_stock = '$total_qty' , Total= '$final_total'   WHERE  p_id = '$id' ";
            $result=mysqli_query($con, $query);
            $query_r = "INSERT INTO receive ( r_name , r_supplier , r_color , r_size , r_qty , r_img  ) values ( '$name' , '$supplier' , '$color' , '$size'  , '$qty', '$img'  )";
            $result_r = mysqli_query($con, $query_r);
            
            if ($result || $result_r) {
                set_message(display_success('successfully'));
            }
        }
    }
}



function update_price()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['add_btn'])) {
        global $con;
        $id = safe_value($con, $_POST['p_id']);
        $price = safe_value($con, $_POST['price']);
        $o_qty = safe_value($con, $_POST['o_qty']);
        
        if (empty($price)) {
            set_message(display_error("Please Fill the Price"));
        } else {
            $final_total = $o_qty*$price;
            $query = "UPDATE product set  p_o_price = '$price' , Total= '$final_total'   WHERE  p_id = '$id' ";
            $result=mysqli_query($con, $query);
            
            
            if ($result) {
                set_message(display_success('successfully'));
            }
        }
    }
}


function view_invoice()
{
    global $con;
    $sql = "SELECT order_item.o_id , order_item.order_code , product.p_id , product.p_name , order_item.o_qty , order_item.o_price , order_item.o_qty_price , order_item.subtotal_price , order_item.discount , order_item.delivery , order_item.total_price , order_item.customer , order_item.payment , order_item.address , order_item.o_date  from order_item INNER JOIN product on order_item.o_item = product.p_id Group by order_code desc";
    return $result = mysqli_query($con, $sql);
}


function add_order_item()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_btn'])) {
        global $con;
        $order_code = safe_value($con, $_POST['order_id']);
        $item = safe_value($con, $_POST['item_name']);
        $qty = safe_value($con, $_POST['qty']);

        if ($item==0 || $qty==0) {
            set_message(display_error($qty));
        } else {
            $sql= "SELECT * FROM product WHERE p_id = '$item'";
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_assoc($query);
            if ($result) {
                $price = $result['p_o_price'];
                $o_qty = $result['p_stock'];
                $Total = $result['Total'];
                $final_qty = $o_qty-$qty;
                $final_total=$final_qty*$price;
                $result_price =$qty*$price;

                $sql_1="INSERT INTO order_item ( order_code , o_item , o_qty , o_price , o_qty_price ) values ( '$order_code' , '$item' , '$qty' , '$price' , '$result_price' ) ";
                $query_1 = mysqli_query($con, $sql_1);
                if ($query_1) {
                    $sql_3="UPDATE product set p_stock = '$final_qty' , Total = '$final_total' WHERE p_id='$item'";
                    $result=mysqli_query($con, $sql_3);
                    set_message(display_success("success"));
                    header("location:add_invoice.php?order=$order_code");
                }
            }
        }
    }
}


function add_other_btn()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_other_btn'])) {
        global $con;
        $order_code = safe_value($con, $_POST['order_id']);
        $delivery = safe_value($con, $_POST['delivery']);
        $discount = safe_value($con, $_POST['discount']);
        $subtotal = safe_value($con, $_POST['subtotal']);
        $sql = "SELECT * FROM order_item WHERE order_code = $order_code ";
        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            $sql_1 = "UPDATE order_item set discount = '$discount'  , delivery = '$delivery' WHERE order_code = $order_code";
            $result_1=mysqli_query($con, $sql_1);
            header("location:add_invoice.php?order=$order_code");
        }
    }
}


function item_cusinfo()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_cusinfo_btn'])) {
        global $con;
        $order_code = safe_value($con, $_POST['order_id']);
        $customer = safe_value($con, $_POST['customer']);
        $address = safe_value($con, $_POST['address']);
        $payment = safe_value($con, $_POST['payment']);

        $sql = "UPDATE order_item set customer = '$customer' , payment = '$payment' , address = '$address' WHERE order_code = $order_code ";
        $query = mysqli_query($con, $sql);
        if ($query) {
            header("location:add_invoice.php?order=$order_code");
        }
    }
}

function final_item()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_final_btn'])) {
        global $con;
        $name =  $_SESSION['id'];
        $order_code = safe_value($con, $_POST['order_id']);
        $subtotal = safe_value($con, $_POST['subtotal']);
        $final_total = safe_value($con, $_POST['total']);

        if (empty($subtotal) || empty($final_total)) {
            set_message(display_error("Fill in the blank"));
        } else {
            $sql = "UPDATE order_item set subtotal_price = '$subtotal' , total_price = '$final_total' WHERE order_code = $order_code";
            $query = mysqli_query($con, $sql);
            if ($query) {
                $sql_0 = "SELECT * FROM user WHERE id = $name";
                $query_0 = mysqli_query($con, $sql_0);
                $row = mysqli_fetch_assoc($query_0);
                $balance = $row['balance'];
                $total_balance = $balance + $final_total;
                $sql_1 =  "UPDATE user set balance = '$total_balance' WHERE id = $name  ";
                $query_1 = mysqli_query($con, $sql_1);
                header("location:invoice_preview.php?order=$order_code");
            }
        }
    }
}
