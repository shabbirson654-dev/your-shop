<?php
require("../db.php");
?>

<style>
    .box {
        background: #ffffff;
        border: 1px solid #e4ebb1;
        border-radius: 8px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05);
        padding: 30px !important;
    }
    .box h1 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #001e00;
        margin-bottom: 15px;
    }
    .box hr {
        border-top: 1px solid #e4ebb1;
        opacity: 1;
        margin-bottom: 25px;
    }
    .form-group label {
        font-weight: 500;
        color: #001e00;
        font-size: 0.95rem;
    }
    .form-control {
        border: 1px solid #e4ebb1;
        border-radius: 6px;
        padding: 10px 14px;
        font-size: 0.95rem;
    }
    .form-control:focus {
        border-color: #14a800;
        box-shadow: 0 0 0 4px rgba(20, 168, 0, 0.1);
        color: #001e00;
    }
    .cat_btn, .update_cat_btn {
        background-color: #14a800 !important;
        border: 1px solid #14a800 !important;
        border-radius: 20px !important;
        font-weight: 500 !important;
        padding: 8px 24px !important;
        font-size: 0.95rem !important;
        color: #ffffff !important;
        transition: all 0.2s ease !important;
    }
    .cat_btn:hover, .update_cat_btn:hover {
        background-color: #118f00 !important;
        border-color: #118f00 !important;
    }
    .table {
        margin-bottom: 0;
    }
    .table thead th {
        color: #001e00;
        font-weight: 600;
        border-bottom: 2px solid #e4ebb1;
        font-size: 0.95rem;
        padding: 12px 8px;
    }
    .table tbody td {
        color: #001e00;
        vertical-align: middle;
        padding: 14px 8px;
        border-bottom: 1px solid #e4ebb1;
        font-size: 0.95rem;
    }
    .cat_edit_btn {
        cursor: pointer;
        width: 18px;
        height: 18px;
        transition: transform 0.2s ease;
    }
    .cat_edit_btn:hover {
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
</style>


<div class="row g-4">
    <div class="col-md-6">
       <div class="box p-5">
         <h1>Add Category</h1>
        <hr>

        <form class="cat_frm">
            <div class="form-group">
            <label for="category_name" class="mb-2"> Category Name</label>
            <input type="text" class="form-control mb-3" id="category_name" name="category_name">
            

            </div>
            <button type="submit" class="btn btn-primary cat_btn">Add Category</button>
        </form>
       </div>
    </div>
    <div class="col-md-6">

        <div class="box p-5">
            <table class="table">
                   <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                   </thead>
                   <tbody>
                             <?php
                             
                             
                             $data=$db->query("SELECT * FROM category");
                             while($aa=$data->fetch_assoc()){
                                echo "
                                <tr>
                                <td>".$aa['id']."</td>
                                <td>".$aa['category_name']."</td>
                                <td><img src='edit.png' class='cat_edit_btn' id='".$aa['id']."'></td>
                                 <td>
    <img src='delete.png' class='cat_delete_btn' id='".$aa['id']."'>
</td>
                                
                                </tr>
                                
                                ";
                             }
                             
                             ?>
                   </tbody>
        </table>
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
        var myModal=new bootstrap.Modal(document.getElementById('cat_edit_modal'));

    $(".cat_frm").submit(function(e){



    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"php/add_cat.php",
        data:new FormData(this),

        processData:false,
        contentType:false,
        
        beforeSend:function(){
            $(".cat_btn").html("Please wait...");
            $(".cat_btn").attr("disabled","disabled");
        },
        success:function(response){
             $(".cat_btn").html("Add Category");
            $(".cat_btn").removeAttr("disabled");
          
            $('[ p_link="category"]').click();
        }
    })
    });

    $(".cat_edit_btn").each(function(){
        $(this).click(function(){
            var cat_id=$(this).attr("id");
           
            $.ajax({
                type:"POST",
                url:"php/get_cat_data.php",
                data:{
                    cat_id:cat_id
                },
                success:function(response){
                  var cat_data= JSON.parse(response);
                  $("#edit_cat_name").val(cat_data.category_name);
                  $("#edit_cat_id").val(cat_data.id);
                  
                  myModal.show();
                }
            })
        })
    })

    $(".edit_cat_frm").submit(function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url:"php/edit_cat.php",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(response){
                if(response.trim()=="success"){
                    myModal.hide();
                    $('[ p_link="category"]').click();
                }
            }
        })
    })
	
	$(".cat_delete_btn").each(function(){

    $(this).click(function(){

        var cat_id = $(this).attr("id");

        if(confirm("Are you sure you want to delete this category?")){

            $.ajax({
                type:"POST",
                url:"php/delete_cat.php",
                data:{
                    cat_id:cat_id
                },
                success:function(response){

                    if(response.trim()=="success"){
                        $('[ p_link="category"]').click();
                    }
                    else
                    {
                        alert("Category delete failed");
                    }

                }
            });

        }

    });

});
    })
</script>
