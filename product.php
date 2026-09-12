<?php require("php/db.php")
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

    <script>
        new WOW().init();
    </script>
    <style>
        /* --- MODERN MIXED GRADIENT THEME VARIABLES --- */
        :root {
            /* The modern e-commerce mix: Deep midnight indigo into hot purple neon accents */
            --gradient-primary: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #c084fc 100%);
            --gradient-price: linear-gradient(90deg, #10b981 0%, #059669 100%);
            --bg-body: #f8fafc;        /* Soft slate porcelain white for content breathing room */
            --bg-glass-card: #ffffff;  /* Frosted white canvas cards */
            --text-heading: #0f172a;   /* Rich ink black for bold text readability */
        }

       	 body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #311042 100%) !important;
            background-attachment: fixed !important;
            color: #f8fafc;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .cb:hover{
            cursor: pointer;
        }

        /* 1. Symmetrical Rigid Card Framing with Smooth Glass-Look Shadows */
        .card.rounded-0 {
            border-radius: 20px !important; /* Premium curved corner geometry */
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.8) !important;
            background-color: var(--bg-glass-card) !important;
            height: 450px; /* Forces identical card heights across all dynamic items */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.03) !important; /* Soft tinted drop-shadow */
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease !important;
        }

        /* 2. Over-the-top Wow floating lift & glowing border simulation on hover */
        .card.rounded-0:hover {
            transform: translateY(-10px) scale(1.02); /* Spring-loaded physical floating effect */
            box-shadow: 0 25px 40px rgba(124, 58, 237, 0.12) !important; /* Violet aura shadow glow */
            border-color: rgba(124, 58, 237, 0.3) !important;
        }

        /* 3. Forces all uploaded admin images into equal bounding viewports */
        .img-container-fixed {
            width: 100%;
            height: 250px; /* Perfectly aligned square dimension for assets */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow: hidden;
            background: #ffffff;
        }

        .img-container-fixed img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain; /* Prevents raw dynamic pictures from warping, stretching, or breaking design lines */
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        /* Dramatic fluid lens zoom on product photos */
        .card.rounded-0:hover img {
            transform: scale(1.09); 
        }

        /* 4. Complete Overhaul of the text box (Goodbye dull #ccc) */
        .card-body.cb {
            border-radius: 0 0 20px 20px !important; 
            margin-top: 0 !important; 
            height: 125px; /* Locked bottom text area height */
            background: linear-gradient(to bottom, #ffffff, #fdfeff) !important; /* Sleek frosted glass transition */
            border-top: 1px solid #f1f5f9 !important;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 16px 20px !important;
            box-shadow: none !important; /* Clears messy overlay background bugs */
            transition: all 0.3s ease !important;
        }

        /* Shift background to gradient accent tint upon card interaction */
        .card.rounded-0:hover .card-body.cb {
            background: linear-gradient(180deg, #ffffff 0%, #f5f3ff 100%) !important; /* Soft violet wash at bottom */
        }

        /* Product Names Typography style */
        .card-body.cb label.text-secondary {
            color: #334155 !important;
            font-weight: 700;
            font-size: 1.15rem !important;
            letter-spacing: -0.01em;
            transition: color 0.3s ease;
        }
        .card.rounded-0:hover .card-body.cb label.text-secondary {
            color: #4f46e5 !important; /* Text shifts beautifully to indigo when card is active */
        }

        /* Dynamic High-End Gradient Pricing Text */
        .card-body.cb label.text-dark {
            background: var(--gradient-primary); /* Applies the gorgeous mixed color wheel to text */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            font-size: 1.3rem !important;
            display: inline-block;
            margin-top: 4px;
        }

        /* Clean link defaults */
        a {
            text-decoration: none !important;
        }

        /* 5. Beautiful Mixed Gradient Title Accent lines */
        h1.text-center {
            font-weight: 800;
           
            letter-spacing: -0.03em;
            text-transform: uppercase;
            font-size: 2.25rem;
            position: relative;
            margin-bottom: 2.5rem !important;
        }
        
        /* Modern accent underline rule using the color mix */
        h1.text-center::after {
            content: '';
            display: block;
            width: 70px;
            height: 5px;
            background: var(--gradient-primary);
            margin: 12px auto 0 auto;
            border-radius: 10px;
        }

        /* 6. Dynamic Glass effect overlay protection on navbar items */
        nav, .navbar {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(10px); /* Frosted modern background glass */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03) !important;
            border-bottom: 1px solid rgba(241, 245, 249, 1) !important;
        }
    </style>
<body>


<?php 

require("element/nav.php");
 ?>
<div class="container">
 <?php 
 $cat=$_GET['product_category'];
 $product_heading=str_replace("-", " ", $cat);
 $product_heading=ucfirst($product_heading);

 $product_sql=$db->query("SELECT * FROM product WHERE category='$cat' ORDER BY id DESC");
                   echo '<div class="row">

                    <h1 class="text-center my-5">'.$product_heading.'</h1><br>
                   
                   ';

                   while($pro_data=$product_sql->fetch_assoc())
                   {
                      echo '

                        <div class="col-md-3">

                              <div class="card rounded-0  mb-4">
                              <div class="text-center p-1 mt-2">
                              <img src="https:// yourshop.42web.io/shop/product_pic/'.$pro_data['product_pic'].'" width="250" height="250">
                                  </div>
                                  <a href="https:// yourshop.42web.io/shop/product-details/'.$pro_data['id'].'"> 
                                  <div class="card-body cb rounded-0 mt-3 p-2 shadow" style="background-color:#e5e5e5 ;">

                                  <label class=" text-secondary fs-5" >'.$pro_data['product_name'].'</label><br>
                                  <div >
                                   <label class="fs-5 text-dark ">Price:'.$pro_data['product_amount'].'</label><br>
                                 
                                    

                                      </div>

                        </div>
                             </a>
                        </div>

                        </div>
                      ';
                   }

                   echo '</div>';


  ?>
</div>
<?php 

require("element/footer.php");

 ?>
</body>
</html>