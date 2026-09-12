<?php
require("../db.php");
?>

<style>
    .box {
        background: #ffffff;
        border: 1px solid #e4ebb1;
        border-radius: 8px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
        padding: 40px !important;
    }
    .box h1 {
        font-size: 1.6rem;
        font-weight: 600;
        color: #001e00;
        margin-bottom: 15px;
    }
    .box hr {
        border-top: 1px solid #e4ebb1;
        opacity: 1;
        margin-bottom: 30px;
    }
    form label {
        font-weight: 500;
        color: #001e00;
        font-size: 0.95rem;
        margin-top: 8px;
    }
    .form-control, .form-select {
        border: 1px solid #e4ebb1;
        border-radius: 6px;
        padding: 10px 14px;
        font-size: 0.95rem;
        color: #001e00;
    }
    .form-control:focus, .form-select:focus {
        border-color: #14a800;
        box-shadow: 0 0 0 4px rgba(20, 168, 0, 0.1);
        color: #001e00;
    }
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }
    .pro_add_btn, .update_cat_btn {
        background-color: #14a800 !important;
        border: 1px solid #14a800 !important;
        border-radius: 20px !important;
        font-weight: 500 !important;
        padding: 10px 30px !important;
        font-size: 0.95rem !important;
        color: #ffffff !important;
        transition: all 0.2s ease !important;
        margin-top: 15px;
    }
    .pro_add_btn:hover, .update_cat_btn:hover {
        background-color: #118f00 !important;
        border-color: #118f00 !important;
    }
    .modal-content {
        border-radius: 8px;
        border: 1px solid #e4ebb1;
        box-shadow: 0 4px 24px rgba(0,0,0,0.15);
    }
    .modal-header {
        border-bottom: 1px solid #e4ebb1;
        padding: 20px 24px;
    }
    .modal-title {
        font-weight: 600;
        color: #001e00;
    }
    .modal-body {
        padding: 24px;
    }
</style>


<div class="row">
    <div class="col-md-9 col-lg-10">
       <div class="box p-5">
         <h1>Add Products</h1>
        <hr>

        <form class="add_product_frm">
            
            <label class="mb-2">Select Category</label>
            <select id="category" name="category" class="form-select mb-3">
                <option value="none">
                    Select Category
                </option>

                 <?php
                             
                             
                             $data=$db->query("SELECT * FROM category");
                             while($aa=$data->fetch_assoc()){
                                echo "
                                <option value='".$aa['category_url']."'>".$aa['category_name']."</option>
                                
                                ";
                             }
                             
                             ?>
            </select>
            
            <label class="mb-2">Upload Product Pic</label>
            <input type="file" name="product_pic" class="form-control mb-3" accept="images/*">
            
            <label class="mb-2">Product Name</label>
            <input type="text" name="product_name" class="form-control mb-3" >
            
            <label class="mb-2">Product Description</label>
            <textarea name="product_description" rows="5" class="form-control mb-3"></textarea>
            
            <div class="row">
                <div class="col-sm-6">
                    <label class="mb-2">Product Quantity</label>
                    <input type="number" name="product_quantity" class="form-control mb-3" >
                </div>
                <div class="col-sm-6">
                    <label class="mb-2">Product Amount</label>
                    <input type="number" name="product_amount" class="form-control mb-3" >
                </div>
            </div>

            <button type="submit" class="btn btn-primary pro_add_btn">Add Products</button>

        </form>
       </div>
    </div>
</div>
   
<div class="modal fade" tabindex="-1" id="cat_edit_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <form class="edit_cat_frm">
            <div class="form-group">
            <label for="category_name" class="mb-2"> Category Name</label>
            <input type="text" class="form-control mb-3" id="edit_cat_name" name="edit_cat_name">
            

            </div>
            <input type="text" name="edit_cat_id" id="edit_cat_id" class="d-none">
            <button type="submit" class="btn btn-primary update_cat_btn">Edit Category</button>
        </form>
            </div>
            
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function(){
        $(".add_product_frm").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"php/add_product.php",
                data:new FormData(this),
                contentType:false,
                processData:false,
                beforeSend:function(){
                    $(".pro_add_btn").html("Please Wait...");
                    $(".pro_add_btn").attr("disabled","disabled");

                },
                success:function(response){
                     $(".pro_add_btn").html("Add Product");
                    $(".pro_add_btn").removeAttr("disabled");
                    if(response.trim()==="success"){

                        var div=document.createElement("DIV");
                        $(div).addClass("alert alert-success");
                        $(div).html("Product Add Successfully");
                        $(".msg").html(div);
                        $(".msg").removeClass("d-none");
                        setTimeout(function(){
                               $(".msg").addClass("d-none");
                                $(".add_product_frm").trigger('reset');

                        },2500)

                    }
                    else{

                    }

                }
            })
        })
    })
</script>
