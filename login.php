
<?php 

require("php/db.php");
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
</head>
<body>

<?php 

require("element/nav.php");

 ?>
 <div class="container mt-5 ">
    <div class="row p-5 " >
   
    

 <h1 class="mb-5 text-center">Login with Us</h1>
 
     <hr>
	 <div class="col-md-3"></div>
<div class="col-md-6 p-5 mt-2 " style="box-shadow:0px 0px 30px #ccc;" >
    
    <form class="login_frm" >
    

    <label  class="mb-2">Enter Email</label>
    <input type="email" name="email" class="form-control mb-3">
    <label  class="mb-2">Enter Password</label>
    <input type="password" name="password" class="form-control mb-3">
    <button class="btn btn-order-submit mt-5">Login Now</button>
    </form>
    <div class="msg"></div>
</div>
<div class="col-md-3"></div>
    </div>


 

 </div>
<?php 

require("element/footer.php");

 ?>
<script>

    $(document).ready(function(){
        $(".login_frm").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"php/s_login.php",
                data:new FormData(this),
                processData:false,
                contentType:false,
                beforeSend:function(){
                             $(".r_btn").html("Please Wait...");
                             $(".r_btn").attr("disabled","disabled");
                },
                success:function(response){
                       $(".r_btn").html("Login Now");
                             $(".r_btn").removeAttr("disabled");
                             
                             if(response.trim()==="success")
                                {
                                    location.href="index.php";


                       

                             
                             }

                             else{
                                 var div=document.createElement("DIV");
                        $(div).addClass("alert alert-danger mt-2");
                        $(div).html(response);
                        $(".msg").html(div);
                        setTimeout(function(){
                            $(".msg").html("");
                        },3000)

                             }
                }
            })
        })
    })
</script>
</body>
</html>