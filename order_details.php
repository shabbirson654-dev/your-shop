<?php 
require("php/db.php")
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	    <link rel="stylesheet" href="https:// yourshop.42web.io/shop/css/bootstrap.min.css">
    <script src="https:// yourshop.42web.io/shop/js/bootstrap.bundle.min.js"></script>
    <script src="https:// yourshop.42web.io/shop/js/jquery.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #311042 100%) !important;
            background-attachment: fixed !important;
            color: #f8fafc;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        h1.text-center {
            font-weight: 800;
            letter-spacing: -0.02em;
            text-transform: uppercase;
            font-size: 2.25rem;
            position: relative;
            margin-bottom: 2rem !important;
        }
        
        h1.text-center::after {
            content: '';
            display: block;
            width: 45px;
            height: 3px;
            background: linear-gradient(90deg, #38bdf8 0%, #818cf8 100%);
            margin: 8px auto 0 auto;
            border-radius: 10px;
        }

        .checkout-box {
            border-radius: 24px !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            background: rgba(15, 23, 42, 0.6) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3) !important;
        }

        .product-preview-img {
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.03);
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            object-fit: contain;
        }

        h4 {
            font-weight: 700;
            color: #f1f5f9;
        }

        .product-title {
            text-transform: capitalize;
            color: #38bdf8 !important;
            font-weight: 700;
        }

        .product-price {
            background: linear-gradient(90deg, #38bdf8 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .table-custom {
            color: #cbd5e1 !important;
            border-color: rgba(255, 255, 255, 0.06) !important;
            margin-bottom: 1.5rem;
        }

        .table-custom th {
            color: #94a3b8 !important;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.02) !important;
            border-color: rgba(255, 255, 255, 0.06) !important;
            width: 30%;
        }

        .table-custom td {
            color: #e2e8f0 !important;
            background: transparent !important;
            border-color: rgba(255, 255, 255, 0.06) !important;
        }

        .form-control.product-qty-input {
            background: rgba(15, 23, 42, 0.5) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border-radius: 10px !important;
            padding: 10px 14px;
            font-weight: 600;
        }

        .form-control.product-qty-input:focus {
            border-color: #38bdf8 !important;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.25) !important;
        }

        .custom-radio-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 12px;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .custom-radio-card:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(56, 189, 248, 0.3);
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .form-check-input:checked {
            background-color: #38bdf8 !important;
            border-color: #38bdf8 !important;
        }

        .form-check-label {
            color: #e2e8f0;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
        }

        .btn-order-submit {
            background: linear-gradient(90deg, #38bdf8 0%, #818cf8 100%) !important;
            border: none !important;
            color: #0f172a !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            padding: 14px 28px !important;
            border-radius: 12px !important;
            width: 100%;
            box-shadow: 0 8px 20px rgba(56, 189, 248, 0.2) !important;
            transition: all 0.3s ease !important;
        }

        .btn-order-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(56, 189, 248, 0.35) !important;
            opacity: 0.95;
        }

        hr {
            border-color: rgba(255, 255, 255, 0.08) !important;
            opacity: 1;
            margin: 1.75rem 0;
        }

        label {
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>


<?php 

require("element/nav.php");
 ?>


 <?php 


$pro_id=$_GET['p_id'];
$pro_sql=$db->query("SELECT * FROM product WHERE id='$pro_id'");
$aa=$pro_sql->fetch_assoc();

$user_email=base64_decode($_COOKIE['_aut_ui_']);
$user_response=$db->query("SELECT * FROM register WHERE email='$user_email'");
$user_aa=$user_response->fetch_assoc();
$traker=$aa['traker'];

  ?>
  <h1 class="text-center mt-5">Order Details</h1>
  
  <div class="container">
  	<div class="row">
  		
  		<div class="col-md-3"></div>
        <div class="col-md-6 border p-4 mt-3 mb-5 checkout-box">
         <div class="d-flex align-items-center">
            <div>

            <img src="https:// yourshop.42web.io/shop/product_pic/<?php echo $aa['product_pic'] ?>"  width="130" alt="" class="product-preview-img">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h4 class="ms-4 product-title"><?php
                echo $aa['product_name'];
                ?></h4>
                <h5 class="ms-4 product-price">Price: <?php  echo $aa['product_amount']; ?></h5>
            </div>
         </div>
         <hr>
        <h4 class="mb-3">Customer Details</h4>
        <table class="table table-bordered table-custom">
            <tr>
                <th>Name</th>
                <td><?php echo $user_aa['fullname']; ?></td>
            </tr>
             <tr>
                <th>Phone No.</th>
                <td><?php echo $user_aa['mobile']; ?></td>
            </tr>
             <tr>
                <th>Email Id</th>
                <td><?php echo $user_aa['email']; ?></td>
            </tr>
             <tr>
                <th>Address</th>
                <td><?php echo $user_aa['address']; ?></td>
            </tr>
        </table>

        <form class="order_frm">

        <label class="mb-2">Product Quantity</label>
        <input type="number" class="form-control product_qty product-qty-input mb-4" value="1">
        
        <label class="mb-2">Payment Mode</label>
        <div class="form-check custom-radio-card d-flex align-items-center">
            <input type="radio" class="form-check-input me-2 mt-0" name="payment_mode" id="flexRadioDefault1" value="online">
            <label for="flexRadioDefault1" class="form-check-label">
                Online
            </label>
        </div>
        <div class="form-check custom-radio-card d-flex align-items-center">
            <input type="radio" class="form-check-input me-2 mt-0" name="payment_mode" id="flexRadioDefault2" value="cod">
            <label for="flexRadioDefault2" class="form-check-label">
                Cash on Delivery
            </label>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary btn-order-submit">Place Order</button>

        </form>

        </div>
        
        <div class="col-md-3"></div>
  	</div>
  </div>
  <?php 

require("element/footer.php");

 ?>
  <script>

    $(document).ready(function(){
       $(".order_frm").submit(function(e){
        e.preventDefault();
        var payment_mode=$("[name='payment_mode']:checked").val();
        if(payment_mode){
            if(payment_mode=="online"){
                window.location.href="https:// yourshop.42web.io/shop/pay.php?p_id=<?php echo $pro_id?>&p_qty="+$(".product_qty").val()+"&p_mode="+payment_mode

            }
            else if(payment_mode=="cod"){
                window.location.href="https:// yourshop.42web.io/shop/php/receive_order.php?p_id=<?php echo $pro_id?>&p_qty="+$(".product_qty").val()+"&p_mode="+payment_mode
            }

        }

        else{
            alert("Please select payment mode");
        }
       })
    })
  </script>
</body>

</html>
