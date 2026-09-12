<footer class="w-100 px-5 mt-5">

<div class="row pt-4">

<div class="col-md-4 p-4">
    <label for="" class="fs-5">Contact Info</label>
    <ul class="p-0 m-0">
    <li>Website: supershopabc.com.pk</li>
    <li>Contact: supershopabc@.com.pk</li>
    <li>Contact Number: +923000000000</li>
    <li>Address: XYZ</li>
    </ul>
</div>

<div class="col-md-4 p-4">
 <label for="" class="fs-5">Useful Links</label>
 <ul class="p-0 m-0">
<?php
 $cat_data_sql=$db->query("SELECT * FROM category");
 while($cat_data=$cat_data_sql->fetch_assoc()){
   echo '<li>
    <a href="product.php?product_category='.$cat_data['category_url'].'">'.$cat_data['category_name'].'</a>
    </li>
    ';
 }
 ?>
 </ul>
</div>

<div class="col-md-4 p-4">
    <label for="" class="fs-5">Follow Us</label><br>
    <label for="" class="fs-5">Other Links</label>
    <br>
    <ul class="p-0 m-0">
    <li>Terms and Conditions</li>
    </ul>
</div>

</div>

<hr>
<p class="text-center m-0 pb-4">Developed By : Shabbir Son's</p>

<style>
footer {
    background: rgba(15, 23, 42, 0.4) !important;
    backdrop-filter: blur(8px) !important;
    -webkit-backdrop-filter: blur(8px) !important;
    border-top: 1px solid rgba(216, 180, 254, 0.15) !important;
    box-shadow: 0 -8px 32px 0 rgba(0, 0, 0, 0.3) !important;
}

footer label.fs-5 {
    color: #c084fc !important;
    font-weight: 600 !important;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    font-size: 1rem !important;
    margin-bottom: 12px;
    display: inline-block;
}

footer ul {
    list-style: none !important;
    padding-left: 0 !important;
}

footer li {
    list-style-type: none !important;
    list-style: none !important;
    color: #cbd5e1 !important;
    font-weight: 400 !important;
    font-size: 0.95rem;
    margin-bottom: 8px;
}

footer a {
    color: #cbd5e1 !important;
    text-decoration: none !important;
    transition: color 0.2s ease, padding-left 0.2s ease !important;
    display: inline-block;
}

footer a:hover {
    color: #d8b4fe !important;
    padding-left: 4px;
}

footer hr {
    border-top: 1px solid rgba(216, 180, 254, 0.15) !important;
    opacity: 1 !important;
    width: 100%;
}

footer p.text-center {
    color: #94a3b8 !important;
    font-size: 0.85rem;
    letter-spacing: 0.02em;
}
</style>

</footer>
