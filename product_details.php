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
</head>

<style>
 body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #311042 100%) !important;
            background-attachment: fixed !important;
            color: #f8fafc;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
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
</style>
<body>


<?php 

require("element/nav.php");
 ?>


 <?php 


$pro_id=$_GET['id'];
$pro_sql=$db->query("SELECT * FROM product WHERE id='$pro_id'");
$aa=$pro_sql->fetch_assoc();

  ?>
  <h1 class="text-center mt-5">Product Details</h1>
  
  <div class="container">
  	<div class="row">
  		<div class="col-md-6">
  			
  			<img src="https:// yourshop.42web.io/shop/product_pic/<?php echo $aa['product_pic'] ; ?>" width="60%" style="border-radius:13px;">
  		</div>
  		<div class="col-md-6 d-flex justify-content-center flex-column">
      
      <h2><?php echo $aa['product_name'] ; ?></h2> 
      <hr>
      <h2>Price:<?php echo $aa['product_amount'] ; ?></h2>  
      <?php


            if ($aa['product_quantity']==0) {
              // code...
              echo "<h3 class='text-danger'>Not Avaliable</h3>";
            } else {
              // code...
              echo "<h3 class='text-success'> Avaliable</h3>";
            }
            
      ?>
      <label class="fs-5 text-secondary">Product Feature</label>
      <?php echo $aa['product_description'] ; ?>


      <?php
      
      if(!empty($_COOKIE['_aut_ui_'] ) && $aa['product_quantity']!=0 ){
        echo '<a href="https:// yourshop.42web.io/shop/order-details/'.$pro_id.'"><button class="btn btn-order-submit w-25 mt-4 buy_btn">Buy Now </button></a>';

      }
	  
	  else if(($aa['product_quantity']==0 )){
		  
		   echo '<button class="btn  btn-order-submit w-25 mt-4 buy_btn" disabled="disabled">SOLD </button>';

	  }
      else{
            echo '<a href="https:// yourshop.42web.io/shop/login.php"><button class="btn btn-order-submit w-25 mt-4">Buy Now </button></a>';
      }
      ?>
      <!--<button class="btn btn-primary w-25 mt-4">Buy Now </button>-->
      </div>
  	</div>
  </div>
</body>
<?php 

require("element/footer.php");

 ?>
</html>