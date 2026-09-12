<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f7f9fa;
            color: #001e00;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        /* Desktop Sidebar */
        .left {
            width: 17%;
            height: 100vh;
            background-color: #001e00;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 10px;
            z-index: 1000;
        }

        .right {
            width: 83%;
            overflow-y: auto;
            height: 100vh;
            margin-left: 17%;
            background-color: #f7f9fa;
        }

        /* Mobile Header & Sidebar */
        .mobile-header {
            background-color: #001e00;
            color: #ffffff;
            padding: 12px 20px;
        }

        .mleft {
            width: 260px;
            height: 100vh;
            background-color: #001e00;
            position: fixed;
            left: -260px;
            top: 0;
            padding-top: 10px;
            z-index: 1050;
            transition: left 0.3s ease;
            box-shadow: 4px 0 15px rgba(0,0,0,0.3);
        }

        .mleft.active {
            left: 0;
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
            backdrop-filter: blur(2px);
        }

        /* Menu Styling */
        .left ul, .mleft ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .left ul li, .mleft ul li {
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            transition: all 0.2s ease;
            border-left: 4px solid transparent;
        }

        .left ul li:hover, .mleft ul li:hover {
            background-color: rgba(20, 168, 0, 0.15);
            color: #14a800;
            cursor: pointer;
            border-left: 4px solid #14a800;
            padding-left: 20px !important;
        }

        /* Loading Modal */
        .msg {
            width: 100%;
            height: 100vh;
            background-color: rgba(0,0,0,0.5);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100000;
            backdrop-filter: blur(4px);
        }

        .msg .alert-success {
            background-color: #ffffff;
            color: #001e00;
            border: 1px solid #e4ebb1;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            font-weight: 500;
            padding: 15px 30px;
        }

        /* Responsive Breakpoints */
        @media (max-width: 767.98px) {
            .right {
                width: 100%;
                margin-left: 0;
                height: calc(100vh - 56px);
            }
        }
    </style>
</head>
<body>

    <!-- Mobile Top Navigation Bar -->
    <div class="mobile-header d-flex justify-content-between align-items-center d-md-none">
        <h5 class="mb-0 fw-bold text-white">Admin Panel</h5>
        <button class="btn btn-outline-light btn-sm toggle-menu fs-5 px-2 py-0">&#9776;</button>
    </div>

    <!-- Mobile Slide-out Menu -->
    <div class="mleft d-md-none">
        <div class="d-flex justify-content-between align-items-center px-3 pb-3 border-bottom border-secondary mb-2">
            <span class="text-white fw-bold">Menu</span>
            <button class="btn text-white cut fs-4 p-0">&times;</button>
        </div>
        <ul>
            <li class="px-3 py-3 menu" p_link="category">Category</li>
            <li class="px-3 py-3 menu" p_link="add_products">Add Products</li>
            <li class="px-3 py-3 menu" p_link="all_products">All Products</li>
            <li class="px-3 py-3 menu" p_link="orders">Orders</li>
        </ul>
    </div>

    <!-- Background Overlay for Mobile Menu -->
    <div class="mobile-overlay d-md-none"></div>

    <!-- Desktop Main Layout -->
    <div class="w-100 d-flex">
        <div class="left d-none d-md-block">
            <ul>
                <li class="px-3 py-3 menu" p_link="category">Category</li>
                <li class="px-3 py-3 menu" p_link="add_products">Add Products</li>
                <li class="px-3 py-3 menu" p_link="all_products">All Products</li>
                <li class="px-3 py-3 menu" p_link="orders">Orders</li>
            </ul>
        </div>
        <div class="right p-4"></div>
    </div>

    <!-- Global Loading Overlay -->
    <div class="msg d-none"></div>

    <script>
        $(document).ready(function(){
            
            // Handle AJAX Page Loading
            $(".menu").each(function(){
                $(this).click(function(){
                    var page_link = $(this).attr("p_link");
                    
                    // Close mobile menu if open
                    closeMobileMenu();

                    $.ajax({
                        type: "POST",
                        url: "php/pages/" + page_link + ".php",
                        beforeSend: function(){
                            var div = document.createElement("DIV");
                            $(div).addClass("alert alert-success");
                            $(div).html("Loading....");

                            $(".msg").html(div);
                            $(".msg").removeClass("d-none");
                        },
                        success: function(response){
                            $(".msg").addClass("d-none");
                            $(".right").html(response);
                        }
                    });
                });
            });

            // Mobile Menu Toggle Controls
            $(".toggle-menu").click(function(){
                $(".mleft").addClass("active");
                $(".mobile-overlay").fadeIn(200);
            });

            function closeMobileMenu(){
                $(".mleft").removeClass("active");
                $(".mobile-overlay").fadeOut(200);
            }

            $(".cut, .mobile-overlay").click(function(){ 
                closeMobileMenu();
            });
        });
    </script>
</body>
</html>