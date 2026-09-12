<?php
require("db.php");

$cat_id = $_POST['cat_id'];

$delete = $db->query("DELETE FROM category WHERE id='$cat_id'");

if($delete){
    echo "success";
}
else
{
    echo "failed";
}
?>