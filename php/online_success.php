<?php

session_start();

$p_id = $_SESSION['online_p_id'];
$product_qty = $_SESSION['online_p_qty'];
$p_mode = $_SESSION['online_p_mode'];

$tracker = $_GET['tracker'];


// Safepay Reporter API
$api_url = "https://sandbox.api.getsafepay.com/reporter/api/v1/payments/" . urlencode($tracker);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);

if ($response === false) {
    die("Safepay connection error: " . curl_error($ch));
}

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$data = json_decode($response, true);


// Check API response
if ($http_code < 200 || $http_code >= 300) {

    echo "<h3>Safepay Payment Check Error</h3>";
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    exit;
}


// Get tracker state
$payment_state = $data['data']['tracker']['state'] ?? '';


// Display result
echo "Product ID: " . htmlspecialchars($p_id) . "<br>";
echo "Quantity: " . htmlspecialchars($product_qty) . "<br>";
echo "Payment Mode: " . htmlspecialchars($p_mode) . "<br>";
echo "Safepay Tracker: " . htmlspecialchars($tracker) . "<br>";
echo "Payment State: " . htmlspecialchars($payment_state) . "<br>";


if ($payment_state == "TRACKER_ENDED") {

    echo "<h3>Payment Successful</h3>";

} else {

    echo "<h3>Payment Not Completed</h3>";

}

?>