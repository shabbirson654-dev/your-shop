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
			min-height: 100vh;
			display: flex;
			flex-direction: column;
		}
		.main-heading {
			font-weight: 700;
			letter-spacing: 1px;
			text-transform: uppercase;
			background: linear-gradient(45deg, #ffffff, #d8b4fe);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			margin-bottom: 40px;
		}
		.section-title {
			font-size: 1.5rem;
			font-weight: 600;
			margin-top: 30px;
			margin-bottom: 20px;
			color: #f3e8ff;
			border-left: 4px solid #c084fc;
			padding-left: 12px;
		}
		.order-card {
			background: rgba(15, 23, 42, 0.4);
			border: 1px solid rgba(216, 180, 254, 0.15);
			border-radius: 12px;
			padding: 16px;
			margin-bottom: 20px;
			box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
			backdrop-filter: blur(8px);
			-webkit-backdrop-filter: blur(8px);
			transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
		}
		.order-card:hover {
			transform: translateY(-2px);
			border-color: rgba(216, 180, 254, 0.4);
			box-shadow: 0 8px 32px 0 rgba(216, 180, 254, 0.1);
		}
		.product-img-wrapper {
			background: rgba(255, 255, 255, 0.02);
			border-radius: 8px;
			padding: 6px;
			display: flex;
			align-items: center;
			justify-content: center;
			border: 1px solid rgba(216, 180, 254, 0.1);
		}
		.product-img-wrapper img {
			border-radius: 6px;
			object-fit: contain;
		}
		.product-title {
			font-weight: 600;
			color: #ffffff;
			margin-bottom: 6px !important;
		}
		.meta-text {
			color: #cbd5e1;
			font-size: 0.9rem;
			margin-bottom: 4px !important;
		}
		.meta-text strong {
			color: #e2e8f0;
		}
		.badge-pending {
			background: rgba(234, 179, 8, 0.1);
			color: #fbd38d;
			border: 1px solid rgba(234, 179, 8, 0.2);
			padding: 4px 10px;
			border-radius: 6px;
			font-size: 0.8rem;
			font-weight: 600;
			display: inline-block;
			margin-bottom: 10px;
		}
		.badge-complete {
			background: rgba(168, 85, 247, 0.15);
			color: #d8b4fe;
			border: 1px solid rgba(168, 85, 247, 0.3);
			padding: 4px 10px;
			border-radius: 6px;
			font-size: 0.8rem;
			font-weight: 600;
			display: inline-block;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>

<?php 
require("element/nav.php");
?>

<div class="container my-5 flex-grow-1">
	<h1 class="text-center main-heading">My Orders</h1>
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<h2 class="section-title">Pending Orders</h2>

			<?php
			$user_email=base64_decode($_COOKIE['_aut_ui_']);
			$get_data=$db->query("SELECT * FROM receive_order WHERE c_email='$user_email' AND order_status='pending'");
			while($data=$get_data->fetch_assoc()){
				$date=date_create($data['order_date']);
				$f_date=date_format($date,"d-M-Y");
				echo "
				<div class='d-flex align-items-center order-card'>
					<div class='product-img-wrapper'>
						<img src='product_pic/".$data['p_pic']."' width='100' height='100'>
					</div>
					<div class='ps-4 flex-grow-1'>
						<span class='badge-pending'>Pending Delivery</span>
						<p class='fs-4 p-0 m-0 product-title'>".$data['p_name']."</p>
						<p class='p-0 m-0 meta-text'><strong>Price:</strong> Rs. ".number_format($data['tp_amount'])."</p>
						<p class='p-0 m-0 meta-text'><strong>Quantity:</strong> ".$data['p_qty']."</p>
						<p class='p-0 m-0 meta-text'><strong>Order Date:</strong> ".$f_date."</p>
						<p class='p-0 m-0 meta-text'><strong>Order ID:</strong> #".$data['id']."</p>
					</div>
				</div>
				";
			}
			?>

			<h2 class="section-title">Complete Orders</h2>

			<?php
			$user_email=base64_decode($_COOKIE['_aut_ui_']);
			$get_data=$db->query("SELECT * FROM receive_order WHERE c_email='$user_email' AND order_status='complete'");
			while($data=$get_data->fetch_assoc()){
				$date=date_create($data['order_date']);
				$f_date=date_format($date,"d-M-Y");
				echo "
				<div class='d-flex align-items-center order-card'>
					<div class='product-img-wrapper'>
						<img src='product_pic/".$data['p_pic']."' width='100' height='100'>
					</div>
					<div class='ps-4 flex-grow-1'>
						<span class='badge-complete'>Completed & Delivered</span>
						<p class='fs-4 p-0 m-0 product-title'>".$data['p_name']."</p>
						<p class='p-0 m-0 meta-text'><strong>Total Price:</strong> Rs. ".number_format($data['tp_amount'])."</p>
						<p class='p-0 m-0 meta-text'><strong>Quantity:</strong> ".$data['p_qty']."</p>
						<p class='p-0 m-0 meta-text'><strong>Order Date:</strong> ".$f_date."</p>
						<p class='p-0 m-0 meta-text'><strong>Order ID:</strong> #".$data['id']."</p>
					</div>
				</div>
				";
			}
			?>

		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<?php 
require("element/footer.php");
?>
</body>
</html>
