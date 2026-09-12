
<style>
nav, .navbar {
    background: rgba(15, 23, 42, 0.85) !important;
    backdrop-filter: blur(12px) !important;
    -webkit-backdrop-filter: blur(12px) !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15) !important;
}

/* Fix text coloring to shine cleanly on the dark header */
nav a, .navbar a, .nav-link {
    color: #cbd5e1 !important;
    font-weight: 500 !important;
    transition: color 0.2s ease !important;
}

/* Vibrant brand tone accent highlight when links are active */
nav a:hover, .nav-link:hover {
    color: #38bdf8 !important;
}

/* Ensures your user's dynamic greeting name stays bright */
.brand-user-greeting, nav .navbar-brand {
    color: #ffffff !important;
    font-weight: 600 !important;
}



</style>


<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light p-3 shadow">

<div class="container-fluid">
    <a href="" class="navbar-brand ">
        <img src="http://localhost/shop/images/logo.png" width="80" alt="shop_pic" class="ms-3" style="border-radius:15px;">

        <?php
        require("php/db.php");
        
       
        if(!empty($_COOKIE['_aut_ui_'])){

         $user_email=base64_decode($_COOKIE['_aut_ui_']);
            $get_data=$db->query("SELECT fullname FROM register WHERE email='$user_email'");
            $aa=$get_data->fetch_assoc();
            echo "  " .$aa['fullname'];
        }
        
        ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
     data-bs-target="#navbarsupportedcontent" aria-controls="navbarsupportedcontent"
     aria-expand="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsupportedcontent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item px-3">
                <a href="http://localhost/shop/" class="nav-link ">Home</a>
            </li>
            

            <?php 
            
            

                 $cat_data_sql=$db->query("SELECT * FROM category");
                 while ($cat_data=$cat_data_sql->fetch_assoc()) {
                     // code...
                    echo '

                   <li class="nav-item px-3">
                <a href="http://localhost/shop/category/'.$cat_data['category_url'].'" class="nav-link">'.$cat_data['category_name'].'</a>
            </li>
                    ';
                 }


             ?>

             <?php
             
             if(empty($_COOKIE['_aut_ui_'])){

             echo '
             
              <li class="nav-item px-3 ms-auto">
                <a href="http://localhost/shop/register.php" class="nav-link">Register Now</a>
            </li>
            <li class="nav-item px-3 ms-auto">
                <a href="http://localhost/shop/login.php" class="nav-link">Login </a>
            </li>
             ';

             }
             else{
                echo '
                 <li class="nav-item px-3">
                <a href="http://localhost/shop/my_order.php" class="nav-link">My Order</a>
            </li>
            <li class="nav-item px-3">
                <a href="http://localhost/shop/signout.php" class="nav-link">Sign Out </a>
            </li>
                ';
             }
             ?>
            
             
             <li class="nav-item px-3">
                <a href="#" class="nav-link">About Us</a>
            </li>
             <li class="nav-item px-3 ">
                <a href="#" class="nav-link">Contact Us</a>
            </li>
           
            
        </ul>
    </div>
</div>
</nav>