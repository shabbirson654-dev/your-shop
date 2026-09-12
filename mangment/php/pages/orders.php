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
    .btn-primary {
        background-color: #14a800 !important;
        border: 1px solid #14a800 !important;
        border-radius: 20px !important;
        font-weight: 500 !important;
        padding: 8px 24px !important;
        font-size: 0.95rem !important;
        color: #ffffff !important;
        transition: all 0.2s ease !important;
    }
    .btn-primary:hover {
        background-color: #118f00 !important;
        border-color: #118f00 !important;
    }
    .btn-sm.update {
        background-color: #14a800 !important;
        border: 1px solid #14a800 !important;
        border-radius: 15px !important;
        font-weight: 500 !important;
        padding: 4px 12px !important;
        font-size: 0.8rem !important;
        color: #ffffff !important;
        display: block;
        margin: 0 auto;
    }
    .btn-sm.update:hover {
        background-color: #118f00 !important;
        border-color: #118f00 !important;
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
        min-width: 1100px;
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
    .table tbody td img {
        display: block;
        margin: 0 auto;
        object-fit: contain;
    }
</style>

<div class="row container-fluid m-0 p-0 mb-4">
    <div class="col-12 p-0">
        <div class="box">
           <form action="" class="row g-3 align-items-center o_data_frm">
                <div class="col-12 col-sm-4 col-md-3">
                     <select name="ods" id="" class="form-select w-100">
                        <option value="pending">Pending</option>
                        <option value="complete">Complete</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                    <input type="date" name="o_date" class="form-control w-100">
                </div>
                <div class="col-12 col-sm-4 col-md-2">
                    <button class="btn btn-primary w-100" type="submit">Get Data</button>
                </div>
           </form>
        </div>
    </div>
</div>

<div class="row container-fluid m-0 p-0">
	 <div class="col-12 p-0">
        <div class="box">
            <div class="table-responsive">
                <table class="table">
                   <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Product Pic</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Amount</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Address</th>
                        <th scope="col" class="text-center">Payment Status</th>
                        <th scope="col" class="text-center">Order Status</th>
                    </tr>
                   </thead>
                   <tbody>
                             
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    
$(document).ready(function(){
    $(".o_data_frm").submit(function(e){
        
        e.preventDefault();
        $("tbody").html("");
        $.ajax({
            type:"POST",
            url:"php/get_order_data.php",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success:function(response){
                var all_data=JSON.parse(response);
                var i;
                var ps="";
                var os="";
                for(i=0;i<all_data.length;i++){

                    if(all_data[i].payment_status=="pending"){
ps="<img src='warning.png' class='mb-2' width='30'> <button class='btn btn-sm btn-primary update' oid='"+all_data[i].id+"' btn_type='payment_status'>Update</button>";
                   
                    }
                    else{
                         ps="<img src='success.png' class='mb-2' width='30'> ";

                    }
                    if(all_data[i].order_status=="pending"){

                    os="<img src='warning.png' class='mb-2' width='30'> <button class='btn btn-sm btn-primary update' oid='"+all_data[i].id+"' btn_type='order_status'>Update</button>";
                    }
                    else{
                         os="<img src='success.png' class='mb-2' width='30'> ";

                    }
                           $("tbody").append("<tr><td>"+all_data[i].id+"</td><td><img src='../product_pic/"+all_data[i].p_pic+"' width='60' style='border-radius:6px; border:1px solid #e4ebb1; padding:2px; background:#f7f9fa;'></td><td>"+all_data[i].p_name+"</td><td>"+all_data[i].p_qty+"</td> <td>Rs. "+parseInt(all_data[i].p_amount).toLocaleString()+"</td> <td>"+all_data[i].c_name+"</td> <td>"+all_data[i].c_mobile+"</td> <td>"+all_data[i].c_address+"</td> <td align='center'>"+ps+"</td> <td align='center'>"+os+"</td></tr>" )
                }

                $(".update").each(function(){
                    $(this).click(function(){
                        var element=this.parentElement;
                        var oid=$(this).attr("oid");
                        var btn_type=$(this).attr("btn_type");
                        $.ajax({
                            type:"POST",
                            url:"php/update_order.php",
                            data:{
                                oid:oid,
                                btn_type:btn_type
                            },
                            success:function(response){
                                if(response.trim()=="success"){
                                    $(element).html("<img src='success.png' class='mb-2' width='30'>");
                                }
                            }
                        })
                    })
                })
              

            }
        })
    })
})
   
</script>
