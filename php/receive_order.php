<?php

require("db.php");


$p_id=$_GET['p_id'];//get data
$pro_sql=$db->query("SELECT * FROM product WHERE id='$p_id'");
$aa=$pro_sql->fetch_assoc();
$product_name=$aa['product_name'];
$product_amount=$aa['product_amount'];
$product_qty=$_GET['p_qty'];//get data
$tp_amount=$product_qty*$product_amount;
$user_email=base64_decode($_COOKIE['_aut_ui_']);
$user_response=$db->query("SELECT * FROM register WHERE email='$user_email'");
$user_aa=$user_response->fetch_assoc();
$c_name=$user_aa['fullname'];
$c_mobile=$user_aa['mobile'];
$c_address=$user_aa['address'];
$p_mode=$_GET['p_mode'];//get data
$p_pic=$aa['product_pic'];
$order_date=date("Y-m-d");
$parts = explode('?tracker=', $p_mode, 2);

$payment_mode = $parts[0];
$tracker = $parts[1] ?? '';



$payment_status="";
if($payment_mode=="online" && !empty($tracker)){
	$payment_status="complete";
	
}

else if($p_mode=="cod"){
	$payment_status="pending";
}

else{
	die("<h1 style='color:red;'>!!!Invalid Try Again Later!!!</h1>");
}


$check=$db->query("SELECT * FROM receive_order");
if($check){
   $store=$db->query("INSERT INTO receive_order(order_date,p_name,p_pic,p_amount,tp_amount,p_qty,c_name,c_mobile,c_email,c_address,payment_mode,payment_status,tracker)
VALUES('$order_date','$product_name','$p_pic','$product_amount','$tp_amount','$product_qty','$c_name','$c_mobile','$user_email','$c_address','$p_mode','$payment_status','$tracker')
");
if($store){
    // Query to decrease product quantity
    $db->query("UPDATE product SET  product_quantity = product_quantity - $product_qty WHERE id = '$p_id'");

     header("Location:../my_order.php");
}
else{
    echo "failed";
}

}

else{

$create_table=$db->query("CREATE TABLE receive_order(
id INT(11) NOT NULL AUTO_INCREMENT,
order_date DATE,
p_name VARCHAR(255),
p_pic VARCHAR(255),
p_amount VARCHAR(255),
tp_amount VARCHAR(255),
p_qty VARCHAR(255),
c_name VARCHAR(255),
c_mobile VARCHAR(255),
c_email VARCHAR(255),
c_address VARCHAR(255),
payment_mode VARCHAR(255),
payment_status VARCHAR(255),
order_status VARCHAR(255) DEFAULT 'pending',
PRIMARY KEY(id)


) ");

if($create_table){

$store=$db->query("INSERT INTO receive_order(order_date,p_name,p_pic,p_amount,tp_amount,p_qty,c_name,c_mobile,c_email,c_address,payment_mode,payment_status,tracker)
VALUES('$order_date','$product_name','$p_pic','$product_amount','$tp_amount','$product_qty','$c_name','$c_mobile','$user_email','$c_address','$p_mode','$payment_status','$tracker')
");

if($store){
    // Query to decrease product quantity
    $db->query("UPDATE product SET product_quantity = product_quantity - $product_qty WHERE id = '$p_id'");

    header("Location:../my_order.php");
}
else{
    echo "failed";
}

}
else{
    echo "table not created";
}
}












?>