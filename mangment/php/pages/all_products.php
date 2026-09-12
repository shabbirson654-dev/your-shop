<?php
require("../db.php");
?>

<style>
    .box {
        background: #ffffff;
        border: 1px solid #e4ebb1;
        border-radius: 8px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
        padding: 20px !important;
    }
    @media (min-width: 768px) {
        .box {
            padding: 40px !important;
        }
    }
    .table-responsive {
        border-radius: 8px;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        width: 100%;
        border: 1px solid #e4ebb1;
    }
    .table {
        margin-bottom: 0;
        width: 100%;
        min-width: 750px;
    }
    .table thead th {
        color: #001e00;
        font-weight: 600;
        border-bottom: 2px solid #e4ebb1;
        font-size: 0.9rem;
        padding: 12px 16px;
        white-space: nowrap;
    }
    .table tbody td {
        color: #001e00;
        vertical-align: middle;
        padding: 14px 16px;
        border-bottom: 1px solid #e4ebb1;
        font-size: 0.9rem;
        white-space: nowrap;
    }
    .product-thumbnail {
        border-radius: 6px;
        border: 1px solid #e4ebb1;
        object-fit: contain;
        background: #f7f9fa;
        padding: 4px;
        width: 50px;
        height: 50px;
    }
    .pro_edit_btn {
        cursor: pointer;
        width: 18px;
        height: 18px;
        transition: transform 0.2s ease;
    }
    .pro_edit_btn:hover {
        transform: scale(1.15);
    }
    td img[src='delete.png'] {
        cursor: pointer;
        width: 18px;
        height: 18px;
        transition: transform 0.2s ease;
    }
    td img[src='delete.png']:hover {
        transform: scale(1.15);
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
    .modal-body label {
        font-weight: 500;
        color: #001e00;
        font-size: 0.95rem;
        margin-top: 8px;
    }
    .modal-body .form-control, .modal-body .form-select {
        border: 1px solid #e4ebb1;
        border-radius: 6px;
        padding: 10px 14px;
        font-size: 0.95rem;
        color: #001e00;
    }
    .modal-body .form-control:focus, .modal-body .form-select:focus {
        border-color: #14a800;
        box-shadow: 0 0 0 4px rgba(20, 168, 0, 0.1);
    }
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }
    .pro_add_btn {
        background-color: #14a800 !important;
        border: 1px solid #14a800 !important;
        border-radius: 20px !important;
        font-weight: 500 !important;
        padding: 10px 30px !important;
        font-size: 0.95rem !important;
        color: #ffffff !important;
        transition: all 0.2s ease !important;
        margin-top: 15px;
        width: 100%;
    }
    .pro_add_btn:hover {
        background-color: #118f00 !important;
        border-color: #118f00 !important;
    }
</style>

<div class="row container-fluid m-0 p-0">
    <div class="col-12 p-0">
        <div class="box">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Product Pic</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Product Amount</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=$db->query("SELECT * FROM product");
                        while($aa=$data->fetch_assoc()){
                            echo "
                            <tr>
                            <td>".$aa['id']."</td>
                            <td><img src='../product_pic/".$aa['product_pic']."' class='product-thumbnail'></td>
                            <td>".$aa['product_name']."</td>
                            <td>".$aa['product_quantity']."</td>
                            <td>Rs. ".number_format($aa['product_amount'])."</td>
                            <td><img src='edit.png' class='pro_edit_btn' id='".$aa['id']."'></td>
                           <td><img src='delete.png' class='pro_delete_btn' id='".$aa['id']."'></td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="pro_edit_modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="edit_product_frm">
                    <label class="mb-2">Select Category</label>
                    <select id="category" name="category" class="form-select mb-2">
                        <option value="none">Select Category</option>
                        <?php
                        $data=$db->query("SELECT * FROM category");
                        while($aa=$data->fetch_assoc()){
                            echo "<option value='".$aa['category_url']."'>".$aa['category_name']."</option>";
                        }
                        ?>
                    </select>
                    
                    <label class="mb-2">Upload Product Pic</label>
                    <input type="file" name="product_pic" id="product_pic" class="form-control mb-3" accept="images/*">
                    
                    <label class="mb-2">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control mb-3">
                    
                    <label class="mb-2">Product Description</label>
                    <textarea name="product_description" id="product_description" rows="5" class="form-control mb-3"></textarea>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="mb-2">Product Quantity</label>
                            <input type="number" name="product_quantity" id="product_quantity" class="form-control mb-3">
                        </div>
                        <div class="col-sm-6">
                            <label class="mb-2">Product Amount</label>
                            <input type="number" name="product_amount" id="product_amount" class="form-control mb-3">
                        </div>
                    </div>
                    
                    <input type="text" name="id" id="id" class="d-none">
                    <input type="text" name="old_pic" id="old_pic" class="d-none">
                    <button type="submit" class="btn btn-primary pro_add_btn">Update Products</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var myModal=new bootstrap.Modal(document.getElementById('pro_edit_modal'));
        $(".pro_edit_btn").each(function(){
            $(this).click(function(){
                var id=$(this).attr("id");
                $.ajax({
                    type:"POST",
                    url:"php/product_data.php",
                    data:{id:id},
                    success:function(response){
                        var pro_data= JSON.parse(response);
                        $("#category").val(pro_data.category);
                        $("#product_name").val(pro_data.product_name);
                        $("#product_description").val(pro_data.product_description);
                        $("#product_quantity").val(pro_data.product_quantity);
                        $("#product_amount").val(pro_data.product_amount);
                        $("#id").val(pro_data.id);
                        $("#old_pic").val(pro_data.product_pic);
                        myModal.show();
                    }
                })
            })
        })

        $(".edit_product_frm").submit(function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"php/edit_product.php",
                data:new FormData(this),
                processData:false,
                contentType:false,
                success:function(response){
                    if(response.trim()==="success"){
                        myModal.hide();
                        var div=document.createElement("DIV");
                        $(div).addClass("alert alert-success");
                        $(div).html("Product Update Successfully");
                        $(div).addClass("display-2");
                        $(".msg").append(div);
                        $(".msg").removeClass("d-none");
                        setTimeout(function(){
                            $(".msg").addClass("d-none");
                            $('[ p_link="all_products"]').click();
                        },2500)
                    }
                }
            })
        })
		$(".pro_delete_btn").each(function(){

    $(this).click(function(){

        var id = $(this).attr("id");

        if(confirm("Are you sure you want to delete this product?")){

            $.ajax({
                type:"POST",
                url:"php/delete_product.php",
                data:{
                    id:id
                },
                success:function(response){

                    if(response.trim()=="success"){

                        $('[ p_link="all_products"]').click();

                    }
                    else
                    {
                        alert("Product delete failed");
                    }

                }
            });

        }

    });

});
    })
</script>
